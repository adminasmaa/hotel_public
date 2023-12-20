@extends('layouts.admin')
@section('title', 'المؤهلات')
@section('content')

    <div class="row">

        <div class="col-xl-12 col-md-12 box-col-12" id="class-content">
            <div class="email-right-aside bookmark-tabcontent">
                <div class="card email-body radius-left">
                    <div class="ps-0">
                        <div class="tab-content">
                            <div class="tab-pane fade active show" id="qualifications" role="tabpanel"
                                 aria-labelledby="qualifications-tab">
                                <div class="card mb-0">
                                    <div class="card-header d-flex">
                                        <h5 class="mb-0">
                                            @role('types.store')

                                            <button class="me-2 btn-block btn-mail w-100" data-bs-toggle="modal"
                                                    data-bs-target="#typesModal" type="button"
                                                    style="border: none;">إضافة
                                                جديد
                                            </button>
                                            @endrole


                                        </h5>
                                        <div class="modal fade modal-bookmark" id="typesModal" tabindex="-1"
                                             role="dialog" aria-labelledby="typesModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="typesModalLabel">نوع
                                                            جديد </h5>
                                                        <button class="btn-close" type="button" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form class="form-bookmark needs-validation"
                                                              action="{{route('types.store')}}" method="post"
                                                              id="bookmark-form" novalidate="">
                                                            @csrf
                                                            <div class="row">
                                                                <div class="mb-3 mt-0 col-md-6">
                                                                    <label for="task-title">اسم
                                                                           النوع باللغة العربية </label>
                                                                    <input class="form-control" name="name" id="name"
                                                                           type="text" required="" value="{{old('name')}}" autocomplete="off">
                                                                    @error('name')
                                                                    <div style='color:red'>{{$message}}</div>
                                                                    @enderror
                                                                </div>
                                                                <div class="mb-3 mt-0 col-md-6">
                                                                    <label for="task-title">اسم
                                                                        النوع باللغة الانجليزية </label>
                                                                    <input class="form-control" name="name_en" id="name"
                                                                           type="text" required=""  value="{{old('name_en')}}" autocomplete="off">
                                                                    @error('name_en')
                                                                    <div style='color:red'>{{$message}}</div>
                                                                    @enderror
                                                                </div>
                                                                <input type="hidden" name="class_id" value="{{request()->get('class')}}">

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

                                    </div>
                                    <div class="card-body">

                                        <div class="dt-ext table-responsive">
                                            <table class=" table display  data-table-responsive " id="">
                                                <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th> اسم النوع العربى</th>
                                                    <th> اسم النوع الانجليزى</th>
                                                    <th>الصنف</th>
                                                    <th class="not-export-col">الاعدادت</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @php
                                                    $count=0;
                                                @endphp
                                                @foreach($types as $type)
                                                    @php $count=$count+1 @endphp
                                                    <tr>
                                                        <td>{{$count}}</td>
                                                        <td>{{$type->name}}</td>
                                                        <td>{{$type->name_en}}</td>
                                                        <td>{{App\Models\main\Classes::find($type->class_id)->name}}
                                                        </td>
                                                        <td>
                                                            @role('types.update')
                                                            <a class="me-2" data-bs-toggle="modal"
                                                               href="{{('/#editModal'.$type->id)}}"><i
                                                                    data-toggle="modal"
                                                                    data-target="#editModal{{$type->id}}"
                                                                    data-feather="edit" width="15" height='15'></i></a>
                                                            @endrole
                                                            @role('types.destroy')
                                                            <form
                                                                action="{{ route('types.destroy', $type->id) }}"
                                                                method="post" class="d-inline">

                                                                @method('DELETE')
                                                                @csrf
                                                                <button data-toggle="tooltip" data-placement="top"
                                                                        style="display: inline-block;border: none;background: none;color: #e90f0f;"
                                                                        onclick="return confirm('هل انت متاكد من هذا العنصر ؟');">
                                                                    <i
                                                                        data-feather="trash-2" width="15"
                                                                        height='15'></i>
                                                                </button>

                                                            </form>
                                                            @endrole


                                                        </td>


                                                        <div class="modal fade modal-bookmark"
                                                             id="editModal{{$type->id}}" tabindex="-1" role="dialog"
                                                             aria-labelledby="editModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog modal-lg" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="editModalLabel">
                                                                            تعديل النوع
                                                                        </h5>
                                                                        <button class="btn-close" type="button"
                                                                                data-bs-dismiss="modal"
                                                                                aria-label="Close"></button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <form class="form-bookmark needs-validation"
                                                                              action="{{route('types.update',$type->id)}}"
                                                                              method="post" id="bookmark-form"
                                                                              novalidate="">
                                                                            @csrf
                                                                            @method('PUT')
                                                                            <div class="row">
                                                                                <div class="mb-3 mt-0 col-md-6">
                                                                                    <label for="task-title">
                                                                                        تعديل اسم
                                                                                        العربى النوع </label>
                                                                                    <input class="form-control"
                                                                                           name="name"
                                                                                           id="name" type="text"
                                                                                           value="{{$type->name}}"
                                                                                           required=""
                                                                                           autocomplete="off">
                                                                                    @error('name')
                                                                                    <div style='color:red'>{{$message}}
                                                                                    </div>
                                                                                    @enderror
                                                                                </div>
                                                                                <div class="mb-3 mt-0 col-md-6">
                                                                                    <label for="task-title">
                                                                                        تعديل اسم
                                                                                        النوع الانجليزى</label>
                                                                                    <input class="form-control"
                                                                                           name="name_en"
                                                                                           id="name_en" type="text"
                                                                                           value="{{$type->name_en}}"
                                                                                           required=""
                                                                                           autocomplete="off">
                                                                                    @error('name_en')
                                                                                    <div style='color:red'>{{$message}}
                                                                                    </div>
                                                                                    @enderror
                                                                                </div>
                                                                                <div class="mb-3 mt-0 col-md-6">
                                                                                    <label
                                                                                    >الصنف </label>
                                                                                    <select name='class_id'
                                                                                            id=class_id"
                                                                                            class="class_id  form-select"
                                                                                            aria-label="Default select example">
                                                                                        <option value=''>اختر الصنف
                                                                                        </option>

                                                                                        @foreach($classes as $classe)

                                                                                            <option
                                                                                                value='{{$classe->id}}'{{ $type->class_id ==$classe->id  ? 'selected' : ''}}>{{$classe->name}}</option>

                                                                                        @endforeach
                                                                                    </select>
                                                                                    @error('class_id')
                                                                                    <div
                                                                                        style='color:red'>{{$message}}</div>
                                                                                    @enderror

                                                                                </div>
                                                                            </div>
                                                                            <input id="index_var" type="hidden"
                                                                                   value="6">
                                                                            <button class="btn btn-secondary"
                                                                                    id="Bookmark"
                                                                                    type="submit">تعديل
                                                                            </button>
                                                                            <button class="btn btn-primary"
                                                                                    type="button"
                                                                                    data-bs-dismiss="modal">
                                                                                إلغاء
                                                                            </button>
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

@endsection
@section('scripts')
    <script type="text/javascript">
        $(window).on('load', function () {
            @if($errors -> has('method') && $errors -> first('method') == 'POST')
            $('#typesModal').modal('show');
            @endif
        });
        $(window).on('load', function () {
            let var_id = '{{$errors->first('id')}}';


            @if($errors -> has('method') && $errors -> first('method') == 'PUT' && $errors -> has('id'))
            $('#editModal' + var_id).modal('show');
            @endif
        });


    </script>
@endsection
