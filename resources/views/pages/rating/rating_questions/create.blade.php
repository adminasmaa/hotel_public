@extends('layouts.admin')
@section('title', 'اسئلة التقييم')
@section('content')
<div class="container-fluid">
        <div class="row">
          <form class="mega-vertical" action="{{route('rating_questions.store')}}" method="post"
                  enctype="multipart/form-data">
                @csrf
              <div class="col-sm-12 col-xxl-12 box-col-12 p-20">
                <div class="card height-equal">
                  <div class="card-header">
                      <h5>إضافة  سؤال </h5>
                  </div>
                  <div class="card-body">
                    <div class="row">
                      <input type="hidden" name="profession" value="{{request()->profession}}">
                      <input type="hidden" name="type" value="{{request()->type}}">
                      <div class="col-sm-6">
                        <div class="media-body">
                          <div class="mb-3 row">
                            <label class="col-sm-12 col-form-label"> المهنة <span  class=" text-danger">*</span></label>
                           
                            <div class="col-sm-9">
                            <select class="form-select digits" id="profession_id" name='profession_id' onchange="getId(this)">
                              <option value=''>اختر المهنة</option>
                                        @foreach($professions as $profession)
                                       
                                              @if(request()->has('profession') )
                                                  <option value='{{$profession->id}}'  {{request()->profession==$profession->id?'selected':''}} >{{$profession->name}}</option>
                                              @else
                                                   <option value='{{$profession->id}}' >{{$profession->name}}</option>
                                              @endif
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
                            <select class="form-select digits" name="type_id" id="type_id">
                              <option value=''>اختر النوع</option>
                                        <!-- @foreach($rating_types as $rating_type) -->

                                            @if(request()->has('type'))
                                                  <option value='{{$rating_type->id}}'  {{request()->type==$rating_type->id?'selected':''}} >{{$rating_type->name}}</option>
                                              @else
                                              <option value='{{$rating_type->id}}' >{{$rating_type->name}}</option>
                                              @endif 
                                          <!-- @endforeach -->
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
                            <label class="col-sm-12 col-form-label"> أدخل السؤال <span  class=" text-danger">*</span> </label>
                            <div class="col-sm-9">
                            <textarea class="form-control"  rows="3" name="text" ></textarea>

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
                            <button class="btn btn-primary m-r-15" type="submit">حفظ</button>
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
<script  type="text/javascript">

  function getId(select){
    var id = $(select).val();
    $('#type_id').find('option').not(':first').remove();
    // alert(id);
     // AJAX request
     $.ajax({
          url: "{{ ('getTypes/') }}"+id,
         type: 'get',
         dataType: 'json',
         success: function(response){
             var len = 0;
             console.log(response['data'][0].name);
             if(response['data'] != null){
                  len = response['data'].length;
             }
             if(len > 0){
                  // Read data and create <option >
                
                  for(var i=0; i<len; i++){
                       var type_id = response['data'][0].id;
                       var type_name = response['data'][0].name;
                       console.log(response['data'][0].id);
                       var option = "<option value='"+type_id+"'>"+type_name+"</option>";
                       console.log(option);
                       $("#type_id").append(option);
                  }
             }

         }
     });
    }
     </script>
@endsection

