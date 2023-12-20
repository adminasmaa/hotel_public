@extends('layouts.admin')
@section('title', ' التقييم')
@section('content')
<div class="container-fluid">
        <div class="row">

          <form class="mega-vertical" action="{{route('rating.add_rate')}}" method="get"
                  enctype="multipart/form-data" autocomplete="off">
                @csrf

              <div class="col-sm-12 col-xxl-12 box-col-12 p-20">
                <div class="card height-equal">
                  <div class="card-header">
                      <h5>إضافة  تقييم </h5>
                  </div>
                  <div class="card-body">
                    <div class="row">
                      <div class="col-sm-6">
                        <div class="media-body">
                          <div class="mb-3 row">
                            <label class="col-sm-12 col-form-label"> المهنة <span  class=" text-danger">*</span></label>
                            <div class="col-sm-9">
                             
                            <select class="form-select digits" name="profession_id" id="profession_id" onchange="getId(this)">
                              <option value=''>اختر المهنة</option>
                                        @foreach($professions as $profession)
                                              @if(!empty($profession))
                                               <option value='{{$profession->id}}' >{{$profession->name}}</option>
                                              @else
                                                <div> Currently there is no notification</div>
                                              @endif
                                        @endforeach
                              </select>
                                  @error('profession_id')
                                          <div style='color:red'>{{$message}}</div>
                                  @enderror
                                  <input class="form-control" name="branch_id" id="branch_id"
                                                value="{{Session::has('branch')?Session::get('branch'):'' }}"
                                                type="hidden" autocomplete="off">
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
                            <label class="col-sm-12 col-form-label"> الموظفين <span  class=" text-danger">*</span></label>
                            <div class="row">
                            <div class="col-sm-9">
                            <select class="form-select digits" name="user_id" id="user_id">
                              <option value=''>اختر الموظف</option>
                              </select>
                              @error('user_id')
                                          <div style='color:red'>{{$message}}</div>
                               @enderror
                               </div>
                               <div style="padding-right:0px" class="col-sm-1"><a
                                data-dismiss="modal"
                                title="{{ __(' اضافة جديد') }}"
                                href="{{route('employees.create',array('branch' => request()->get('branch')))}}"><i
                                    class="fa fa-plus-square"></i></a>
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
                          <button class="btn btn-primary m-r-15" type="submit" value="pl">التالى</button>
                        </div>
                  </div>
             </div>
					 </div>
             </div>

            </form>
          </div>
        </div>

@endsection

@section('scripts')
<script type="text/javascript">
    // $(document).ready(function () {
    var prof_id = document.getElementById("profession_id");
    var type_id = document.getElementById("type_id");
 function getId(select){
     var id = $(select).val();
    
     var url = "{{ route('rating.getEmployees', ':id') }}";

     url = url.replace(':id', id);
     // Empty the dropdown
     $('#user_id').find('option').not(':first').remove();
     // AJAX request
     $.ajax({
          url: url,
         type: 'get',
         dataType: 'json',
         success: function(response){
             var len = 0;
         console.log(response['data']);
             if(response['data'] != null){
                  len = response['data'].length;
             }
             if(len > 0){
                  // Read data and create <option >
                  for(var i=0; i<len; i++){
                     var login_id = {{auth()->user()->id}};
                       var u_id = response['data'][i].id;
                       var u_name = response['data'][i].user_name;
                       if(u_id == login_id)
                          continue;
                       var option = "<option value='"+u_id+"'>"+u_name+"</option>";
                       $("#user_id").append(option);
                  }
             }
             else{
              $('#user_id').empty();
              var option = "<option value=''>"+" لا يوجد موظفين بهذا الفرع لهذة المهنة "+"</option>";
              $("#user_id").append(option);
             }
         }


     });

     $('#type_id').find('option').not(':first').remove();
     // AJAX request
     var url2 = "{{ route('rating.getTypes', ':id') }}";
     url2 = url2.replace(':id', id);
     
     $.ajax({
          url: url2,
         type: 'get',
         dataType: 'json',
         success: function(response){
             var len = 0;
            
              let array = $.map(response, function (value, index) {
                        return value;
                       
                    });
                    $.each(array, function (key, value) {

                            $("#type_id").append("<option value='" + value[key].id+ "'>" + value[key].name + "</option>");
                    });
             }
             

       
     });
    }

  //   );
  //  });
    </script>
@endsection
