@extends('layouts.admin')
@section('title', 'الاقسام')
@section('scripts')

    <link rel="stylesheet" href="{{asset('assets/b/dist/css/bootstrap-iconpicker.css')}}"/>
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css"/>
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/octicons/4.4.0/font/octicons.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/typicons/2.0.9/typicons.min.css"/>
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/weather-icons/2.0.10/css/weather-icons.min.css"/>

    <style>
        .page-wrapper .page-body-wrapper .page-title {
            padding: 30px 30px 20px;
        }
    </style>

@endsection
@section('content')

    <div class="row">

        <div class=" col-md-12 box-col-12" id="class-content">
            <div class="email-right-aside bookmark-tabcontent">
                <div class="card email-body radius-left">
                    <div class="ps-0">
                        <div class="tab-content">
                            <div class="tab-pane fade active show" id="roles" role="tabpanel"
                                 aria-labelledby="roles-tab">
                                <div class="card mb-0">

                                    <div class="card-body">

                                        <div class="dt-ext table-responsive">
                                            <table class=" table display data-table-responsive " id="">
                                                <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th> اسم القسم</th>
                                                    <th> ايقونه القسم</th>
                                                    <th class="not-export-col">الاعدادت</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @php
                                                    $count=0;
                                                @endphp
                                                @foreach($roles as $role)
                                                    @php $count=$count+1;

                                                    @endphp
                                                    <input name="id_var" id="id_var"
                                                           type="hidden"
                                                           value="{{$role->id}}">
                                                    <tr>

                                                        <td>{{$count}}</td>
                                                        <td>{{$role->name}}</td>
                                                        <td><i class="{{$role->icon_type}}"></i></td>
                                                        <td>
                                                            @role('roles.update')
                                                            <a class="me-2" data-bs-toggle="modal"
                                                               href="{{('/#editModal'.$role->id)}}"><i
                                                                    data-toggle="modal"
                                                                    data-target="#editModal{{$role->id}}"
                                                                    data-feather="edit" width="15" height='15'></i></a>
                                                            @endrole
                                                        </td>

                                                        <div class="modal fade modal-bookmark"
                                                             id="editModal{{$role->id}}"
                                                             tabindex="-1"
                                                             role="dialog"
                                                             aria-labelledby="editModalLabel"
                                                             aria-hidden="true">
                                                            <div class="modal-dialog modal-lg"
                                                                 role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title"
                                                                            id="editModalLabel">


                                                                            تعديل القسم</h5>
                                                                        <button class="btn-close"
                                                                                type="button"
                                                                                data-bs-dismiss="modal"
                                                                                aria-label="Close"></button>
                                                                    </div>
                                                                    <div class="modal-body">

                                                                        <form
                                                                            class="form-bookmark needs-validation"

                                                                            id="bookmark-form"
                                                                            action="{{route('roles.update',$role->id)}}"
                                                                            method="post"

                                                                            novalidate="">
                                                                            @csrf
                                                                            @method('PUT')

                                                                            <div class="row">
                                                                                <input name="link_route"
                                                                                       type="hidden"
                                                                                       value="{{$role->link_route}}">
                                                                                <div
                                                                                    class="mb-3 mt-0 col-md-4">
                                                                                    <label
                                                                                        for="task-title">
                                                                                        تعديل القسم
                                                                                        <span  class="txt-danger">*</span>

                                                                                    </label>
                                                                                    <input

                                                                                        class="form-control"
                                                                                        name="name"
                                                                                        id="name"
                                                                                        type="text"
                                                                                        value="{{$role->name}}"
                                                                                        required=""
                                                                                        autocomplete="off">
                                                                                    @error('name')
                                                                                    <div
                                                                                        style='color:red'>{{$message}}</div>
                                                                                    @enderror

                                                                                </div>
                                                                               {{-- <div class="mb-3 mt-0 col-md-4">
                                                                                    <label for="task-title"> ترتيب
                                                                                        عرض القسم</label>
                                                                                    <input
                                                                                        class="form-control"
                                                                                        name="order"
                                                                                        id="order"
                                                                                        type="number"
                                                                                        value="{{$role->order}}"
                                                                                    >

                                                                                    @error('order')
                                                                                    <div
                                                                                        style='color:red'>{{$message}}</div>
                                                                                    @enderror


                                                                                </div>--}}

                                                                                <div class="mb-3 mt-0 col-md-4">
                                                                                    <label for="task-title">ايقونه
                                                                                        عرض القسم</label>


                                                                                    <div class="input-group">
    <span class="input-group-prepend">
        <button class="btn btn-secondary convert_example_2" data-selected-Class='btn-success'
               data-unselected-Class=" " data-icon="ion-ionic"   data-search="false" role="iconpicker"></button>
    </span>
                                                                                        <input type="hidden"
                                                                                               name="icon_type"
                                                                                               class="form-control"/>
                                                                                    </div>


                                                                                </div>

                                                                            </div>
                                                                            <input id="index_var"
                                                                                   type="hidden"
                                                                                   value="6">
                                                                            <div class="row text-center">
                                                                                <div class="col-md-12">
                                                                                    <button
                                                                                        style="margin-top: 20px;"
                                                                                        class="btn btn-secondary"
                                                                                        id="Bookmark_submit"
                                                                                        data-id="{{$role->id}}"
                                                                                        type="submit">تعديل
                                                                                    </button>
                                                                                    <button
                                                                                        style="margin-top: 20px;"
                                                                                        class="btn btn-primary"
                                                                                        type="button"
                                                                                        data-bs-dismiss="modal">
                                                                                        إلغاء
                                                                                    </button>
                                                                                </div>
                                                                            </div>
                                                                        </form>
                                                                    </div>


                                                                </div>
                                                            </div>
                                                        </div>

                                                    </tr>
                                                @endforeach
                                                </tbody>
                                                <tfoot>

                                                </tfoot>
                                            </table>
                                        </div>

                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script type="text/javascript"
            src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="{{asset('assets/b/dist/js/bootstrap-iconpicker.bundle.min.js')}}"></script>

    <script type="text/javascript">


        $('.convert_example_2').iconpicker().on('change', function (e) {

            $('input[name="icon_type"]').val(e.icon);
        });


        $(window).on('load', function () {
            let var_id = '{{$errors->first('id')}}';

            @if ($errors->has('method') && $errors->first('method')=='PUT' && $errors->has('id'))
            $('#editModal' + var_id).modal('show');
            @endif
        });


    </script>

    <!-- Button Builder Example -->

@endsection
