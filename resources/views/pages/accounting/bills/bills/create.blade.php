@extends('layouts.admin')
@section('title', ' اضافه ' . $name)

@section('content')
    <div class="container-fluid" style="background: #f4f4f4;">
        <div class="row">
            <form class="mega-vertical" action="{{route('bills.store')}}" method="post"
                  enctype="multipart/form-data">
                @csrf
                <div class="col-sm-12 p-20">
                    <div class="card height-equal">
                        <div class="card-header">
                            <h5>  {{$name=="معتمدين" ? "اضافه":$name}} جديدة</h5>
                        </div>
                        <div class="card-body">

                            <div class="row">
                                <input type="hidden" name="name" value="{{request()->has('name')?request()->get('name'):'bills'}}">
                                <div class="col-sm-12">
                                    <div class="media-body">
                                        <div class="mb-3 row">
                                            <label class="col-sm-12 col-form-label"> المبلغ <span
                                                    class=" text-danger">*</span></label>
                                            <div class="col-sm-9">
                                                <input type="number" class="mobileNumber form-control" maxlength="20"
                                                        value="{{old('value')}}" name="value" title="">
                                                @error('value')
                                                <div style='color:red'>{{$message}}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="media-body">
                                        <div class="mb-3 row">
                                            <label class="col-sm-12 col-form-label"> انواع الفواتير <span
                                                    class=" text-danger">*</span></label>
                                            
                                            <div class="col-sm-9">
                                            <select class="form-select digits choosetype"  id="exampleFormControlSelect9" name="type_id">
                                                        <option value=''>اختر نوع</option>
                                                        @foreach($types as $type)  
                                                          <option value='{{$type->id}}' {{old('type_id')==$type->id?'selected':''}}>{{$type->name}}</option>
                                                        @endforeach                            
                                                  
                                            </select>
                                                @error('type_id')
                                                <div style='color:red'>{{$message}}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 values">
                                </div>
                                @if(!Session::has('branch'))
                                <div class="col-sm-12">
                                    <div class="media-body">
                                        <div class="mb-3 row">
                                            <label class="col-sm-12 col-form-label">فرع <span
                                                    class=" text-danger">*</span></label>
                                            
                                            <div class="col-sm-9">
                                            <select class="form-select digits"  id="exampleFormControlSelect9" name="branch_id">
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
                                @else
                                  <input type="hidden" name="branch_id" value="{{Session::get('branch')}}">
                                @endif
                                <div class="col-sm-12">
                                    <div class="media-body">
                                        <div class="mb-3 row">
                                            <label class="col-sm-12 col-form-label"> التاريخ <span
                                                    class=" text-danger">*</span></label>
                                            <div class="col-sm-9">
                                                <input type="date" min="{{date('Y-m-d')}}" class="form-control" maxlength="20"
                                                        value="" name="date" title="">
                                                @error('date')
                                                <div style='color:red'>{{$message}}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="media-body">
                                        <div class="mb-3 row">
                                            <label class="col-sm-12 col-form-label"> الوصف </label>
                                            <div class="col-sm-9">
                                               
                                                <textarea class="form-control"  type="text" name='desc'
                                                      ></textarea>
                                                @error('desc')
                                                <div style='color:red'>{{$message}}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @if(request()->has('name')&&request()->get('name')!='bills')
                                <div class="col-sm-12">
                                    <div class="media-body">
                                        <div class="mb-3 row">
                                            <label class="col-sm-12 col-form-label"> اضافه الى الفواتير </label>
                                            <div class="col-sm-9">
                                               
                                                <input type="checkbox" name="is_bill" id="">
                                             
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endif

                              
                              
                                
                            </div>

                        </div>

                    </div>
                </div>
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-footer text-center">
                            <button class="btn btn-primary m-r-15" type="submit">حفظ</button>
                            <a href="{{route('bills.index',array('name'=>request()->get('name')))}}"> <button type="button" class="btn btn-light">إلغاء</button></a>

                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>


@endsection
@section('scripts')
<script type="text/javascript">
$(document).ready(function() {
   $('.choosetype').change(function() {

        var id= $(this).val();
        var url = "{{ route('billsSubTypes.getType', ":id") }}";
           url = url.replace(':id', id);
        $.ajax({
            url:url,
            type: 'post',
            dataType: 'json',
            data: {
                '_token' : '{{ csrf_token() }}'
            },
            success: function(response) {
                $(".values").html(response.data);
            }
        });
    });


    var id= $('.choosetype').val();

        if(id !=''){

            var url = "{{ route('billsSubTypes.getType', ":id") }}";
           url = url.replace(':id', id);
        $.ajax({
            url:url,
            type: 'post',
            dataType: 'json',
            data: {
                '_token' : '{{ csrf_token() }}'
            },
            success: function(response) {
                $(".values").html(response.data);
            }
        });
    }
});
</script>
@endsection


