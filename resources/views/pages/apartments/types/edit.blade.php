@extends('layouts.admin')
@section('title', ' تعديل نوع الشقه')

@section('content')
    <div class="container-fluid" style="background: #f4f4f4;">
        <div class="row">
            <form class="mega-vertical" action="{{route('apartTypes.update',$apartType->id)}}" method="post"
                  enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="col-sm-12 p-20">
                    <div class="card height-equal">
                        <div class="card-header">
                            <h5> نوع شقه </h5>
                        </div>
                        <div class="card-body">

                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="media-body">
                                        <div class="mb-3 row">
                                            <label class="col-sm-12 col-form-label"> الأسم </label>
                                            <div class="col-sm-9">
                                                <input type="text" name='name'
                                                       value="{{old('name',$apartType->name)}}" class="form-control"
                                                       placeholder="">
                                                @error('name')
                                                <div style='color:red'>{{$message}}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="media-body">
                                        <div class="mb-3 row">
                                            <label class="col-sm-12 col-form-label"> مسمى نوع الشقه </label>
                                            <div class="col-sm-9">
                                                <input type="text" name='type_name'
                                                       value="{{old('type_name',$apartType->type_name)}}" class="form-control"
                                                       placeholder="">
                                                @error('type_name')
                                                <div style='color:red'>{{$message}}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>

                              

                                <div class="col-sm-12">
                                    <div class="media-body">
                                        <div class="mb-3 row">
                                            <label class="col-sm-12 col-form-label">نوع السرير</label>
                                            <div class="col-sm-9">
                                            <select class="form-select digits" style="width: 100%;" id="exampleFormControlSelect9" name="bed_id">
                                                        <option value=''>اختر النوع</option>
                                                        @foreach($bedTypes as $bedType)
                                                          <option value='{{$bedType->id}}' {{$apartType->bed_id==$bedType->id?'selected':''}} >{{$bedType->name}}</option>
                                                        @endforeach
                                                      

                                            </select>
                                                @error('bed_id')
                                                <div style='color:red'>{{$message}}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="media-body">
                                        <div class="mb-3 row">
                                            <label class="col-sm-12 col-form-label">نوع الاطلالة</label>
                                            <div class="col-sm-9">
                                            <select class="form-select digits" style="width: 100%;" id="exampleFormControlSelect9" name="view_id">
                                                        <option value=''>اختر النوع</option>
                                                        @foreach($viewTypes as $viewType)
                                                          <option value='{{$viewType->id}}' {{$apartType->view_id==$viewType->id?'selected':''}} >{{$viewType->name}}</option>
                                                        @endforeach
                                                      

                                            </select>
                                                @error('view_id')
                                                <div style='color:red'>{{$message}}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="media-body">
                                        <div class="mb-3 row">
                                            <label class="col-sm-12 col-form-label">الفرع</label>
                                            <div class="col-sm-9">
                                            <select class="form-select digits" style="width: 100%;" id="exampleFormControlSelect9" name="branch_id" value="{{old('branch_id')}}">
                                                        <option value=''>اختر الفرع</option>
                                                        @foreach($branches as $branch)
                                                          <option value='{{$branch->id}}' {{$apartType->branch_id==$branch->id?'selected':''}}>{{$branch->name}}</option>
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
                                            <label class="col-sm-12 col-form-label">مرافق الشقه</label>
                                            
                                            <div class="col-sm-9">
                                           
                                            @foreach($homeContents as $homeContent) 
                                                <div class="col-sm-3">
                                                    <input type="checkbox" name='content_id[]' value="{{$homeContent->id}}" class="" placeholder="" @if(in_array($homeContent->id,$values)) checked @endif>{{$homeContent->name}}
                                                </div>
                                                @endforeach
                                                @error('content_id')
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
                            <a href="{{route('apartTypes.index')}}"> <button type="button" class="btn btn-light">إلغاء</button></a>

                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>


@endsection
@section('scripts')
@endsection

