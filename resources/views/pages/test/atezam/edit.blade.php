@extends('layouts.admin')
@section('title', ' اضافه التزام')

@section('content')
<div class="container-fluid" style="background: #f4f4f4;">
    <div class="row">
        <form class="mega-vertical" action="" method="post" enctype="multipart/form-data">
            @csrf
            <div class="col-sm-12 p-20">
                <div class="card height-equal">
                    <div class="card-header">
                        <h5> التزام جديدة</h5>
                    </div>
                    <div class="card-body">

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="media-body">
                                    <div class="mb-3 row">
                                        <label class="col-sm-12 col-form-label">الفرع</label>
                                        <div class="col-sm-9">
                                            <select class="form-select digits" id="exampleFormControlSelect9"
                                                name="branch_id" value="{{old('branch_id')}}">
                                                <option value=''>اختر الفرع</option>

                                                <option selected>الاهل</option>
                                                <option>الاقارب</option>
                                                <option>اخرى</option>

                                            </select>
                                            @error('branch_id')
                                            <div style='color:red'>{{$message}}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>



                            <div class="col-sm-12">
                                <div class="media-body">
                                    <div class="mb-3 row">
                                        <label class="col-sm-12 col-form-label"> الاسم </label>
                                        <div class="col-sm-9">
                                            <input type="text" value="محمد" name='owner' value="{{old('owner')}}"
                                                class="form-control" placeholder="">
                                            @error('owner')
                                            <div style='color:red'>{{$message}}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>



                            <div class="col-sm-12">
                                <div class="media-body">
                                    <div class="mb-3 row">
                                        <label class="col-sm-12 col-form-label"> الدولة </label>
                                        <div class="col-sm-9">
                                            <input type="text" name='owner'
                                                class="form-control" value="الكويت" placeholder="">
                                            @error('owner')
                                            <div style='color:red'>{{$message}}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="media-body">
                                    <div class="mb-3 row">
                                        <label class="col-sm-12 col-form-label"> التليفون </label>
                                        <div class="col-sm-9">
                                            <input type="text" name='owner' 
                                                class="form-control" value="098744" placeholder="">
                                            @error('owner')
                                            <div style='color:red'>{{$message}}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="media-body">
                                    <div class="mb-3 row">
                                        <label class="col-sm-12 col-form-label">المبلغ </label>
                                        <div class="col-sm-9">
                                            <input type="text"  value="998" name='owner' value="{{old('owner')}}"
                                                class="form-control" placeholder="">
                                            @error('owner')
                                            <div style='color:red'>{{$message}}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="media-body">
                                    <div class="mb-3 row">
                                        <label class="col-sm-12 col-form-label"> رقم الحساب </label>
                                        <div class="col-sm-9">
                                            <input type="text" value="55555" name='owner' value="{{old('owner')}}"
                                                class="form-control" placeholder="">
                                            @error('owner')
                                            <div style='color:red'>{{$message}}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="media-body">
                                    <div class="mb-3 row">
                                        <label class="col-sm-12 col-form-label"> النوع </label>
                                        <div class="col-sm-9">
                                            <input type="radio" name='type' checked value="" class="" placeholder="">يعمل
                                            <br />
                                            <br />
                                            <input type="radio" name='type' value="" class="" placeholder="">متوقف

                                            @error('type')
                                            <div style='color:red'>{{$message}}</div>
                                            @enderror
                                        </div>
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
                        <button class="btn btn-primary m-r-15" type="submit">تعديل</button>
                        <a href="{{url('apartments')}}"> <button type="button" class="btn btn-light">إلغاء</button></a>

                    </div>
                </div>
            </div>
        </form>
    </div>
</div>


@endsection
@section('scripts')
@endsection