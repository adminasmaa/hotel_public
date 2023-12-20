@extends('layouts.admin')
@section('title', 'الماركات')
@section('css')
    <style>
        * {
            box-sizing: border-box;
        }

        .dropdown {
            position: relative;
            margin-bottom: 20px;

        .dropdown-list {
            padding: 25px 20px;
            background: #fff;
            position: absolute;
            top: 50px;
            left: 0;
            right: 0;
            border: 1px solid rgba(black, .2);
            max-height: 223px;
            overflow-y: auto;
            background: #fff;
            display: none;
            z-index: 10;
        }

        .checkbox {
            opacity: 0;
            transition: opacity .2s;
        }

        .dropdown-label {
            display: block;
            height: 44px;
            font-size: 16px;
            line-height: 42px;
            background: #fff;
            border: 1px solid rgba(black, .2);
            padding: 0 40px 0 20px;
            cursor: pointer;
            position: relative;

        &:before {
             content: '▼';
             position: absolute;
             right: 20px;
             top: 50%;
             transform: translateY(-50%);
             transition: transform .25s;
             transform-origin: center center;
         }
        }
        &.open {
        .dropdown-list {
            display: block;
        }
        .checkbox {
            transition: 2s opacity 2s;
            opacity: 1;
        }
        .dropdown-label:before {
            transform: translateY(-50%) rotate(-180deg);
        }
        }
        }

        .checkbox {
            margin-bottom: 20px;
        &:last-child {
             margin-bottom: 0;
         }


        .checkbox-custom-label {
            display: inline-block;
            position: relative;
            vertical-align: middle;
            cursor: pointer;
        }

        .checkbox-custom + .checkbox-custom-label:before {
            content: '';
            background: transparent;
            display: inline-block;
            vertical-align: middle;
            margin-right: 10px;
            text-align: center;
            width: 12px;
            height: 12px;
            border: 1px solid rgba(black, .3);
            border-radius: 2px;
            margin-top: -2px;
        }

        .checkbox-custom:checked + .checkbox-custom-label:after {
            content: '';
            position: absolute;
            top: 2px;
            left: 4px;
            height: 4px;
            padding: 2px;
            transform: rotate(45deg);
            text-align: center;
            border: solid #000;
            border-width: 0 2px 2px 0;
        }
        .checkbox-custom-label {
            line-height: 16px;
            font-size: 16px;
            margin-right: 0;
            margin-left: 0;
            color: black;
        }
        }
    </style>
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <form class="mega-vertical" action="{{route('marks.store')}}" method="post"
                  enctype="multipart/form-data">
                @csrf
                <div class="col-sm-12 box-col-12 p-20">
                    <div class="card height-equal">
                        <div class="card-header">
                            <h5>إضافة ماركة جديدة </h5>
                        </div>
                        <div class="card-body">
                            <div class="row">

                                <div class="col-sm-6">
                                    <label class="col-sm-12 col-form-label"> اسم الماركة <span
                                            class=" text-danger">*</span></label>

                                    <input type="text" name='name'
                                           value="{{old('name')}}" class="form-control"
                                           placeholder="">
                                    @error('name')
                                    <div style='color:red'>{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="col-sm-6">
                                    <div class="row">
                                        <label class="col-sm-12 col-form-label"> شركات التوريد</label>


                                        <div class="dropdown">
                                            <label class="dropdown-label col-sm-12 col-form-label"> اختر الشركة </label>
                                            <div class="dropdown-list">
                                                <div class="checkbox">
                                                    <input type="checkbox" name="dropdown-group-all" class="check-all checkbox-custom" id="checkbox-main"/>
                                                    <label for="checkbox-main" class="checkbox-custom-label"> اختيار الكل</label>
                                                </div>
                                                @foreach($companies as $company)
                                                <div class="checkbox">
                                                    <input type="checkbox" name="dropdown-group company_id[{{$company->name}}]"  value="{{$company->id}}" class="check checkbox-custom" id="checkbox-custom_{{$company->id}}"/>
                                                    <label for="checkbox-custom_{{$company->id}}" class="checkbox-custom-label"> {{$company->name}}</label>
                                                </div>
                                                @endforeach



                                            </div>
                                        </div>
                                        @error('company_id')
                                        <div style='color:red'>{{$message}}</div>
                                        @enderror

                                        <div style="padding-right:0px" class="col-sm-3"><a
                                                title="{{ __(' اضافة جديد') }}"
                                                href="{{route('companies.create')}}"><i
                                                    class="fa fa-plus-square"></i></a></div>
                                    </div>
                                    </div>
                                </div>

                             {{--   <div class="col-sm-6">
                                    <div class="row">
                                        <label class="anchor col-sm-12 col-form-label"> شركات التوريد <span
                                                class=" text-danger">*</span></label>
                                        <div id="list1" class="col-sm-9 dropdown-check-list" tabindex="100">
                                            <label class="anchor col-sm-12 col-form-label"> اختر الشركة </label>
                                            <ul id="items" class="items">
                                                @foreach($companies as $company)
                                                    <li><input name="company_id[{{$company->name}}]"
                                                               value="{{$company->id}}"
                                                               type="checkbox"/>{{$company->name}}
                                                    </li>
                                                @endforeach


                                            </ul>
                                        </div>
                                        @error('company_id')
                                        <div style='color:red'>{{$message}}</div>
                                        @enderror

                                        <div style="padding-right:0px" class="col-sm-3"><a
                                                title="{{ __(' اضافة جديد') }}"
                                                href="{{route('companies.create')}}"><i
                                                    class="fa fa-plus-square"></i></a></div>
                                    </div>
                                </div>--}}


                                <div class="col-sm-6">
                                    <label class="col-sm-12 col-form-label"> رفع صورة <span
                                            class=" text-danger">*</span></label>
                                    <input type="file" name='company_img' accept="image/*" class="form-control"
                                           placeholder="">
                                    @error('company_img')
                                    <div style='color:red'>{{$message}}</div>
                                    @enderror
                                </div>

                                <div class="col-sm-6">
                                    <label class="col-sm-12 col-form-label"> نسبة الخصم </label>

                                    <input type="text" name='discount' class="form-control"
                                           placeholder="">
                                    @error('discount')
                                    <div style='color:red'>{{$message}}</div>
                                    @enderror
                                </div>

                            </div>
                        </div>

                        <div class="card-footer text-center">
                            <button class="btn btn-primary m-r-15" type="submit">حفظ</button>
                            <a href="{{url('marks')}}">
                                <button type="button" class="btn btn-light">إلغاء</button>
                            </a>
                        </div>

                    </div>
                </div>

            </form>
        </div>
    </div>

    @section('scripts')
        <script>
            function checkboxDropdown(el) {
                var $el = $(el)

                function updateStatus(label, result) {
                    if(!result.length) {
                        label.html('اختر الشركة');
                    }
                };

                $el.each(function(i, element) {
                    var $list = $(this).find('.dropdown-list'),
                        $label = $(this).find('.dropdown-label'),
                        $checkAll = $(this).find('.check-all'),
                        $inputs = $(this).find('.check'),
                        defaultChecked = $(this).find('input[type=checkbox]:checked'),
                        result = [];

                    updateStatus($label, result);
                    if(defaultChecked.length) {
                        defaultChecked.each(function () {
                            result.push($(this).next().text());
                            $label.html(result.join(", "));
                        });
                    }

                    $label.on('click', ()=> {
                        $(this).toggleClass('open');
                    });

                    $checkAll.on('change', function() {
                        var checked = $(this).is(':checked');
                        var checkedText = $(this).next().text();
                        result = [];
                        if(checked) {
                            result.push(checkedText);
                            $label.html(result);
                            $inputs.prop('checked', false);
                        }else{
                            $label.html(result);
                        }
                        updateStatus($label, result);
                    });

                    $inputs.on('change', function() {
                        var checked = $(this).is(':checked');
                        var checkedText = $(this).next().text();
                        if($checkAll.is(':checked')) {
                            result = [];
                        }
                        if(checked) {
                            result.push(checkedText);
                            $label.html(result.join(", "));
                            $checkAll.prop('checked', false);
                        }else{
                            let index = result.indexOf(checkedText);
                            if (index >= 0) {
                                result.splice(index, 1);
                            }
                            $label.html(result.join(", "));
                        }
                        updateStatus($label, result);
                    });

                    $(document).on('click touchstart', e => {
                        if(!$(e.target).closest($(this)).length) {
                            $(this).removeClass('open');
                        }
                    });
                });
            };

            checkboxDropdown('.dropdown');




        </script>

    @endsection
@endsection



