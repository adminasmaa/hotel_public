
@extends('layouts.admin')
@section('title', ' أنواع التقييم')
@section('content')
<div class="container-fluid">
          <div class="row">
          <form class="mega-vertical" action="{{route('rating_types.update',$type->id)}}" method="post"
                  enctype="multipart/form-data">
                @csrf
                @method('PUT')
              <div class="col-sm-12 col-xxl-12 box-col-12 p-20">
                <div class="card height-equal">
                  <div class="card-header">
                      <h5>تعديل نوع  </h5>
                  </div>
                  <div class="card-body">
                    <div class="row">       

                      <div class="col-sm-6">
                        <div class="media-body">
                          <div class="mb-3 row">
                            <label class="col-sm-12 col-form-label"> المهنة</label>
                            <div class="col-sm-9">
                            <select class="form-select digits"  name="profession_id" >
                              <option value='profession_id'>اختر المهنة</option>
                                        @foreach($professions as $profession)
                                          <option value='{{$profession->id}}'  {{$type->profession_id==$profession->id?'selected':''}} >{{$profession->name}}</option>
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
                            <label class="col-sm-12 col-form-label">  النوع  </label>
                            <div class="col-sm-9">
                              <input class="form-control"  name="name" value="{{$type->name}}">
                            </div>
                          </div>
                        </div>
                      </div>

                  </div>
                </div>
                <div class="col-md-12">
                  <div class="card-footer text-center">
                            <button class="btn btn-primary m-r-15" type="submit">تعديل</button>
                            <a href="{{route('rating_types.index')}}"> <button type="button" class="btn btn-light">إلغاء</button></a> 
                        </div>
                </div> 
              </div>
           </div>

            </form>
          </div>
        </div>
@endsection
