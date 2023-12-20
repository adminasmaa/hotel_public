@extends('layouts.admin')
@section('title', ' اضافه نوع الشقه')

@section('content')
    <div class="container-fluid" style="background: #f4f4f4;">
        <div class="row">
            <form class="mega-vertical" action="{{route('apartTypes.store')}}" method="post"
                  enctype="multipart/form-data">
                @csrf
                <div class="col-sm-12 p-20">
                    <div class="card height-equal">
                        <div class="card-header">
                            <h5> نوع شقه جديدة</h5>
                        </div>
                        <div class="card-body">

                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="media-body">
                                        <div class="mb-3 row">
                                            <label class="col-sm-12 col-form-label"> الأسم </label>
                                            <div class="col-sm-9">
                                                <input type="text" name='name'
                                                       value="{{old('name')}}" class="form-control"
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
                                                       value="{{old('type_name')}}" class="form-control"
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
                                                          <option value='{{$bedType->id}}' {{old('bed_id')==$bedType->id?'selected':''}} >{{$bedType->name}}</option>
                                                        @endforeach
                                                      

                                            </select>
                                                @error('bed_id')
                                                <div style='color:red'>{{$message}}</div>
                                                @enderror
                                            </div>
                                            <div style="padding-right:0px" class="col-sm-3"><a
                                                        href="{{route('bedTypes.index')}}"><i
                                                            class="fa fa-plus-square"></i></a></div>
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
                                                          <option value='{{$viewType->id}}' {{old('view_id')==$viewType->id?'selected':''}} >{{$viewType->name}}</option>
                                                        @endforeach
                                                      

                                            </select>
                                                @error('view_id')
                                                <div style='color:red'>{{$message}}</div>
                                                @enderror
                                            </div>
                                            <div style="padding-right:0px" class="col-sm-3"><a
                                                        href="{{route('viewTypes.index')}}"><i
                                                            class="fa fa-plus-square"></i></a></div>
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
                                                          <option value='{{$branch->id}}' {{old('branch_id')==$branch->id?'selected':''}}>{{$branch->name}}</option>
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
                                            <!-- <select class="form-select digits" id="exampleFormControlSelect9" name="content_id[]" multiple>
                                                        <option value=''>اختر المرافق</option>
                                                        @foreach($homeContents as $homeContent)  
                                                          <option value='{{$homeContent->id}}' >{{$homeContent->name}}</option>
                                                        @endforeach
                                                        
                                                  
                                            </select> -->
                                              @foreach($homeContents as $homeContent) 
                                                <div class="col-sm-3">
                                                    <input type="checkbox" name='content_id[]' value="{{$homeContent->id}}" class="" placeholder="" >{{$homeContent->name}}
                                                </div>
                                                @endforeach
                                                @error('content_id')
                                                <div style='color:red'>{{$message}}</div>
                                                @enderror
                                            </div>

                                            <div style="padding-right:0px" class="col-sm-3"><a
                                                        href="{{route('homeContents.index')}}"><i
                                                            class="fa fa-plus-square"></i></a></div>
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

