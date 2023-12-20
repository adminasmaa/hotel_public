@extends('layouts.admin')
@section('title', ' اضافه شيك')

@section('content')
<div class="container-fluid" style="background: #f4f4f4;">
    <div class="row">
        <form class="mega-vertical" action="{{route('checks.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="col-sm-12 p-20">
                <div class="card height-equal">
                    <div class="card-header">
                        <h5> إضافة شيك </h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="media-body">
                                    <div class="mb-3 row">
                                        <label class="col-sm-12 col-form-label"> المبلغ <span
                                                class=" text-danger">*</span></label>
                                        <div class="col-sm-9">
                                            <input type="number" name='amount'  value="{{old('amount')}}" class="form-control" placeholder="">
                                            @error('amount')
                                            <div style='color:red'>{{$message}}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="media-body">
                                    <div class="mb-3 row">
                                        <label class="col-sm-12 col-form-label"> النوع <span
                                                class=" text-danger">*</span></label>
                                        <div class="col-sm-9">
                                            <input type="radio" name='type' value="1" class="" placeholder="">مستحق
                                            <br />
                                            <br />
                                            <input type="radio" name='type' value="0"    class="" placeholder="">مؤجله

                                            @error('type')
                                            <div style='color:red'>{{$message}}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="media-body">
                                    <div class="mb-3 row">
                                        <label class="col-sm-12 col-form-label"> الشيك باسم <span
                                                class=" text-danger">*</span></label>
                                        <div class="col-sm-9">
                                            <input type="text" name='with_name'   value="{{old('with_name')}}"  class="form-control" placeholder="">
                                            @error('with_name')
                                            <div style='color:red'>{{$message}}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="media-body">
                                    <div class="mb-3 row">
                                        <label class="col-sm-12 col-form-label"> رقم الشيك <span
                                                class=" text-danger">*</span></label>
                                        <div class="col-sm-9">
                                            <input type="number" name='check_no'  value="{{old('check_no')}}" class="form-control" placeholder="">
                                            @error('check_no')
                                            <div style='color:red'>{{$message}}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @if(!Session::has('branch'))
                            <div class="col-sm-6">
                                <div class="media-body">
                                    <div class="mb-3 row">
                                        <label class="col-sm-12 col-form-label">الفرع<span
                                                class=" text-danger">*</span></label>
                                        <div class="col-sm-9">
                                            <select class="form-select digits" id="exampleFormControlSelect9"
                                                name="branch_id">
                                                <option value=''>اختر الفرع</option>
                                                @foreach(App\Models\hr\Branch::all() as $branch)

                                                <option value='{{$branch->id}}'{{old('branch_id') == $branch->id ?'selected':''}}  >{{$branch->name}}</option>
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

                               <input class="form-control" name="branch_id" id="branch_id"
                                                value="{{Session::has('branch')?Session::get('branch'):'' }}"
                                                type="hidden" autocomplete="off">
                            @endif
                            <div class="col-sm-6">
                                <div class="media-body">
                                    <div class="mb-3 row">
                                        <label class="col-sm-12 col-form-label"> اسم مستلم الشيك <span
                                                class=" text-danger">*</span></label>
                                        <div class="col-sm-9">
                                            <input type="text" name='recip_name'    value="{{old('recip_name')}}" class="form-control"
                                                placeholder="المستلم">
                                            @error('recip_name')
                                            <div style='color:red'>{{$message}}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="media-body">
                                    <div class="mb-3 row">
                                        <label class="col-sm-12 col-form-label"> وذلك عن </label>
                                        <div class="col-sm-9">
                                            <input type="text" name='about_name'    value="{{old('about_name')}}" class="form-control" placeholder="">
                                            <!-- @error('about_name')
                                                <div style='color:red'>{{$message}}</div>
                                                @enderror -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="media-body">
                                    <div class="mb-3 row">
                                        <label class="col-sm-12 col-form-label">الهاتف </label>
                                        <div class="col-sm-9">
                                            <input type="number" name='phone'  value="{{old('phone')}}"  class="form-control" placeholder="">
                                            <!-- @error('phone')
                                                <div style='color:red'>{{$message}}</div>
                                                @enderror -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="media-body">
                                    <div class="mb-3 row">
                                        <label class="col-sm-12 col-form-label">تاريخ الاستحقاق <span
                                                class=" text-danger">*</span></label>
                                        <div class="col-sm-9">
                                            <input type="date" name="due_date"    value="{{old('due_date')}}"  min="{{date('Y-m-d')}}"
                                                class="form-control" maxlength="20" placeholder="">
                                            @error('due_date')
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
                        <button class="btn btn-primary m-r-15" type="submit">حفظ</button>
                        <a href="{{route('checks.index')}}"> <button type="button"
                                class="btn btn-light">إلغاء</button></a>

                    </div>
                </div>
            </div>
        </form>
    </div>
</div>


@endsection
@section('scripts')
@endsection
