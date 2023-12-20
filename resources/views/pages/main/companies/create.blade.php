@extends('layouts.admin')
@section('title', 'الشركات')
@section('content')
    <div class="container-fluid" style="background: #f4f4f4;">
        <div class="row">
            <form class="mega-vertical" action="{{route('companies.store')}}" method="post"
                  enctype="multipart/form-data">
                @csrf
                <div class="col-sm-12 col-xxl-6 box-col-12 p-20">
                    <div class="card height-equal">
                        <div class="card-header">
                            <h5>معلومات الشركه</h5>
                        </div>
                        <div class="card-body">

                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="media-body">
                                        <div class="mb-3 row">
                                            <label class="col-sm-12 col-form-label"> الأسم  <span  class=" text-danger">*</span></label>
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
                                            <label class="col-sm-12 col-form-label"> رقم الهاتف  <span  class=" text-danger">*</span></label>
                                            <div class="col-sm-9">
                                                <input type="text" name='phone'
                                                       value="{{old('phone')}}" class="form-control"
                                                       placeholder="">
                                                @error('phone')
                                                <div style='color:red'>{{$message}}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <div class="media-body">
                                        <div class="mb-3 row">
                                            <label class="col-sm-12 col-form-label"> الفاكس  <span  class=" text-danger">*</span></label>
                                            <div class="col-sm-9">
                                                <input type="text" name='fax'
                                                       value="{{old('fax')}}" class="form-control"
                                                       placeholder="">
                                                @error('fax')
                                                <div style='color:red'>{{$message}}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <div class="media-body">
                                        <div class="mb-3 row">
                                            <label class="col-sm-12 col-form-label"> البريد الاكترونى  </label>
                                            <div class="col-sm-9">
                                                <input type="email" name='email'
                                                       value="{{old('email')}}" class="form-control"
                                                       placeholder="">
                                                @error('email')
                                                <div style='color:red'>{{$message}}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <div class="media-body">
                                        <div class="mb-3 row">
                                            <label class="col-sm-12 col-form-label"> العنوان  <span  class=" text-danger">*</span></label>
                                            <div class="col-sm-9">
                                                <input type="text" name='address'
                                                       value="{{old('address')}}" class="form-control"
                                                       placeholder="">
                                                @error('address')
                                                <div style='color:red'>{{$message}}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="col-sm-12">
                                    <div class="media-body">
                                        <div class="mb-3 row">
                                            <label class="col-sm-12 col-form-label">  هاتف المخزن  <span  class=" text-danger">*</span></label>
                                            <div class="col-sm-9">
                                                <input type="text" name='store_phone'
                                                       value="{{old('store_phone')}}" class="form-control"
                                                       placeholder="">
                                                @error('store_phone')
                                                <div style='color:red'>{{$message}}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <div class="media-body">
                                        <div class="mb-3 row">
                                            <label class="col-sm-12 col-form-label"> اسم المندوب  <span  class=" text-danger">*</span></label>
                                            <div class="col-sm-9">
                                                <input type="text" name='delegeate_name'
                                                       value="{{old('delegeate_name')}}" class="form-control"
                                                       placeholder="">
                                                @error('delegeate_name')
                                                <div style='color:red'>{{$message}}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="col-sm-12">
                                    <div class="media-body">
                                        <div class="mb-3 row">
                                            <label class="col-sm-12 col-form-label">  هاتف المندوب  <span  class=" text-danger">*</span></label>
                                            <div class="col-sm-9">
                                                <input type="text" name='delegeate_phone'
                                                       value="{{old('delegeate_phone')}}" class="form-control"
                                                       placeholder="">
                                                @error('delegeate_phone')
                                                <div style='color:red'>{{$message}}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <div class="media-body">
                                        <div class="mb-3 row">
                                            <label class="col-sm-12 col-form-label">  بريد المندوب  </label>
                                            <div class="col-sm-9">
                                                <input type="email" name='delegeate_email'
                                                       value="{{old('delegeate_email')}}" class="form-control"
                                                       placeholder="">
                                                @error('delegeate_email')
                                                <div style='color:red'>{{$message}}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <div class="media-body">
                                        <div class="mb-3 row">
                                            <label class="col-sm-12 col-form-label"> مفعل</label>
                                            <div class="col-sm-12">
                                                <input type="checkbox" name='is_active' checked="checked" id="chk-ani"
                                                       class="checkbox_animated" >
                                                @error('is_active')
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
                <div class="col-sm-12 col-xxl-6 box-col-12 p-20">
                    <div class="card height-equal">
                        <div class="card-header">
                            <h5> التركيب والتوصيل</h5>
                        </div>
                        <div class="card-body">



                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="media-body">
                                        <div class="mb-3 row">
                                            <label class="col-sm-12 col-form-label">  اسم الموظف 1 </label>
                                            <div class="col-sm-9">
                                                <input type="text" name='transfer[employeeName_one]'
                                                       value="{{old('transfer[employeeName_one]')}}" class="form-control"
                                                       placeholder="">

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="media-body">
                                        <div class="mb-3 row">
                                            <label class="col-sm-12 col-form-label"> هاتف الموظف 1</label>
                                            <div class="col-sm-9">
                                                <input type="text" name='transfer[employeePhone_one]' value="{{old('transfer[employeePhone_one]')}}"
                                                       class="form-control" placeholder="">

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="media-body">
                                        <div class="mb-3 row">
                                            <label class="col-sm-12 col-form-label">  بريد الموظف 1 </label>
                                            <div class="col-sm-9">
                                                <input type="text" name='transfer[employeeAddress_one]' value="{{old('transfer[employeeAddress_one]')}}"
                                                       class="form-control" placeholder="">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="media-body">
                                        <div class="mb-3 row">
                                            <label class="col-sm-12 col-form-label">  اسم الموظف 2 </label>
                                            <div class="col-sm-9">
                                                <input type="text" name='transfer[employeeName_two]'
                                                       value="{{old('transfer[employeeName_two]')}}" class="form-control"
                                                       placeholder="">

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="media-body">
                                        <div class="mb-3 row">
                                            <label class="col-sm-12 col-form-label"> هاتف الموظف 2</label>
                                            <div class="col-sm-9">
                                                <input type="text" name='transfer[employeePhone_two]' value="{{old('transfer[employeePhone_two]')}}"
                                                       class="form-control" placeholder="">

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="media-body">
                                        <div class="mb-3 row">
                                            <label class="col-sm-12 col-form-label">  بريد الموظف 2 </label>
                                            <div class="col-sm-9">
                                                <input type="text" name='transfer[employeeAddress_two]' value="{{old('transfer[employeeAddress_two]')}}"
                                                       class="form-control" placeholder="">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>



                        </div>

                    </div>

                    <div class="card height-equal">
                        <div class="card-header">
                            <h5>الصيانه</h5>
                        </div>
                        <div class="card-body">



                        <div class="row">
                                <div class="col-sm-4">
                                    <div class="media-body">
                                        <div class="mb-3 row">
                                            <label class="col-sm-12 col-form-label">  اسم الموظف 1 </label>
                                            <div class="col-sm-9">
                                                <input type="text" name='maintenance[employeeName_one]'
                                                       value="{{old('maintenance[employeeName_one]')}}" class="form-control"
                                                       placeholder="">

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="media-body">
                                        <div class="mb-3 row">
                                            <label class="col-sm-12 col-form-label"> هاتف الموظف 1</label>
                                            <div class="col-sm-9">
                                                <input type="text" name='maintenance[employeePhone_one]' value="{{old('maintenance[employeePhone_one]')}}"
                                                       class="form-control" placeholder="">

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="media-body">
                                        <div class="mb-3 row">
                                            <label class="col-sm-12 col-form-label">  بريد الموظف 1 </label>
                                            <div class="col-sm-9">
                                                <input type="text" name='maintenance[employeeAddress_one]' value="{{old('maintenance[employeeAddress_one]')}}"
                                                       class="form-control" placeholder="">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="media-body">
                                        <div class="mb-3 row">
                                            <label class="col-sm-12 col-form-label">  اسم الموظف 2 </label>
                                            <div class="col-sm-9">
                                                <input type="text" name='maintenance[employeeName_two]'
                                                       value="{{old('maintenance[employeeName_two]')}}" class="form-control"
                                                       placeholder="">

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="media-body">
                                        <div class="mb-3 row">
                                            <label class="col-sm-12 col-form-label"> هاتف الموظف 2</label>
                                            <div class="col-sm-9">
                                                <input type="text" name='maintenance[employeePhone_two]' value="{{old('maintenance[employeePhone_two]')}}"
                                                       class="form-control" placeholder="">

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="media-body">
                                        <div class="mb-3 row">
                                            <label class="col-sm-12 col-form-label">  بريد الموظف 2 </label>
                                            <div class="col-sm-9">
                                                <input type="text" name='maintenance[employeeAddress_two]' value="{{old('maintenance[employeeAddress_two]')}}"
                                                       class="form-control" placeholder="">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>



                        </div>

                    </div>


                    <div class="card height-equal">
                        <div class="card-header">
                            <h5>المبيعات</h5>
                        </div>
                        <div class="card-body">



                         <div class="row">
                                <div class="col-sm-4">
                                    <div class="media-body">
                                        <div class="mb-3 row">
                                            <label class="col-sm-12 col-form-label">  اسم الموظف 1 </label>
                                            <div class="col-sm-9">
                                                <input type="text" name='sales[employeeName_one]'
                                                       value="{{old('sales[employeeName_one]')}}" class="form-control"
                                                       placeholder="">

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="media-body">
                                        <div class="mb-3 row">
                                            <label class="col-sm-12 col-form-label"> هاتف الموظف 1</label>
                                            <div class="col-sm-9">
                                                <input type="text" name='sales[employeePhone_one]' value="{{old('sales[employeePhone_one]')}}"
                                                       class="form-control" placeholder="">

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="media-body">
                                        <div class="mb-3 row">
                                            <label class="col-sm-12 col-form-label">  بريد الموظف 1 </label>
                                            <div class="col-sm-9">
                                                <input type="text" name='sales[employeeAddress_one]' value="{{old('sales[employeeAddress_one]')}}"
                                                       class="form-control" placeholder="">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="media-body">
                                        <div class="mb-3 row">
                                            <label class="col-sm-12 col-form-label">  اسم الموظف 2 </label>
                                            <div class="col-sm-9">
                                                <input type="text" name='sales[employeeName_two]'
                                                       value="{{old('sales[employeeName_two]')}}" class="form-control"
                                                       placeholder="">

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="media-body">
                                        <div class="mb-3 row">
                                            <label class="col-sm-12 col-form-label"> هاتف الموظف 2</label>
                                            <div class="col-sm-9">
                                                <input type="text" name='sales[employeePhone_two]' value="{{old('sales[employeePhone_two]')}}"
                                                       class="form-control" placeholder="">

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="media-body">
                                        <div class="mb-3 row">
                                            <label class="col-sm-12 col-form-label">  بريد الموظف 2 </label>
                                            <div class="col-sm-9">
                                                <input type="text" name='sales[employeeAddress_two]' value="{{old('sales[employeeAddress_two]')}}"
                                                       class="form-control" placeholder="">

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
                            <button class="btn btn-primary m-r-15" type="submit">حفظ</button>
                            <a href="{{url('companies')}}"> <button type="button" class="btn btn-light">إلغاء</button></a>

                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>


@endsection
@section('scripts')
@endsection

