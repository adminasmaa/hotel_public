@extends('layouts.admin')
@section('title', 'الاصناف')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <form class="mega-vertical" action="{{route('classes.update',$class->id)}}" method="post"
                  enctype="multipart/form-data">
                  @csrf
                 @method('PUT')
                <div class="col-sm-12 box-col-12 p-20">
                    <div class="card height-equal">
                        <div class="card-header">
                            <h5>تعديل صنف  </h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                    {{--<div class="media-body">
                                            <label class="col-sm-12 col-form-label"> الماركة  <span  class=" text-danger">*</span></label>
                                            <select name='mark_id' class="form-select" aria-label="Default select example">
                                                        <option value=''>اختر الماركة</option>
                                                    @foreach($marks as $mark)
                                                        <option value="{{old('mark_id', $class->mark_id)}}" {{$class->mark_id==$mark->id?'selected':''}} >{{$mark->name}}</option>
                                                    @endforeach
                                            </select>

                                                @error('mark_id')
                                                <div style='color:red'>{{$message}}</div>
                                                @enderror
                                    </div>--}}

                                    <div class="media-body">
                                            <label class="col-sm-12 col-form-label"> الاسم  <span  class=" text-danger">*</span></label>

                                                <input type="text" name='name'
                                                       value="{{old('name',$class->name)}}" class="form-control"
                                                       placeholder="">
                                                @error('name')
                                                <div style='color:red'>{{$message}}</div>
                                                @enderror
                                    </div>
                            </div>
                        </div>

                        <div class="card-footer text-center">
                            <button class="btn btn-primary m-r-15" type="submit">تعديل</button>
                            <a href="{{url('classes')}}"> <button type="button" class="btn btn-light">إلغاء</button></a>

                        </div>

                    </div>
                </div>

            </form>
        </div>
    </div>


@endsection


