@extends('layouts.admin')
@section('title', ' اضافه الشقه')

@section('content')
    <div class="container-fluid" style="background: #f4f4f4;">
        <div class="row">
            <form class="mega-vertical" action="{{route('apartments.store')}}" method="post"
                  enctype="multipart/form-data">
                @csrf
                <div class="col-sm-12 p-20">
                    <div class="card height-equal">
                        <div class="card-header">
                            <h5> شقه جديدة</h5>
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
                                            <label class="col-sm-12 col-form-label"> الدور </label>
                                            <div class="col-sm-9">
                                                <input type="number" name='floor'
                                                       value="{{old('floor')}}" class="form-control"
                                                       placeholder="">
                                                @error('floor')
                                                <div style='color:red'>{{$message}}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="media-body">
                                        <div class="mb-3 row d-flex">
                                            <label class="col-sm-12 col-form-label">صورة الشقه</label>
                                            <div class="col-sm-9">
                                                <input type="file" name='image' class="form-control">
                                            </div>
                                            @error('image')
                                                <div style='color:red'>{{$message}}</div>
                                                @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-3 mt-0 col-md-9">
                                        <label for="task-title">الوصف </label>
                                        <textarea class="form-control" id="desc" name="desc"
                                            autocomplete="off"></textarea>
                                        @error('desc')
                                        <div style='color:red'>{{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <!-- <div class="col-sm-12">
                                    <div class="media-body">
                                        <div class="mb-3 row">
                                            <label class="col-sm-12 col-form-label"> السعر </label>
                                            <div class="col-sm-9">
                                                <input type="number" name='price'
                                                       value="{{old('price')}}" class="form-control"
                                                       placeholder="">
                                                @error('price')
                                                <div style='color:red'>{{$message}}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div> -->
                            <div class="d-flex mb-3">
                                <input type="radio" value="day" name="type" {{ old('type') == 'day' ? 'checked' : ''}} />
                                السعر حسب اليوم
                            </div>
                            <div class="d-flex mb-3">
                                <input type="radio" value="week" name="type" {{old('type')=="week"?"checked":""}} /> السعر
                                حسب الاسبوع
                            </div>


                            <div class="col-sm-12 day type" style="display:none">
                                <div class="col-sm-12">

                                    <div class="media-body">
                                        <div class="mb-3 row">
                                            <label class="col-sm-12 col-form-label">سعر اليوم العادى<span
                                                    class=" text-danger">*</span></label>
                                            <div class="col-sm-9">
                                                <input class="form-control" type="number" name="p_day"
                                                    value="{{old('p_day')}}">
                                                @error('p_day')
                                                <div style='color:red'>{{$message}}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12">

                                    <div class="media-body">
                                        <div class="mb-3 row">
                                            <label class="col-sm-12 col-form-label">سعر العطله<span
                                                    class=" text-danger">*</span></label>
                                            <div class="col-sm-9">
                                                <input class="form-control" type="number" name="p_week"
                                                    value="{{old('p_week')}}">
                                                @error('p_week')
                                                <div style='color:red'>{{$message}}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 week type" style="display:none">
                                <div class="col-sm-12">

                                    <div class="media-body">
                                        <div class="mb-3 row">
                                            <label class="col-sm-12 col-form-label">بدايه الاسبوع(من الاحد الى
                                                الاربعاء)<span class=" text-danger">*</span></label>
                                            <div class="col-sm-9">
                                                <input class="form-control" type="number" name="prices[]"
                                                    value="{{old('prices.0')}}">
                                                @error('prices.0')
                                                <div style='color:red'>{{$message}}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12">

                                    <div class="media-body">
                                        <div class="mb-3 row">
                                            <label class="col-sm-12 col-form-label">نهايه الاسبوع(من الخميس الى
                                                السبت)<span class=" text-danger">*</span></label>
                                            <div class="col-sm-9">
                                                <input class="form-control" type="number" name="prices[]"
                                                    value="{{old('prices.1')}}">
                                                @error('prices.1')
                                                <div style='color:red'>{{$message}}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12">

                                    <div class="media-body">
                                        <div class="mb-3 row">
                                            <label class="col-sm-12 col-form-label"><span
                                                    class=" text-danger">*</span>الاسبوع كامل من (من الاحد الى
                                                السبت)</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" type="number" name="prices[]"
                                                    value="{{old('prices.2')}}">
                                                @error('prices.2')
                                                <div style='color:red'>{{$message}}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                <div class="col-sm-12">
                                    <div class="media-body">
                                        <div class="mb-3 row">
                                            <label class="col-sm-12 col-form-label"> المساحة </label>
                                            <div class="col-sm-9">
                                                <input type="number" name='area'
                                                       value="{{old('area')}}" class="form-control"
                                                       placeholder="">
                                                @error('area')
                                                <div style='color:red'>{{$message}}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="media-body">
                                        <div class="mb-3 row">
                                            <label class="col-sm-12 col-form-label"> عدد الوحدات </label>
                                            <div class="col-sm-9">
                                                <input type="number" name='units'
                                                       value="{{old('units')}}" class="form-control"
                                                       placeholder="">
                                                @error('units')
                                                <div style='color:red'>{{$message}}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>




                                <div class="col-sm-12">

                                    <div class="media-body">
                                        @if(!Session::get('branch'))
                                        <div class="mb-3 row">
                                            <label class="col-sm-12 col-form-label">نوع الشقه</label>

                                            <div class="col-sm-9">
                                            <select class="form-select digits choosetype"  id="exampleFormControlSelect9" name="type_id">
                                                        <option value=''>اختر النوع</option>
                                                        @foreach($types as $type)
                                                          <option value='{{$type->id}}' {{old('type_id')==$type->id?'selected':''}}>{{$type->name}}</option>
                                                        @endforeach


                                            </select>
                                                @error('type_id')
                                                <div style='color:red'>{{$message}}</div>
                                                @enderror
                                            </div>
                                            <div style="padding-right:0px" class="col-sm-3"><a
                                                        href="{{route('apartTypes.create')}}"><i
                                                            class="fa fa-plus-square"></i></a></div>
                                        </div>
                                        @else
                                            <div class="col-sm-9">
                                                <select class="form-select digits choosetype"  id="exampleFormControlSelect9" name="type_id">
                                                    <option value=''>اختر النوع</option>
                                                    @foreach($types as $type)
                                                        <option value='{{$type->id}}' {{old('type_id')==$type->id?'selected':''}}>{{$type->name}}</option>
                                                    @endforeach


                                                </select>
                                                @error('type_id')
                                                <div style='color:red'>{{$message}}</div>
                                                @enderror
                                            </div>
                                        @endif
                                    </div>

                                </div>
                                <div class="col-sm-12 values">

                                </div>
                                @error('value_id')
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
                            <a href="{{url('apartments')}}"> <button type="button" class="btn btn-light">إلغاء</button></a>

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
        var url = "{{ route('aparts.getValue', ":id") }}";
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

            var url = "{{ route('aparts.getValue', ":id") }}";
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

var radioval = $("input[type=radio][name='type']:checked").val();
if (radioval == 'day' || radioval == 'week') {
    $('.' + radioval).show();
}
$('input[type=radio][name=type]').change(function() {
    $('.type').hide();
    $('.' + $(this).val()).show();
});

</script>
@endsection

