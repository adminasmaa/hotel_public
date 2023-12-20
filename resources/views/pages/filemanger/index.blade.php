@extends('layouts.admin')
@section('title', 'مدير الملفات ')
@section('content')

    <div class="row">
        <div class="col-6">
            <h3>
                اقسام ملفات النظام</h3>
        </div>

    </div>
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-3 box-col-6 pe-0">
                <div class="file-sidebar">
                    <div class="card">
                        <div class="modal fade modal-bookmark" id="fileTypeModal" tabindex="-1"
                             role="dialog" aria-labelledby="fileTypeModalLabel" aria-hidden="true">

                        </div>
                        <div class="card-body">
                            <ul>

                                <li>
                                    <a class="btn btn-light" href="{{route('filesmanger.index')}}"><i
                                            data-feather="folder"></i>الكل</a>
                                </li>
                                @foreach($files_depts as $files_dept)
                                    <li>
                                        <a class="btn btn-light"
                                           href="{{route('filesmanger.index',array('file_dept_id' => $files_dept->id))}}"><i
                                                data-feather="folder"></i>{{$files_dept->name}}</a>

                                    </li>
                                @endforeach
                                <li>
                                    <a class="btn btn-light" href="?onlytrash"><i data-feather="trash-2"
                                                                                  title="حذف"></i>المحذوفات </a>
                                </li>


                            </ul>
                        </div>


                    </div>
                </div>
            </div>
            <div class="col-xl-9 col-md-12 box-col-12">
                <div class="file-content">
                    <div class="card">

                        <div class="card-header">
                            <div class="media">

                                <div class="media-body text-end">
                                    <div style="height: 0px;width: 0px; overflow:hidden;">
                                        <input id="upfile" type="file" onchange="sub(this)">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-header">
                            @role('filesmanger.store')
                            <a href="{{route('filesmanger.create')}}" class="btn btn-square btn-primary"
                               style="align:left;">
                                إضافة ملف</a>
                            @endrole
                            @if(!Session::get('branch'))
                                @role('filesmanger.setting')
                                <a href="{{route('filesmanger.setting')}}" class="btn btn-square btn-primary">
                                    الاعدادات</a>
                                @endrole
                                <div class="card-header">
                                    <div class="col-sm-12">
                                        @role('filesTypes.index')
                                        <a href="{{route('filesTypes.index')}}"
                                           class="btn btn-square btn-outline-light btn-sm txt-dark">انواع الملفات
                                            ( {{$files_types->count()}})</a>
                                        @endrole
                                        @role('filesDepts.index')
                                        <a href="{{route('filesDepts.index')}}"
                                           class="btn btn-square btn-outline-light btn-sm txt-dark">انواع الاقسام
                                            ( {{$files_depts->count()}})</a>

                                        @endrole
                                    </div>
                                </div>
                            @endif
                        </div>


                        <div class="card-body">
                            <div class="dt-ext table-responsive">
                                <table class="table display data-table-responsive" id="export-button ">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>الاسم</th>
                                        @if(!request()->has('onlytrash'))
                                            <th> اسم قسم الملف</th>
                                            <th> اسم نوع الملف</th>
                                            <th>التاريخ</th>
                                            <th>الملف</th>
                                            <th class="not-export-col">اعدادات</th>
                                        @else
                                            <th>الملف</th>
                                            <th class="not-export-col">اعدادات</th>
                                        @endif
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @foreach($filesmangers as $filesmanger)
                                        <tr>
                                            <td>{{$loop->index + 1}}</td>
                                            <td>{{$filesmanger->name}}</td>
                                            @if(!request()->has('onlytrash'))
                                                <td>
                                                {{optional($filesmanger->files_dept)->name}}
                                                <td>
                                                    {{optional($filesmanger->files_type)->name}}
                                                </td>
                                                <td>{{$filesmanger->expired_date}}</td>
                                                <td>
                                                    <a target="_blank"
                                                       href="{{asset('storage/'.$filesmanger->path)}}"><img
                                                            class="b-r-10" width="50px" height="50px"
                                                            src="{{asset('storage/'.$filesmanger->path)}}" alt=""></a>
                                                </td>
                                                <td>
                                                    @role('filesmanger.update')
                                                    <a href="{{route('filesmanger.edit',$filesmanger->id)}}"
                                                       data-id="{{$filesmanger->id}}"
                                                       id="edit_id" class="me-2">
                                                        <i data-feather="edit" width="15" height='15'> تعديل</i>
                                                    </a>

                                                    @endrole
                                                    @role('filesmanger.destroy')
                                                    <form action="{{ route('filesmanger.destroy', $filesmanger->id) }}"
                                                          method="POST" class="d-inline">
                                                        @method('DELETE')
                                                        @csrf
                                                        <button
                                                            style="display: inline-block;border: none;background: none;color: #e90f0f;"
                                                            type="submit" data-toggle="tooltip" data-placement="top"
                                                            title="{{ __('حذف') }}"
                                                            onclick="return confirm('هل انت متاكد من الحذف');"
                                                            class="me-2"><i data-feather="trash-2" width="15"
                                                                            height='15'></i>
                                                        </button>
                                                    </form>
                                                    @endrole
                                                </td>
                                            @else
                                                <td>
                                                    <a target="_blank"
                                                       href="{{asset('storage/'.$filesmanger->path)}}"><img
                                                            class="b-r-10" width="50px" height="50px"
                                                            src="{{asset('storage/'.$filesmanger->path)}}" alt=""></a>
                                                </td>
                                                <td>
                                                    @role('filesmanger.update')
                                                    <a href="{{route('filesmanger.restore',$filesmanger->id)}}"
                                                       data-id="{{$filesmanger->id}}"
                                                       id="edit_id" class="me-2">
                                                        <i data-feather="trash" width="15" height='15'> استرجاع</i>

                                                    </a>

                                                    @endrole
                                                    @role('filesmanger.destroy')
                                                    <a href="{{route('filesmanger.delete',$filesmanger->id)}}"
                                                       data-id="{{$filesmanger->id}}"
                                                       style="display: inline-block;border: none;background: none;color: #e90f0f;"
                                                       onclick="return confirm('هل انت متاكد من الحذف');"
                                                       id="edit_id" class="me-2">
                                                        <i data-feather="trash-2" width="15" height='15'> استرجاع</i>
                                                    </a>
                                                    {{-- <form action="{{ route('filesmanger.delete', $filesmanger->id) }}"
                                                           method="POST" class="d-inline">
                                                         @method('DELETE')
                                                         @csrf
                                                         <button
                                                             style="display: inline-block;border: none;background: none;color: #e90f0f;"
                                                             type="submit" data-toggle="tooltip" data-placement="top"
                                                             title="{{ __('حذف') }}"
                                                             onclick="return confirm('هل انت متاكد من الحذف');"
                                                             class="me-2"><i data-feather="trash-2" width="15"
                                                                             height='15'></i>
                                                         </button>
                                                     </form>--}}
                                                    @endrole
                                                </td>
                                            @endif
                                        </tr>
                                    @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>


                    </div>
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

        $(window).on('load', function () {
            @if($errors -> has('method') && $errors -> first('method') == 'POST')
            $('#fileTypeModal').modal('show');
            @endif
        });


    </script>

@endsection
