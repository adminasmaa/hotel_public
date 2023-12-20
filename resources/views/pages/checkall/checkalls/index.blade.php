@extends('layouts.admin')
@section('title',  'اسئله التفتيش')
@section('content')
    <div class="modal fade modal-bookmark" id="checkallModal"
         tabindex="-1"
         role="dialog" aria-labelledby="checkallModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"
                        id="checkallTypesModalLabel"> تفتيش
                        جديد </h5>
                    <button class="btn-close" type="button"
                            data-bs-dismiss="modal"
                            aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="form-bookmark needs-validation"
                          action="{{route('checkalls.store')}}"
                          method="post" id="bookmark-form"
                          novalidate="">
                        @csrf
                        <div class="row">
                            <div class="col-sm-9">
                                <div class="media-body">
                                    <div class="mb-3 row">
                                        <label class="col-sm-12 col-form-label">
                                            السؤال <span class=" text-danger">*</span>
                                        </label>
                                        <div class="col-sm-9">
                                            <textarea name='question' rows="5"
                                                      class="form-control">{{old('question')}}</textarea>

                                            @error('question')
                                            <div style='color:red'>{{$message}}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="media-body">
                                    <div class="mb-3 row">
                                        <label class="col-sm-12 col-form-label"> الترتيب </label>
                                        <div class="col-sm-12">
                                            <input type="number" name='order'
                                                   value="{{old('order')}}" class="form-control"
                                                   placeholder="">
                                            @error('order')
                                            <div style='color:red'>{{$message}}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <input id="type_id" type="hidden" name="type_id"
                               value="{{request()->get('type')}}">
                        <input id="index_var" type="hidden"
                               value="6">
                        <button class="btn btn-secondary"
                                id="Bookmark" type="submit">حفظ
                        </button>
                        <button class="btn btn-primary"
                                type="button"
                                data-bs-dismiss="modal">إلغاء
                        </button>
                    </form>
                </div>


            </div>
        </div>
    </div>


    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12" id="class-content">
                <div class="email-right-aside bookmark-tabcontent">
                    <div class="card email-body radius-left">
                        <div class="ps-0">
                            <div class="tab-content">
                                <div class="tab-pane fade active show" id="banks" role="tabpanel"
                                     aria-labelledby="banks-tab">
                                    <div class="card mb-0">
                                        @role('checkalls.store')
                                        <div class="card-header">
                                            <a data-bs-target="#checkallModal" data-bs-toggle="modal"
                                               class="btn btn-square btn-primary">
                                                إضافة جديدة</a>
                                        </div>
                                        @endrole
                                        <div class="card-header">
                                            نوع التفتيش
                                            <br/>
                                            <br/>
                                            @php

                                                $type_name=App\Models\Checkall\CheckallType::where('id',(request()->get('type')))->first()->name;

                                            @endphp

                                            <button
                                                class="btn btn-square btn-primary">{{$type_name}}</button>

                                        </div>


                                        <div class="card-body">


                                            <div class="dt-ext table-responsive">
                                                <table class=" table display  data-table-responsive " id="">
                                                    <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>السؤال</th>
                                                        <th>الترتيب</th>
                                                        <th class="not-export-col">الاجراءات</th>
                                                    </tr>
                                                    </thead>

                                                    <tbody>

                                                    @foreach($checkalls as $checkall)

                                                        <tr>
                                                            <td>{{$loop->index + 1}}</td>
                                                            <td>{{$checkall->question}}</td>

                                                            <td>{{$checkall->order}}</td>
                                                            <td>
                                                                @role('checkalls.update')
                                                                <a href="{{('/#editModal'.$checkall->id)}}"
                                                                   data-bs-toggle="modal"
                                                                   data-target="#editModal{{$checkall->id}}"
                                                                   data-toggle="modal"
                                                                   class="me-2">
                                                                    <i data-feather="edit" width="15" height='15'>
                                                                        تعديل</i>
                                                                </a>


                                                                @endrole
                                                                @role('checkalls.destroy')
                                                                <form
                                                                    action="{{ route('checkalls.destroy', $checkall->id) }}"
                                                                    method="POST" class="d-inline">
                                                                    @method('DELETE')
                                                                    @csrf
                                                                    <button

                                                                        style="display: inline-block;border: none;background: none;color: #e90f0f;"

                                                                        type="submit" data-toggle="tooltip"
                                                                        data-placement="top"
                                                                        title="{{ __('حذف') }}"
                                                                        onclick="return confirm('        هل انت متاكد من حذف هذا العنصر ');"
                                                                        class="me-2"><i data-feather="trash-2"
                                                                                        width="15"
                                                                                        height='15'></i>
                                                                    </button>
                                                                </form>
                                                                @endrole
                                                            </td>
                                                            <div class="modal fade modal-bookmark"
                                                                 id="editModal{{$checkall->id}}"
                                                                 tabindex="-1"
                                                                 role="dialog" aria-labelledby="checkallModalLabel"
                                                                 aria-hidden="true">
                                                                <div class="modal-dialog modal-lg" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title"
                                                                                id="checkallTypesModalLabel">
                                                                                تعديل السؤال </h5>
                                                                            <button class="btn-close" type="button"
                                                                                    data-bs-dismiss="modal"
                                                                                    aria-label="Close"></button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <form class="form-bookmark needs-validation"
                                                                                  action="{{route('checkalls.update',$checkall->id)}}"
                                                                                  method="post" id="bookmark-form"
                                                                                  novalidate="">
                                                                                @csrf
                                                                                @method('PUT')
                                                                                <div class="row">
                                                                                    <div class="mb-3 mt-0 col-md-6">
                                                                                        <div class="media-body">
                                                                                            <div class="mb-3 row">
                                                                                                <label
                                                                                                    class="col-sm-12 col-form-label">نوع
                                                                                                    السؤال <span
                                                                                                        class=" text-danger">*</span>
                                                                                                </label>
                                                                                                <select name='type_id'
                                                                                                        id=type_id"
                                                                                                        class="class_id  form-select"
                                                                                                        aria-label="Default select example">
                                                                                                    <option value=''>
                                                                                                        اختر النوع
                                                                                                    </option>

                                                                                                    @foreach($types as $type)

                                                                                                        <option
                                                                                                            value='{{$type->id}}'{{ $checkall->type_id ==$type->id  ? 'selected' : ''}}>{{$type->name}}</option>

                                                                                                    @endforeach
                                                                                                </select>
                                                                                                @error('type_id')
                                                                                                <div
                                                                                                    style='color:red'>{{$message}}</div>
                                                                                                @enderror

                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="mb-3 mt-0 col-md-6">
                                                                                        <div class="media-body">
                                                                                            <div class="mb-3 row">
                                                                                                <label
                                                                                                    class="col-sm-12 col-form-label">
                                                                                                    الترتيب </label>
                                                                                                <div class="col-sm-12">
                                                                                                    <input type="number"
                                                                                                           name='order'
                                                                                                           value="{{$checkall->question}}"
                                                                                                           class="form-control"
                                                                                                           placeholder="">
                                                                                                    @error('order')
                                                                                                    <div
                                                                                                        style='color:red'>{{$message}}</div>
                                                                                                    @enderror
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-sm-12">
                                                                                        <div class="media-body">
                                                                                            <div class="mb-3 row">
                                                                                                <label
                                                                                                    class="col-sm-12 col-form-label">
                                                                                                    السؤال <span
                                                                                                        class=" text-danger">*</span>
                                                                                                </label>
                                                                                                <div class="col-sm-9">
                                                                                       <textarea name='question'
                                                                                                 rows="5"
                                                                                                 class="form-control">{{$checkall->question}}</textarea>

                                                                                                    @error('question')
                                                                                                    <div
                                                                                                        style='color:red'>{{$message}}</div>
                                                                                                    @enderror
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                </div>

                                                                                <input id="index_var" type="hidden"
                                                                                       value="6">
                                                                                <button class="btn btn-secondary"
                                                                                        id="Bookmark" type="submit">تعديل
                                                                                </button>
                                                                                <button class="btn btn-primary"
                                                                                        type="button"
                                                                                        data-bs-dismiss="modal">إلغاء
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
    </div>

@endsection
@section('scripts')
    <script type="text/javascript">
        $(window).on('load', function () {
            @if ($errors->has('method') && $errors->first('method')=='POST')
            $('#checkallModal').modal('show');
            @endif
        });
        $(window).on('load', function () {

            let var_id = '{{$errors->first('id')}}';


            @if($errors->has('method') && $errors-> first('method') == 'PUT' && $errors-> has('id'))
            $('#editModal' + var_id).modal('show');
            @endif
        });


    </script>
@endsection
