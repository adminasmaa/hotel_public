@extends('layouts.admin')
@section('title', 'الماركات')
@section('css')
    <style>
        .dropdown-check-list {
            display: inline-block;
        }

        .dropdown-check-list .anchor {
            position: relative;
            cursor: pointer;
            display: inline-block;
            padding: 5px 50px 5px 10px;
            border: 1px solid #ccc;
        }

        .dropdown-check-list .anchor:after {
            position: absolute;
            content: "";
            border-left: 2px solid black;
            border-top: 2px solid black;
            padding: 5px;
            right: 10px;
            top: 20%;
            -moz-transform: rotate(-135deg);
            -ms-transform: rotate(-135deg);
            -o-transform: rotate(-135deg);
            -webkit-transform: rotate(-135deg);
            transform: rotate(-135deg);
        }

        .dropdown-check-list .anchor:active:after {
            right: 8px;
            top: 21%;
        }

        .dropdown-check-list ul.items {
            padding: 2px;
            display: none;
            margin: 0;
            border: 1px solid #ccc;
            border-top: none;
        }

        .dropdown-check-list ul.items li {
            list-style: none;
        }
    </style>
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <form class="mega-vertical" action="{{route('marks.store')}}" method="post"
                  enctype="multipart/form-data">
                @csrf
                @method('post')
                <div class="col-sm-12 box-col-12 p-20">
                    <div class="card height-equal">
                        <div class="card-header">
                            <h5>تعديل ماركة </h5>
                        </div>
                        <div class="card-body">
                            <div class="row">

                                <div class="col-sm-6">
                                    <label class="col-form-label"> اسم الماركة <span
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
                                </div>
                            </div>
                            @error('company_id')
                            <div style='color:red'>{{$message}}</div>
                            @enderror

                            <div class="col-sm-6 media-body d-flex ">
                                <div class="col-sm-9">
                                    <label class=" col-form-label"> تعديل صورة <span
                                            class=" text-danger">*</span></label>
                                    <input type="file" name='company_img' accept="image/*" class="form-control"
                                           value=""
                                           placeholder="">


                                </div>

                            </div>
                            <div class="col-sm-6">
                                <label class="col-sm-6 col-form-label"> نسبة الخصم </label>
                                <input type="text" name='discount' class="form-control"
                                       value="{{old('discount')}}"
                                       placeholder="">

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

@endsection
@section('scripts')
    <script>
        var checkList = document.getElementById('list1');
        var items = document.getElementById('items');
        checkList.getElementsByClassName('anchor')[0].onclick = function (evt) {
            if (items.classList.contains('visible')) {
                items.classList.remove('visible');
                items.style.display = "none";
            } else {
                items.classList.add('visible');
                items.style.display = "block";
            }

        }

        items.onblur = function (evt) {
            items.classList.remove('visible');
        }
    </script>
@endsection

