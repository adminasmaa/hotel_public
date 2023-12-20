@extends('layouts.admin')
@section('title', 'التسليم')

@section('content')
<div class="container-fluid" style="background: #f4f4f4;">
    <div class="row">
        <form class="mega-vertical" action="" method="post" enctype="multipart/form-data">
            @csrf
            <div class="col-sm-12 p-20">
                <div class="card height-equal">
                    <div class="card-header">
                        <h5>اضافه فاتورة</h5>
                    </div>
                    <div class="card-body">

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="media-body">
                                    <div class="mb-3 row">
                                        <label class="col-sm-12 col-form-label">الموظف</label>
                                        <div class="col-sm-9">
                                            <select class="form-select digits" id="exampleFormControlSelect9"
                                                name="branch_id" value="{{old('branch_id')}}">
                                                <option value=''>اختر الموظف</option>
                                                @foreach(App\Models\hr\Employee::all() as $branch)
                                                          <option value='{{$branch->id}}' >{{$branch->user_name}}</option>
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
                                        <label class="col-sm-12 col-form-label"> السبب </label>
                                        <div class="col-sm-9">
                                     <textarea name="reason" id="" class="form-control" rows="10"></textarea>
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
                                            <input type="checkbox" name='type' value="" class="" placeholder="">اضافه فى الفواتير
                                           

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
                        <button class="btn btn-primary m-r-15" type="submit">اضافه</button>
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