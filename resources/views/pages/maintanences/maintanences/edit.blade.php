@extends('layouts.admin')
@section('title', ' تعديل صيانه')

@section('content')
    <div class="container-fluid" style="background: #f4f4f4;">
        <div class="row">
            <form class="mega-vertical" action="{{route('maintenances.update',$maintenance->id)}}" method="post"
                  enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="col-sm-12 p-20">
                    <div class="card height-equal">
                        <div class="card-header">
                            <h5>   تعديل صيانه </h5>
                        </div>
                        <div class="card-body">

                            <div class="row">
                            <div class="col-sm-12">
                                    <div class="media-body">
                                        <div class="mb-3 row">
                                            <label class="col-sm-12 col-form-label">نوع الشقه</label>
                                            
                                            <div class="col-sm-9">
                                            <select class="form-select digits choosetype"  id="exampleFormControlSelect9" name="type_id">
                                                        <option value=''>اختر النوع</option>
                                                        @foreach($types as $type)  
                                                          <option value='{{$type->id}}' {{$maintenance->type_id==$type->id?'selected':''}}>{{$type->name}}</option>
                                                        @endforeach
                                                        
                                                  
                                            </select>
                                                @error('type_id')
                                                <div style='color:red'>{{$message}}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <input type='hidden' value='{{$maintenance->apart_id}}' class="apartval"/>
                                <div class="col-sm-12">
                                    <div class="media-body">
                                        <div class="mb-3 row">
                                            <label class="col-sm-12 col-form-label"> الشقه</label>
                                            
                                            <div class="col-sm-9 aparts ">
                                            <select class="form-select digits " id="exampleFormControlSelect9" name="apart_id">       
                                            </select>
                                                @error('apart_id')
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
                                            <select class="form-select digits" id="exampleFormControlSelect9" name="content_id">
                                                        <option value=''>اختر المرافق</option>
                                                        @foreach($homeContents as $homeContent)  
                                                          <option value='{{$homeContent->id}}' {{$maintenance->content_id==$homeContent->id?'selected':''}} >{{$homeContent->name}}</option>
                                                        @endforeach
                                                        
                                                  
                                            </select>
                                                @error('content_id')
                                                <div style='color:red'>{{$message}}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <div class="media-body">
                                        <div class="mb-3 row">
                                            <label class="col-sm-12 col-form-label">المطلوب</label>
                                            @foreach($requires as $require)
                                                <div class="col-sm-3">
                                                    <input type="checkbox" name='require_id' value="{{$require->id}}" {{$maintenance->require_id==$require->id?'checked':''}} class="" placeholder="">{{$require->name}}
                                                </div>
                                            @endforeach
                                            <div class="col-sm-12">
                                                @error('require_id')
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
                                                <input type="text" name='reason'
                                                       value="{{$maintenance->reason}}" class="form-control"
                                                       placeholder="">
                                                @error('reason')
                                                <div style='color:red'>{{$message}}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="media-body">
                                        <div class="mb-3 row">
                                            <label class="col-sm-12 col-form-label"> ملاحظه </label>
                                            <div class="col-sm-9">
                                               
                                                <textarea class="form-control"  type="text" name='note'
                                                      placeholder="ادخل الملاحظة">{{$maintenance->note}}</textarea>
                                                @error('note')
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
                            <a href="{{route('maintenances.index')}}"> <button type="button" class="btn btn-light">إلغاء</button></a>

                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>


@endsection
@section('scripts')
<script>
$(document).ready(function() {
   $('.choosetype').change(function() {
        var id= $(this).val();
        var url = "{{ route('apartTypes.getapart', ":id") }}";
           url = url.replace(':id', id);
          
        $.ajax({
            url:url,
            type: 'post',
            dataType: 'json',
            data: {
                '_token' : '{{ csrf_token() }}',
             
            },
            success: function(response) {
                $(".aparts").html(response.data);
            }
        });
    });


    var id= $('.choosetype').val();
        
        if(id !=''){
      
            var url = "{{ route('apartTypes.getapart', ":id") }}";
           url = url.replace(':id', id);
           apartVal=$('.apartval').val()
        $.ajax({
            url:url,
            type: 'post',
            dataType: 'json',
            data: {
                '_token' : '{{ csrf_token() }}',
                'apartVal':apartVal
            },
            success: function(response) {
                $(".aparts").html(response.data);
            }
        });
    }

    

  

});



</script>
@endsection

