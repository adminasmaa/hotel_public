@extends('layouts.admin')
@section('title', 'المنتجات')

@section('content')
    <div class="container-fluid" style="background: #f4f4f4;">
        <div class="row">
            <form class="mega-vertical" action="{{route('products.update',$product->id)}}" method="post"
                  enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="col-12 p-20">
                    <div class="card height-equal">
                        <div class="card-header">
                            <h5>معلومات المنتج</h5>
                        </div>
                        <div class="card-body">

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="media-body">
                                        <div class="mb-3 row">
                                            <label class="col-sm-12 col-form-label"> اسم المنتج<span
                                                    class=" text-danger">*</span> </label>
                                            <div class="col-sm-9">
                                                <input type="text" name='name'
                                                       value="{{old('name',$product->name)}}" class="form-control"
                                                       placeholder="">
                                                @error('name')
                                                <div style='color:red'>{{$message}}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="media-body">
                                        <div class="mb-3 row">
                                            <label class="col-sm-12 col-form-label"> الموديل </label>
                                            <div class="col-sm-9">
                                                <input type="text" name='modal'
                                                       value="{{old('modal',$product->modal)}}" class="form-control"
                                                       placeholder="">
                                                @error('modal')
                                                <div style='color:red'>{{$message}}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="media-body">
                                        <div class="mb-3 row">
                                            <label class="col-sm-12 col-form-label"> الباركود <span
                                                    class=" text-danger">*</span></label>
                                            <div class="col-sm-9">
                                                <input type="text" name='bar_code'
                                                       value="{{old('bar_code',$product->bar_code)}}"
                                                       class="form-control"
                                                       placeholder="">
                                                @error('bar_code')
                                                <div style='color:red'>{{$message}}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="media-body">
                                        <div class="mb-3 row">
                                            <label class="col-sm-12 col-form-label"> الشركه الموردة <span
                                                    class=" text-danger">*</span></label>
                                            <div class="col-sm-9">
                                                <select name='company_id' class="form-select"
                                                        aria-label="Default select example">
                                                    <option value=''>اختر الشركه</option>
                                                    @foreach($companies as $company)
                                                        <option
                                                            value='{{$company->id}}' {{$company->id==$product->company_id?'selected':''}}>{{$company->name}}</option>
                                                    @endforeach
                                                </select>
                                                @error('company_id')
                                                <div style='color:red'>{{$message}}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="media-body">
                                        <div class="mb-3 row">
                                            <label class="col-sm-12 col-form-label"> الصنف <span
                                                    class=" text-danger">*</span></label>
                                            <div class="col-sm-9">
                                                <select name='class_id' class="form-select" id="class_id"
                                                        aria-label="Default select example">
                                                    <option value=''>اختر  الصنف</option>
                                                    @foreach($classes as $class)
                                                        <option
                                                            value='{{$class->id}}'{{$class->id==$product->class_id?'selected':''}}>{{$class->name}}</option>
                                                    @endforeach
                                                </select>
                                                @error('class_id')
                                                <div style='color:red'>{{$message}}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="media-body">
                                        <div class="mb-3 row">
                                            <label class="col-sm-12 col-form-label"> نوع الصنف </label>

                                            <div class="col-sm-9">
                                                <select name='type_id' class="form-select type_id "
                                                        aria-label="Default select example">
                                                    @if(count($types)>0)
                                                    <option value=''>اختر نوع الصنف</option>
                                                    @foreach($types as $type)
                                                        <option
                                                            value='{{$type->id}}' {{$type->id==$product->type_id?'selected':''}} >{{$type->name}}</option>
                                                    @endforeach
                                                    @else
                                                        <option value=''> لايوجد انواع</option>
                                                    @endif
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
                                            <label class="col-sm-12 col-form-label"> الماركة <span class=" text-danger">*</span></label>
                                            <div class="col-sm-9">
                                                <select name='marks_id' class="form-select"
                                                        aria-label="Default select example">
                                                    <option value=''>اختر الماركة</option>
                                                    @foreach($marks as $mark)
                                                        <option
                                                            value='{{$mark->id}}'{{$mark->id==$product->marks_id?'selected':''}}>{{$mark->name}}</option>
                                                    @endforeach
                                                </select>
                                                @error('marks_id')
                                                <div style='color:red'>{{$message}}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{$product->county_id}}

                                <div class="col-sm-6">
                                    <div class="media-body">
                                        <div class="mb-3 row">
                                            <label class="col-sm-12 col-form-label"> بلد المنشأ <span
                                                    class=" text-danger">*</span></label>

                                            <div class="col-sm-9">

                                                <select name='country_id' class="form-select"
                                                        aria-label="Default select example">
                                                    <option value=''>اختر بلد المنشأ</option>

                                                    @foreach($countries as $country)

                                                        <option
                                                            value='{{$country->id}}'{{$country->id==$product->country_id ?'selected':''}}>{{$country->name}}</option>
                                                    @endforeach
                                                </select>
                                                @error('country_id')
                                                <div style='color:red'>{{$message}}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="media-body">
                                        <div class="mb-3 row">
                                            <label class="col-sm-12 col-form-label"> عدد القطع </label>
                                            <div class="col-sm-9">
                                                <input type="number" name='number'
                                                       value="{{old('number',$product->number)}}" class="form-control"
                                                       placeholder="">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="media-body">
                                        <div class="mb-3 row d-flex">
                                            <label class="col-sm-12 col-form-label">صورة المنتج</label>
                                            <div class="col-sm-6">
                                                <input type="file" name='img' class="form-control">
                                            </div>
                                            <div class="col-sm-3">
                                                @if(!is_null($product->img))
                                                    <img src="{{asset('storage/'.$product->img)}}"
                                                         style="width:80px;height:70px;">
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="media-body">
                                        <div class="mb-3 row">
                                            <label class="col-sm-12 col-form-label"> مده الكفاله </label>
                                            <div class="col-sm-9">
                                                <select name='guarantee_id' class="form-select"
                                                        aria-label="Default select example">
                                                    <option value=''>لا يوجد</option>
                                                    @foreach($guarantees as $guarantee)
                                                        <option
                                                            value='{{$guarantee->id}}' {{$guarantee->id==$product->guarantee_id?'selected':''}}>{{$guarantee->name}}</option>
                                                    @endforeach
                                                </select>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="media-body">
                                        <div class="mb-3 row">
                                            <label class="col-sm-12 col-form-label"> المواصفات</label>
                                            <div class="col-sm-9">
                                            <textarea class="form-control" name='specifications'
                                                      id="exampleFormControlTextarea4"
                                                      rows="3">{{old('specifications',$product->specifications)}}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="col-sm-6">
                                    <div class="media-body">
                                        <div class="mb-3 row">
                                            <label class="col-sm-12 col-form-label"> يوجد سيريل نمبر</label>
                                            <div class="col-sm-12">
                                                <input type="checkbox" name='serial_no' id="chk-ani"
                                                       class="checkbox_animated" {{$product->serial_no==1?'checked':''}}>
                                                @error('serial_no')
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
                            <a href="{{url('products')}}">
                                <button type="button" class="btn btn-light">إلغاء</button>
                            </a>

                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection
@section('scripts')
    <script>

        $('#class_id').on('change', function () {
            let id = $(this).val();
            var url = "{{ route('products.getclasstype', ":id") }}";
            url = url.replace(':id', id);
            $.ajax({
                type: "get",
                url: url,
                dataType: 'json',
                success: function (data) {
                    //remove disabled from province and change the options
                    $(".type_id").empty();

                    let array = $.map(data, function (value, index) {
                        return value;
                    });
                    if(array.length>0){
                        $.each(array, function (key, value) {

                            $(".type_id").append("<option value='" + value.id + "'>" + value.name + "</option>")


                        });
                    }else{
                        $(".type_id").empty();
                        $(".type_id").append("<option value=''>  لا يوجد انواع فى هذا الصنف   </option>");

                    }
                }
            });


        });


    </script>

@endsection

