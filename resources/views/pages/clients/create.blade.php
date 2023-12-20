@extends('layouts.admin')
@section('title', ' اضافة عميل ')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <form class="mega-vertical" action="{{route('clients.store',array('branch' => request()->get('branch')))}}"
                  method="post" enctype="multipart/form-data">
                @csrf
                <div class="col-sm-12 col-xxl-12 box-col-12 p-20">
                    <div class="card height-equal">
                        <div class="card-header">
                            <h5>إضافة عميل جديد </h5>
                        </div>
                        <div class="card-body">

                            <div class="row">

                                <div class="col-sm-6">

                                    <div class="media-body">
                                        <div class="mb-3 row">
                                            <label class="col-sm-12 col-form-label">
                                                الاسم بالعربى<span
                                                    class=" text-danger">*</span></label>
                                            <div class="col-sm-9">
                                                <input class="form-control" type="text" name="name"
                                                       value="{{old('name')}}">
                                                @error('name')
                                                <div style='color:red'>{{$message}}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">

                                    <div class="media-body">
                                        <div class="mb-3 row">
                                            <label class="col-sm-12 col-form-label"> الاسم بالانجليزيه<span
                                                    class=" text-danger">*</span></label>
                                            <div class="col-sm-9">
                                                <input class="form-control" type="text" name="name_en"
                                                       value="{{old('name_en')}}">
                                                @error('name_en')
                                                <div style='color:red'>{{$message}}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="media-body">
                                        <div class="mb-3 row">
                                            <label class="col-sm-12 col-form-label"> الرقم السري  <span class=" text-danger">*</span></label>
                                            <div class="col-sm-9">
                                                <input type="password" name='password' class="form-control"
                                                       value="{{old('password')}}" placeholder="">
                                                @error('password')
                                                <div style='color:red'>{{$message}}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6">

                                    <div class="media-body">
                                        <div class="mb-3 row">
                                            <label class="col-sm-12 col-form-label"> تأكيد الرقم السري <span class=" text-danger">*</span></label>
                                            <div class="col-sm-9">
                                                <input type="password" name='password_confirmation' class="form-control"
                                                       value="{{old('password_confirmation')}}" placeholder="">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="media-body">
                                        <div class="mb-3 row">
                                            <label class="col-sm-12 col-form-label"> الهاتف <span
                                                    class=" text-danger">*</span></label>
                                            <div class="col-sm-9">
                                                <input type="tel" class="mobileNumber form-control" maxlength="20"
                                                       id="lb_phone" value="
                                                " name="phone" title="">
                                                @error('phone')
                                                <div style='color:red'>{{$message}}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="col-sm-6">

                                    <div class="media-body">
                                        <div class="mb-3 row">
                                            <label class="col-sm-12 col-form-label"> الجنسية <span
                                                    class=" text-danger">*</span></label>
                                            @if(!Session::get('branch'))
                                            <div class="row">
                                            <div class="col-sm-9">
                                                <select class="form-select digits" id="exampleFormControlSelect9"
                                                        name="nationality_id">
                                                    <option value=''>اختر الجنسية</option>
                                                    @foreach($nationalities as $nationality)

                                                        <option
                                                            value='{{$nationality->id}}'{{old('nationality_id')==$nationality->id?'selected':''}}>{{$nationality->name}}</option>
                                                    @endforeach
                                                </select>
                                                @error('nationality_id')
                                                <div style='color:red'>{{$message}}</div>
                                                @enderror

                                            </div>
                                            <div style="padding-right:0px" class="col-sm-3"><a
                                                    title="{{ __(' اضافة جديد') }}"
                                                    href="{{route('nationalities.index')}}"><i
                                                        class="fa fa-plus-square"></i></a></div>
                                        </div>
                                            @else
                                                <div class="col-sm-9">
                                                    <select class="form-select digits" id="exampleFormControlSelect9"
                                                            name="nationality_id">
                                                        <option value=''>اختر الجنسية</option>
                                                        @foreach($nationalities as $nationality)

                                                            <option
                                                                value='{{$nationality->id}}'{{old('nationality_id')==$nationality->id?'selected':''}}>{{$nationality->name}}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('nationality_id')
                                                    <div style='color:red'>{{$message}}</div>
                                                    @enderror

                                                </div>

                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6">

                                    <div class="media-body">
                                        <div class="mb-3 row">
                                            <label class="col-sm-12 col-form-label"> الحالة</label>
                                            <div class="col-sm-9">
                                                <select class="form-select digits" id="exampleFormControlSelect9"
                                                        name="client_statuses_id" value="{{old('client_statuses_id')}}">
                                                    <option value=''>اختر الحالة</option>
                                                    @foreach($client_statuses as $status)
                                                        <option
                                                            value='{{$status->id}}'{{old('client_statuses_id')==$status->id?'selected':''}}>{{$status->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="media-body">
                                        <div class="mb-3 row">
                                            <label class="col-sm-12 col-form-label"> سبب اختيار الحالة</label>
                                            <div class="col-sm-9">
                                            <textarea class="form-control" id="exampleFormControlTextarea4" rows="3"
                                                      name="status_reason">{{old('status_reason')}}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @if(!Session::get('branch'))
                                <div class="col-sm-6">

                                    <div class="media-body">
                                        <div class="mb-3 row">


                                                <label class="col-sm-12 col-form-label">
                                                    الفرع <span class=" text-danger">*</span></label>
                                            <div class="row">
                                            <div class="col-sm-9">

                                                    <select class="form-select digits" id="exampleFormControlSelect9"
                                                            name="branch_id">
                                                        <option value=''>اختر الفرع</option>
                                                        @foreach($branches as $branch)
                                                            @if($branch->id!=1)
                                                                <option
                                                                    value='{{$branch->id}}'{{old('branch_id')==$branch->id?'selected':''}}>{{$branch->name}}</option>

                                                            @endif
                                                        @endforeach
                                                    </select>
                                                    @error('branch_id')
                                                    <div style='color:red'>{{$message}}</div>
                                                    @enderror


                                            </div>
                                                <div style="padding-right:0px" class="col-sm-3"><a
                                                        title="{{ __(' اضافة جديد') }}"
                                                        href="{{route('branches.create')}}"><i
                                                            class="fa fa-plus-square"></i></a></div>

                                            </div>




                                        </div>

                                    </div>
                                    </div>
                                </div>

                            @else

                                <input name="branch_id" type="hidden"
                                       value="{{App\Models\hr\Branch::withoutGlobalScope('branch')->find(Session::get('branch'))->id}}">
                            @endif
                                <div class="col-sm-6">
                                    <div class="media-body">
                                        <div class="mb-3 row">
                                            <label class="col-sm-12 col-form-label">نوع الجنس</label>
                                            <div class="col-sm-9">
                                                <select class="form-select digits" name="gender"
                                                        id="exampleFormControlSelect9">
                                                    <option value=''>اختر</option>
                                                    <option value='male'>ذكر</option>
                                                    <option value='female'>انثى</option>
                                                </select>
                                                @error('gender')
                                                <div style='color:red'>{{$message}}</div>
                                                @enderror

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="media-body">
                                            <div class="mb-3 row">
                                                <label class="col-sm-12 col-form-label">نوع الاثبات </label>
                                                <div class="col-sm-9">
                                                    <select class="form-select digits chooseWay" name="approve_id"
                                                            id="exampleFormControlSelect9">
                                                        <option value=''>اختر</option>
                                                        @foreach($approves as $approve)
                                                            <option value="{{$approve->id}}"
                                                                {{old('approve_id')==$approve->id?'selected':''}}>
                                                                {{$approve->name}}
                                                            </option>
                                                        @endforeach


                                                    </select>
                                                    @error('approve_id')
                                                    <div style='color:red'>{{$message}}</div>
                                                    @enderror

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 way" style="display: none;">

                                        <div class="media-body">
                                            <div class="mb-3 row">
                                                <label class="col-sm-12 col-form-label num_val"></label>
                                                <div class="col-sm-9">
                                                    <input class="form-control" type="number" name="num" title="">
                                                    @error('num')
                                                    <div style='color:red'>{{$message}}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="media-body">
                                        <div class="mb-3 row">
                                            <label class="col-sm-12 col-form-label">رفع صورة الأثبات 1 <span
                                                    class=" text-danger">*</span></label>
                                            <div class="col-sm-9">
                                                <input class="form-control" type="file" name="client_img_1" title="" accept="image/*"
                                                       value="{{old('client_img_1')}}">
                                                @error('client_img_1')
                                                <div style='color:red'>{{$message}}</div>
                                                @enderror

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="media-body">
                                        <div class="mb-3 row">
                                            <label class="col-sm-12 col-form-label">رفع صورة الأثبات 2 <span
                                                    class=" text-danger">*</span></label>
                                            <div class="col-sm-9">
                                                <input class="form-control" type="file" name="client_img_2" title="" accept="image/*"
                                                       value="{{old('client_img_2')}}">
                                                @error('client_img_2')
                                                <div style='color:red'>{{$message}}</div>
                                                @enderror

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <div class="media-body">
                                        <div class="mb-3 row">
                                            <label class="col-sm-12 col-form-label">رفع صورة عقد الزواج </label>
                                            <div class="col-sm-9">
                                                <input class="form-control" type="file" name="contract_img" title="" accept="image/*"
                                                       value="{{old('contract_img')}}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>

                    </div>
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-footer text-center">
                                <button class="btn btn-primary m-r-15" type="submit">حفظ</button>
                                <a href="{{route('clients.index',array('branch' => request()->get('branch')))}}">
                                    <button type="button" class="btn btn-light">إلغاء</button>
                                </a>

                            </div>

                        </div>
                    </div>
                </div>


            </form>
        </div>
    </div>

@endsection
@section('scripts')
    <script type="text/javascript">

        var countries = {!! json_encode($countries) !!};
    </script>
    <script src="{{asset('assets/js/intlTelInput.js')}}"></script>


    <script>
        var phone_number = window.intlTelInput(document.querySelector("#lb_phone"), {
            separateDialCode: true,
            formatOnDisplay: true,
            preferredCountries: ["kw"],
            hiddenInput: "full",
            utilsScript: "{{asset('assets/js/utils.js?1562189064761')}}"
        });
    </script>

    <script>
        $(document).ready(function () {
            if ($('.chooseWay option:selected').val() != '') {
                $('.way').each(function () {
                    $(this).show();
                })
                $('.num_val').text($('.chooseWay option:selected').text());

            }
            ;

            $("body").on("change", ".chooseWay", function () {
                $('.way').each(function () {
                    $(this).show();
                })


                $('.num_val').text($('.chooseWay option:selected').text());
            });


        });
    </script>
@endsection
@section('css')
    <link rel="stylesheet" href="{{asset('assets/css/intlTelInput.css')}}">

@endsection
