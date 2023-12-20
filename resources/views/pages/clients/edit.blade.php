@extends('layouts.admin')
@section('title', ' تعديل العملاء')
@section('css')
    <link rel="stylesheet"
          href="https://7agz.com/Mktba/themes/7agz-2021/assets/vendor/intl-input2/css/intlTelInput.css">

@endsection
@section('content')
    <div class="container-fluid" style="background: #f4f4f4;">
        <div class="row">
            <form class="mega-vertical"
                  action="{{route('clients.update',$client->id,array('branch' => request()->get('branch')))}}"
                  method="post"
                  enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="col-sm-12 col-xxl-12 box-col-12 p-20">
                    <div class="card height-equal">
                        <div class="card-header">
                            <h5>تعديل عميل </h5>
                        </div>
                        <div class="card-body">

                            <div class="row">

                                <div class="col-sm-6">

                                    <div class="media-body">
                                        <div class="mb-3 row">
                                            <label class="col-sm-12 col-form-label"> الاسم بالعربى<span
                                                    class=" text-danger">*</span></label>
                                            <div class="col-sm-9">
                                                <input class="form-control" type="text" name="name"
                                                       value="{{old('name',$client->name)}}">
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
                                            <label class="col-sm-12 col-form-label">
                                                الاسم بالانجليزيه
                                                <span class=" text-danger">*</span></label>
                                            <div class="col-sm-9">
                                                <input class="form-control" type="text" name="name_en"
                                                       value="{{old('name_en',$client->name_en)}}">
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
                                            <label class="col-sm-12 col-form-label">الرقم السرى</label>
                                            <div class="col-sm-9">
                                                <input type="password" name='password' class="form-control"
                                                       placeholder="">
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
                                            <label class="col-sm-12 col-form-label"> الهاتف <span
                                                    class=" text-danger">*</span></label>
                                            <div class="col-sm-9">
                                                <input type="tel" class="mobileNumber form-control" maxlength="20"
                                                       id="lb_phone" value="{{$client->code}}{{$client->phone}}"
                                                       name="phone"
                                                       title="">
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
                                                        <select class="form-select digits"
                                                                id="exampleFormControlSelect9"
                                                                name="nationality_id">
                                                            <option value=''>اختر الجنسية</option>
                                                            @foreach($nationalities as $nationality)
                                                                <option
                                                                    value="{{old('nationality_id',$nationality->id)}}"
                                                                    {{$client->nationality_id==$nationality->id?'selected':''}}>
                                                                    {{$nationality->name}}
                                                                </option>
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
                                                            <option value="{{old('nationality_id',$nationality->id)}}"
                                                                {{$client->nationality_id==$nationality->id?'selected':''}}>
                                                                {{$nationality->name}}
                                                            </option>
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
                                                        name="client_statuses_id">
                                                    <option value=''>اختر الحالة</option>
                                                    @foreach($client_statuses as $status)
                                                        <option value="{{old('client_statuses_id',$status->id)}}"
                                                            {{$client->client_statuses_id==$status->id?'selected':''}}>
                                                            {{$status->name}}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('client_statuses_id')
                                                <div style='color:red'>{{$message}}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    @if(!Session::get('branch'))

                                        <div class="media-body">
                                            <div class="mb-3 row">
                                                <label class="col-sm-12 col-form-label"> اختر الفرع</label>
                                                <div class="col-sm-9">
                                                    <select name='branch_id' class="form-select"
                                                            aria-label="Default select example">
                                                        <option value=''>اختر الفرع</option>
                                                        @foreach($branches as $branch)
                                                            @if($branch->id!=1)
                                                                <option value='{{$branch->id}}'
                                                                    {{$client->branch_id==$branch->id?'selected':''}}>{{$branch->name}}
                                                                </option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                    @error('branch_id')
                                                    <div style='color:red'>{{$message}}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    @else

                                        <input name="branch_id" type="hidden"
                                               value="{{App\Models\hr\Branch::withoutGlobalScope('branch')->find($client->branch_id)}}">

                                    @endif

                                </div>
                                <div class="col-sm-6">
                                    <div class="media-body">
                                        <div class="mb-3 row">
                                            <label class="col-sm-12 col-form-label">نوع الجنس</label>
                                            <div class="col-sm-9">
                                                <select class="form-select digits" name="gender"
                                                        id="exampleFormControlSelect9">
                                                    <option value=''>اختر</option>
                                                    <option value='male' {{$client->gender=='male'?'selected':''}}>ذكر
                                                    </option>
                                                    <option value='female' {{$client->gender=='female'?'selected':''}}>
                                                        انثى
                                                    </option>
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
                                                                {{old('approve_id',$client->approve_id)==$approve->id?'selected':''}}>
                                                                {{$approve->name}}</option>
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
                                                    <input class="form-control" type="number" name="num"
                                                           value="{{old('phone',$client->num)}}" title="">
                                                    @error('num')
                                                    <div style='color:red'>{{$message}}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="media-body">
                                        <div class="mb-3 row">
                                            <label class="col-sm-12 col-form-label"> سبب اختيار الحالة</label>
                                            <div class="col-sm-9">
                                            <textarea class="form-control" id="status_reason" rows="3"
                                                      name="status_reason">{{$client->status_reason}}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="media-body d-flex ">
                                    <div class="col-sm-6 ">
                                        <label class="col-form-label"> تعديل صورة الأثبات</label>
                                        <input type="file" name='client_img_1' accept="image/*"
                                               value="{{asset('storage/'.$client->client_img_1)}}" placeholder="">

                                    </div>
                                    <div class="col-sm-6 ">
                                        <a target="_blank" href="{{asset('storage/'.$client->client_img_1)}}"><img
                                                class="b-r-10" width="50px" height="50px"
                                                src="{{asset('storage/'.$client->client_img_1)}}" alt=""></a>
                                    </div>
                                </div>
                                <div class="media-body d-flex ">
                                    <div class="col-sm-6 ">
                                        <label class="col-form-label"> تعديل صورة الأثبات</label>
                                        <input type="file" name='client_img_2' accept="image/*"
                                               value="{{asset('storage/'.$client->client_img_2)}}" placeholder="">


                                    </div>
                                    <div class="col-sm-6 ">
                                        <a target="_blank" href="{{asset('storage/'.$client->client_img_2)}}"><img
                                                class="b-r-10" width="50px" height="50px"
                                                src="{{asset('storage/'.$client->client_img_2)}}" alt=""></a>
                                    </div>
                                </div>
                                <div class="media-body d-flex ">
                                    <div class="col-sm-6 ">
                                        <label class="col-form-label"> تعديل صورة عقد الزواج</label>
                                        <input type="file" name='contract_img' accept="image/*"
                                               value="{{asset('storage/'.$client->contract_img)}}" placeholder="">


                                    </div>
                                    <div class="col-sm-6 ">
                                        <a target="_blank" href="{{asset('storage/'.$client->contract_img)}}"><img
                                                class="b-r-10" width="50px" height="50px"
                                                src="{{asset('storage/'.$client->contract_img)}}" alt=""></a>
                                    </div>
                                </div>

                            </div>

                        </div>

                        <div class="card-footer text-center">
                            <button class="btn btn-primary m-r-15" type="submit">تعديل</button>

                            <a href="{{route('clients.index',array('branch' => request()->get('branch')))}}">
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
    <script src="https://7agz.com/Mktba/themes/7agz-2021/assets/vendor/intl-input2/js/intlTelInput.js"></script>

    <script>
        var phone_number = window.intlTelInput(document.querySelector("#lb_phone"), {
            separateDialCode: true,
            formatOnDisplay: true,
            preferredCountries: ["kw"],
            hiddenInput: "full",
            utilsScript: "{{asset('assets/js/utils.js')}}"
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
