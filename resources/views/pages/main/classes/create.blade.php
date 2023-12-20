@extends('layouts.admin')
@section('title', 'الاصناف')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <form class="mega-vertical" action="{{route('classes.store')}}" method="post"
                  enctype="multipart/form-data">
                @csrf
                <div class="col-sm-12 box-col-12 p-20">
                    <div class="card height-equal">
                        <div class="card-header">
                            <h5>إضافة صنف جديد </h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                    {{--<div class="media-body">
                                            <label class="col-sm-12 col-form-label"> الماركة  <span  class=" text-danger">*</span></label>
                                            <select name='mark_id' class="form-select" aria-label="Default select example">
                                                        <option value=''>اختر الماركة</option>
                                                    @foreach($marks as $mark)
                                                        <option value='{{$mark->id}}' >{{$mark->name}}</option>
                                                    @endforeach
                                            </select>

                                                @error('mark_id')
                                                <div style='color:red'>{{$message}}</div>
                                                @enderror
                                    </div>
--}}
                                    <div class="media-body">
                                            <label class="col-sm-4 col-form-label"> الاسم  <span  class=" text-danger">*</span></label>

                                                <input type="text" name='name'
                                                       value="{{old('name')}}" class="form-control"
                                                       placeholder="">
                                                @error('name')
                                                <div style='color:red'>{{$message}}</div>
                                                @enderror
                                    </div>
                            </div>
                        </div>

                        <div class="card-footer text-center">
                            <button class="btn btn-primary m-r-15" type="submit">حفظ</button>
                            <a href="{{url('classes')}}"> <button type="button" class="btn btn-light">إلغاء</button></a>

                        </div>

                    </div>
                </div>

            </form>
        </div>
    </div>
    @section('scripts')

@endsection
@endsection

