@extends('layouts.admin')
@section('title', ' اضافه وصله')

@section('content')
<div class="container-fluid" style="background: #f4f4f4;">
    <div class="row">
        <form class="mega-vertical" action="" method="post" enctype="multipart/form-data">
            @csrf
            <div class="col-sm-12 p-20">
                <div class="card height-equal">
                    <div class="card-header">
                        <h5> وصله ايجار جديدة</h5>
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
                                                @foreach(App\Models\hr\Branch::all() as $branch)
                                                <option value='{{$branch->id}}'>{{$branch->name}}</option>
                                                @endforeach


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
                                        <label class="col-sm-12 col-form-label"> الشهر </label>
                                        <div class="col-sm-9">
                                            <input type="text" name='owner' value="{{old('owner')}}"
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
                                        <label class="col-sm-12 col-form-label"> المبلغ </label>
                                        <div class="col-sm-9">
                                            <input type="text" name='owner' value="{{old('owner')}}"
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
                                        <label class="col-sm-12 col-form-label"> طريقة الدفع </label>
                                        <div class="col-sm-9 d-flex" style="justify-content: space-between;">
                                            <div><input type="radio" name='type' checked value="" class="" placeholder="">شيك</div>
                                            <div> <input type="radio" name='type' value="" class="" placeholder="">تحويل</div>
                                            <div> <input type="radio" name='type' value="" class="" placeholder="">كاش       </div>
                                            
                                           
                                           
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="media-body">
                                    <div class="mb-3 row">
                                        <label class="col-sm-12 col-form-label">البنك</label>
                                        <div class="col-sm-9">
                                            <select class="form-select digits" id="exampleFormControlSelect9"
                                                name="bank_id" value="{{old('bank_id')}}">
                                                <option value=''>اختر الفرع</option>
                                                @foreach(App\Models\hr\Bank::all() as $bank)
                                                <option value='{{$bank->id}}'>{{$bank->name}}</option>
                                                @endforeach


                                            </select>
                                            @error('bank_id')
                                            <div style='color:red'>{{$message}}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="media-body">
                                    <div class="mb-3 row">
                                        <label class="col-sm-12 col-form-label">الملف الاول</label>
                                        <div class="col-sm-9">
                                            <input type="file" name='owner'
                                                class="form-control" placeholder="">
                                           
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="media-body">
                                    <div class="mb-3 row">
                                        <label class="col-sm-12 col-form-label">الملف الثانى</label>
                                        <div class="col-sm-9">
                                            <input type="file" name='owner'
                                                class="form-control" placeholder="">
                                           
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
                        <button class="btn btn-primary m-r-15" type="submit">حفظ</button>
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