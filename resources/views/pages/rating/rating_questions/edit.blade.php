@extends('layouts.admin')
@section('title', 'اسئلة التقييم')
@section('content')
<div class="container-fluid">
        <div class="row">
          <form class="mega-vertical" action="{{route('rating_questions.update',$quest->id)}}" method="post"
                  enctype="multipart/form-data">
                @csrf
                @method('PUT')
              <div class="col-sm-12 col-xxl-12 box-col-12 p-20">
                <div class="card height-equal">
                  <div class="card-header">
                      <h5>تعديل  سؤال </h5>
                  </div>
                  <div class="card-body">
                    <div class="row">
                      <div class="col-sm-6">
                        <div class="media-body">
                          <div class="mb-3 row">
                            <label class="col-sm-12 col-form-label"> المهنة <span  class=" text-danger">*</span></label>
                            <div class="col-sm-9">
                            <select class="form-select digits" id="exampleFormControlSelect9" name="profession_id" >
                              <option value=''>اختر المهنة</option>
                                        @foreach($professions as $profession)
                                             <option value="{{$profession->id}}" {{$quest->profession_id==$profession->id?'selected':''}} >{{$profession->name}}</option>
                                         @endforeach
                              </select>
                              @error('profession_id')
                                          <div style='color:red'>{{$message}}</div>
                               @enderror  
                               </div>  
                          </div>
                        </div>
                      </div>


                      <div class="col-sm-6">
                        <div class="media-body">
                          <div class="mb-3 row">
                            <label class="col-sm-12 col-form-label"> نوع التقييم <span  class=" text-danger">*</span></label>
                            <div class="col-sm-9">
                            <select class="form-select digits" id="exampleFormControlSelect9" name="type_id" >
                              <option value=''>اختر النوع</option>
                                        @foreach($rating_types as $rating_type)
                                        <option value="{{old('type_id',$rating_type->id)}}" {{$quest->type_id==$rating_type->id?'selected':''}} >{{$rating_type->name}}</option>
                                                    @endforeach
                              </select>
                              @error('type_id')
                                          <div style='color:red'>{{$message}}</div>
                               @enderror  
                              
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="media-body">
                          <div class="mb-3 row">
                            <label class="col-sm-12 col-form-label"> أدخل السؤال <span  class=" text-danger">*</span></label>
                            <div class="col-sm-9">
                            <textarea class="form-control"  rows="3" name="text" >{{$quest->text}}</textarea>
                             
                                              @error('text')
                                                <div style='color:red'>{{$message}}</div>
                                                @enderror       
                            </div>
                          </div>
                        </div>
                      </div>

                <div class="col-md-12">
                  <div class="card">
                  <div class="card-footer text-center">
                            <button class="btn btn-primary m-r-15" type="submit">تعديل</button>
                            <a href="{{route('rating_questions.index')}}"> <button type="button" class="btn btn-light">إلغاء</button></a>
                        </div>

                  </div>
                </div>
              </div>

             </div>
					 </div>
             </div>
      
            </form>
          </div>
        </div>

@endsection

