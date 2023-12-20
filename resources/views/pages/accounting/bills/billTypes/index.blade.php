@extends('layouts.admin')
@section('title', 'انواع الفواتير')
@section('content')

    <div class="row">

        <div class="col-xl-12 col-md-12 box-col-12" id="class-content">
            <div class="email-right-aside bookmark-tabcontent">
                <div class="card email-body radius-left">
                    <div class="ps-0">
                        <div class="tab-content">
                            <div class="tab-pane fade active show" id="billsTypes" role="tabpanel"
                                 aria-labelledby="billsTypes-tab">
                                <div class="card mb-0">
                                    <div class="card-header d-flex">
                                        <h5 class="mb-0">


                                            @role('billsTypes.store')
                                            <button class="me-2 btn-block btn-mail w-100" data-bs-toggle="modal"
                                                    data-bs-target="#billsTypesModal" type="button"
                                                    style="border: none;">إضافة
                                                جديدة
                                            </button>
                                            @endrole

                                        </h5>
                                        <div class="modal fade modal-bookmark" id="billsTypesModal" tabindex="-1"
                                             role="dialog" aria-labelledby="billsTypesModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="billsTypesModalLabel"> نوع  
                                                            جديد </h5>
                                                        <button class="btn-close" type="button" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form class="form-bookmark needs-validation"
                                                              action="{{route('billsTypes.store')}}" method="post"
                                                              id="bookmark-form" novalidate="">
                                                            @csrf
                                                            <div class="row">
                                                                <div class="mb-3 mt-0 col-md-12">
                                                                    <label for="task-title">الاسم
                                                                         </label>
                                                                    <input class="form-control" name="name" id="name"
                                                                           type="text" required="" autocomplete="off">
                                                                    @error('name')
                                                                    <div style='color:red'>{{$message}}</div>
                                                                    @enderror
                                                                </div>
                                                            </div>
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
                                            <table class=" table display  data-table-responsive " id="billsTypes">
                                                <thead>
                                                <tr>
                                                    <th>م</th>
                                                    <th> اسم </th>
                                                    <th> عدد الانواع الفرعيه </th>
                                                    <th class="not-export-col">الاعدادت</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @php
                                                    $count=0;
                                                @endphp
                                                @foreach($billsTypes as $billsType)
                                                    @php $count=$count+1 @endphp
                                                    <tr>
                                                        <td>{{$count}}</td>
                                                        <td>{{$billsType->name}}</td>
                                                        <td>
                                                            <a href="{{route('billsSubTypes.index',array('type'=>$billsType->id))}}">{{$billsType->subtype->count()}}</a>
                                                        </td>
                                                        <td>
                                                            @role('billsTypes.update')
                                                            <a class="me-2" data-bs-toggle="modal"
                                                               href="{{('/#editModal'.$billsType->id)}}"><i
                                                                    data-toggle="modal"
                                                                    data-target="#editModal{{$billsType->id}}"
                                                                    data-feather="edit" width="15" height='15'></i></a>
                                                            @endrole
                                                            @role('billsTypes.destroy') 
                                                            <form
                                                                action="{{ route('billsTypes.destroy', $billsType->id) }}"
                                                                method="post" class="d-inline">

                                                                @method('DELETE')
                                                                @csrf
                                                                <button data-toggle="tooltip" style="display: inline-block;border: none;background: none;color: #e90f0f;"
                                                                        data-placement="top"
                                                                        onclick="return confirm('سيتم حذف كل الفواتير الخاصه بهذا النوع هل انت متاكد من حذف هذا العنصر ؟');">
                                                                    <i data-feather="trash-2"  width="15" height='15'></i>
                                                                </button>

                                                            </form>

                                                            @endrole
                                                        </td>


                                                        <div class="modal fade modal-bookmark"
                                                             id="editModal{{$billsType->id}}" tabindex="-1"
                                                             role="dialog"
                                                             aria-labelledby="editModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog modal-lg" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="editModalLabel">
                                                                            نوع فاتورة  
                                                                        </h5>
                                                                        <button class="btn-close" type="button"
                                                                                data-bs-dismiss="modal"
                                                                                aria-label="Close"></button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <form class="form-bookmark needs-validation"
                                                                              action="{{route('billsTypes.update',$billsType->id)}}"
                                                                              method="post" id="bookmark-form"
                                                                              novalidate="">
                                                                            @csrf
                                                                            @method('PUT')
                                                                            <div class="row">
                                                                                <div class="mb-3 mt-0 col-md-12">
                                                                                    <label for="task-title">
                                                                                        تعديل الاسم 
                                                                                    </label>
                                                                                    <input class="form-control"
                                                                                           name="name"
                                                                                           id="name" type="text"
                                                                                           value="{{$billsType->name}}"
                                                                                           required=""
                                                                                           autocomplete="off">
                                                                                    @error('name')
                                                                                    <div style='color:red'>{{$message}}
                                                                                    </div>
                                                                                    @enderror
                                                                                </div>
                                                                            </div>

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
            $('#billsTypesModal').modal('show');
            @endif
        });
        $(window).on('load', function () {
            let var_id = '{{$errors->first('id')}}';
            @if($errors -> has('method') && $errors -> first('method') == 'PUT')
            $('#editModal' + var_id).modal('show');
            @endif
        });
    </script>
@endsection
