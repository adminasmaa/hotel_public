@extends('layouts.admin')
@section('title', 'تعديل  ملف')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="card">
                <div class="modal fade modal-bookmark" id="fileSDeptModal" tabindex="-1"
                     role="dialog" aria-labelledby="fileSDeptModallLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="fileSDeptModalLabel">قسم الملف
                                    جديدة </h5>
                                <button class="btn-close" type="button" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form class="form-bookmark needs-validation"
                                      action="{{route('filesDepts.store')}}" method="post"
                                      id="bookmark-form" novalidate="">
                                    @csrf
                                    <div class="row">
                                        <div class="mb-3 mt-0 col-md-12">
                                            <label for="task-title">

                                                اسم قسم الملف<span
                                                    class=" text-danger">*</span></label>
                                            <input class="form-control" name="name" id="name"
                                                   type="text" required="" autocomplete="off">
                                            @error('name')
                                            <div style='color:red'>{{$message}}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <input id="index_var" type="hidden" value="6">
                                    <button class="btn btn-secondary" id="Bookmark"
                                            type="submit">حفظ
                                    </button>
                                    <button class="btn btn-primary" type="button"
                                            data-bs-dismiss="modal">إلغاء
                                    </button>

                                </form>
                            </div>


                        </div>
                    </div>
                </div>

                <div class="modal fade modal-bookmark" id="fileTypeModal" tabindex="-1"
                     role="dialog" aria-labelledby="fileTypeModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="fileTypeModalLabel">نوع ملف
                                    جديد </h5>
                                <button class="btn-close" type="button" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form class="form-bookmark needs-validation"
                                      action="{{route('filesTypes.store')}}" method="post"
                                      id="bookmark-form" novalidate="">
                                    @csrf
                                    <div class="row">
                                        <div class="mb-3 mt-0 col-md-12">
                                            <label for="task-title">
                                                اسم نوع الملف<span class=" text-danger">*</span></label>
                                            <input class="form-control" name="name" id="name"
                                                   type="text" required="" autocomplete="off">
                                            @error('name')
                                            <div style='color:red'>{{$message}}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <input id="index_var" type="hidden" value="6">
                                    <button class="btn btn-secondary" id="Bookmark"
                                            type="submit">حفظ
                                    </button>
                                    <button class="btn btn-primary" type="button"
                                            data-bs-dismiss="modal">إلغاء
                                    </button>

                                </form>
                            </div>


                        </div>
                    </div>
                </div>

                <form class="mega-vertical" action="{{route('filesmanger.update',$filesmanger->id)}}" method="POST"
                      enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="col-sm-12 box-col-12 p-20">
                        <div class="card height-equal">
                            <div class="card-header">
                                <h5>إضافة صنف جديد </h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="mb-3 mt-0 col-md-4">
                                        <label for="task-title">الاسم
                                            <span
                                                class=" text-danger">*</span>
                                        </label>
                                        <input class="form-control" name="name" value="{{$filesmanger->name}}" id="name"
                                               type="text"
                                               autocomplete="off">
                                        @error('name')
                                        <div style='color:red'>{{$message}}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3 mt-0 col-md-4">
                                        <input type="hidden" name="branch_id" value="{{Session::get('branch')}}">
                                        <label class="col-sm-12 col-form-label">
                                            الفرع
                                            <span
                                                class=" text-danger">*</span></label>
                                        <div class="col-sm-9">
                                            <label
                                                class="form-label">{{App\Models\hr\branch::where('id',Session::get('branch'))->first()->name}}  </label>

                                            @error('branch_id')
                                            <div style='color:red'>{{$message}}</div>
                                            @enderror
                                        </div>

                                        @if(!Session::has('branch'))
                                            <div class="row">
                                                <div class="col-sm-11">

                                                    <select name='branch_id' class="form-select"
                                                            id="branch_id"
                                                            aria-label="Default select example">
                                                        <option value=''>اختر الفرع</option>
                                                        @foreach($branches as $branche)
                                                            <option
                                                                value='{{$branche->id}}'{{$filesmanger->branch_id == $branche->id ?'selected':''}}>{{$branche->name}}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('branch_id')
                                                    <div style='color:red'>{{$message}}</div>
                                                    @enderror
                                                </div>
                                                @role('branches.create')

                                                <div style="padding-right:0px" class="col-sm-1"><a
                                                        id="add_new_branch"
                                                        data-dismiss="modal"
                                                        title="{{ __(' اضافة جديد') }}"
                                                        href="{{route('branches.create')}}"><i
                                                            class="fa fa-plus-square"></i></a></div>


                                            </div>
                                        @endif
                                        @endif
                                    </div>
                                    <div class="mb-3 mt-0 col-md-4">
                                        <label for="task-title">تاريج الانتهاء
                                        </label>
                                        <input class="form-control" name="expired_date"
                                               value="{{$filesmanger->expired_date}}" id="expired_date"
                                               type="date"
                                               autocomplete="off">
                                        @error('expired_date')
                                        <div style='color:red'>{{$message}}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3 mt-0 col-md-6">
                                        <label class="col-sm-12 col-form-label">
                                            نوع قسم الملف
                                            <span
                                                class=" text-danger">*</span></label>
                                        <div class="row">
                                            <div class="col-sm-11">
                                                <select name='file_dept_id' class="form-select"
                                                        id="file_dept_id"
                                                        aria-label="Default select example">
                                                    <option value=''>اختر نوع قسم الملف</option>
                                                    @foreach($files_depts as $files_dept)
                                                        <option
                                                            value='{{$files_dept->id}}'{{$filesmanger->file_dept_id == $files_dept->id ?'selected':''}}>{{$files_dept->name}}</option>
                                                    @endforeach
                                                </select>
                                                @error('file_dept_id')
                                                <div style='color:red'>{{$message}}</div>
                                                @enderror
                                            </div>
                                            @if(!Session::has('branch'))
                                                @role('filesDepts.store')
                                                <div style="padding-right:0px" class="col-sm-1"><a
                                                        data-bs-target="#fileSDeptModal"
                                                        data-bs-toggle="modal"
                                                        id="add_new_dept"
                                                        data-dismiss="modal"
                                                        title="{{ __(' اضافة جديد') }}"
                                                        href="#"><i
                                                            class="fa fa-plus-square"></i></a></div>
                                                @endrole
                                            @endif

                                        </div>
                                    </div>
                                    <div class="mb-3 mt-0 col-md-6">
                                        <label class="col-sm-12 col-form-label"> نوع الملف <span
                                                class=" text-danger">*</span></label>
                                        <div class="row">
                                            <div class="col-sm-11">
                                                <select name='file_type_id' class="form-select"
                                                        aria-label="Default select example">
                                                    <option value=''> اخنر نوع الملف</option>
                                                    @foreach($files_types as $files_type)
                                                        <option
                                                            value='{{ $files_type->id }}' {{ $filesmanger->file_type_id == $files_type->id ? "selected" : "" }}>{{$files_type->name}}</option>
                                                    @endforeach
                                                </select>
                                                @error('file_type_id')
                                                <div style='color:red'>{{$message}}</div>
                                                @enderror
                                            </div>
                                            @if(!Session::has('branch'))
                                                @role('filesTypes.store')
                                                <div style="padding-right:0px" class="col-sm-1"><a
                                                        data-bs-target="#fileTypeModal"
                                                        data-bs-toggle="modal"
                                                        id="add_new_type"
                                                        data-dismiss="modal"
                                                        title="{{ __(' اضافة جديد') }}"
                                                        href="#"><i
                                                            class="fa fa-plus-square"></i></a></div>

                                        </div>
                                        @endrole
                                        @endif


                                    </div>
                                    <div class="mb-3 mt-0 col-md-6">
                                        <label for="task-title">الصورة
                                            <span
                                                class=" text-danger">*</span>
                                        </label>
                                        <input class="form-control" name="path" accept="image/*" id="path" type="file"
                                               autocomplete="off">
                                        @if(!is_null($filesmanger->path))
                                            <img src="{{asset('storage/'.$filesmanger->path)}}"
                                                 style="width:80px;height:70px;">
                                        @endif
                                        @error('path')
                                        <div style='color:red'>{{$message}}</div>
                                        @enderror
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="media-body">
                                            <div class="mb-3 row">
                                                <label class="col-sm-12 col-form-label"> الملاجظات</label>
                                                <div class="col-sm-12">
                                                                <textarea class="form-control" name='notes'
                                                                          id="exampleFormControlTextarea4"
                                                                          rows="5">{{$filesmanger->notes}}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="card-footer text-center">
                                        <button class="btn btn-primary m-r-15" type="submit">تعديل</button>
                                        <a href="{{url('filesmanger')}}">
                                            <button type="button" class="btn btn-light">إلغاء</button>
                                        </a>

                                    </div>


                                </div>
                            </div>
                        </div>
                </form>


            </div>
        </div>
    </div>
    </div>

@endsection
@section('scripts')
    <script type="text/javascript">
        $("#add_new_type").on("click", function () {
            $("#fileTypeModal").modal("show");
        });
        $("#add_new_dept").on("click", function () {
            $("#fileSDeptModal").modal("show");
        });
        $(window).on('load', function () {
            @if($errors -> has('method') && $errors -> first('method') == 'POST')
            $('#fileTypeModal').modal('show');
            @endif
        });


    </script>

@endsection
