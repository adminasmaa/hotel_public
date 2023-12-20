@extends('layouts.admin')
@section('title', 'مرافق الشقه')
@section('content')

<div class="row">

    <div class="col-xl-12 col-md-12 box-col-12" id="class-content">
        <div class="email-right-aside bookmark-tabcontent">
            <div class="card email-body radius-left">
                <div class="ps-0">
                    <div class="tab-content">
                        <div class="tab-pane fade active show" id="homeContents" role="tabpanel"
                            aria-labelledby="homeContents-tab">
                            <div class="card mb-0">
                                <div class="card-header d-flex">
                                    <h5 class="mb-0">
                                    @if(!request()->has('branch'))
                                        @role('homeContents.store')

                                        <button class="me-2 btn-block btn-mail" data-bs-toggle="modal"
                                            data-bs-target="#homeContentsModal" type="button"
                                            style="border: none;">إضافة
                                            جديد
                                        </button>
                                        @endrole
                                    @else    
                                        <a href="{{route('homeContents.chooseContent')}}" class="btn btn-square btn-primary">
                                             اختار مرافق الفرع</a>
                                        @endif
                                    </h5>
                                   
                                    <div class="modal fade modal-bookmark" id="homeContentsModal" tabindex="-1"
                                        role="dialog" aria-labelledby="homeContentsModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="homeContentsModalLabel">تقسيم
                                                        جديد </h5>
                                                    <button class="btn-close" type="button" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form class="form-bookmark needs-validation"
                                                        action="{{route('homeContents.store')}}" method="post"
                                                        id="bookmark-form" novalidate="">
                                                        @csrf
                                                        <div class="row">
                                                            <div class="mb-3 mt-0 col-md-12">
                                                                <label for="task-title">اسم
                                                                     بالعربى</label>
                                                                <input class="form-control" name="name" id="name"
                                                                    type="text" required="" autocomplete="off">
                                                                @error('name')
                                                                <div style='color:red'>{{$message}}</div>
                                                                @enderror
                                                            </div>
                                                            <div class="mb-3 mt-0 col-md-12">
                                                                <label for="task-title">اسم
                                                                     بالانجليزيه</label>
                                                                <input class="form-control" name="name_en" id="name_en"
                                                                    type="text" required="" autocomplete="off">
                                                                @error('name_en')
                                                                <div style='color:red'>{{$message}}</div>
                                                                @enderror
                                                            </div>
                                                            <div class="mb-3 mt-0 col-md-12">
                                                                <label for="task-title">الوصف
                                                                     </label>
                                                                <textarea class="form-control" name="desc" id="exampleFormControlTextarea4" rows="3"></textarea>
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

                                </div>
                                <div class="card-body ">

                                    <div class="dt-ext table-responsive">
                                        <table class=" table display  data-table-responsive " id="">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th> الاسم بالعربى</th>
                                                    <th> الاسم بالانجليزيه</th>
                                                    <th> الوصف </th>
                                                    <th> محتويات الشقه </th>
                                                    <th class="not-export-col">الاعدادت</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                $count=0;
                                                @endphp
                                                @foreach($homeContents as $homeContent)
                                                @php $count=$count+1 @endphp
                                                <tr>
                                                    <td>{{$count}}</td>
                                                    <td>{{$homeContent->name}}</td>
                                                    <td>{{$homeContent->name_en}}</td>
                                                    <td>{{$homeContent->desc}}</td>
                                                    <td><form action="{{route('contents.index')}}" method="get">
                                                        <input type="hidden" value="{{$homeContent->id}}" name='homecontent'>
                                                                <button type="submit"
                                                                    class="btn btn-square btn-primary">
                                                                    {{$homeContent->content->count()}}</button>
                                                            </form></td>
                                                    <td>
                                                    @role('homeContents.update')
                                                        <a class="me-2" data-bs-toggle="modal"
                                                            href="{{('/#editModal'.$homeContent->id)}}"><i
                                                                data-toggle="modal"
                                                                data-target="#editModal{{$homeContent->id}}"
                                                                data-feather="edit" width="15" height='15'></i></a>
                                                            @endrole
                                                     @role('homeContents.destroy')

                                                        <form
                                                            action="{{ route('homeContents.destroy', $homeContent->id) }}"
                                                            method="post" class="d-inline">

                                                            @method('DELETE')
                                                            @csrf
                                                            <button data-toggle="tooltip"
                                                                style="display: inline-block;border: none;background: none;color: #e90f0f;"
                                                                data-placement="top"
                                                                onclick="return confirm('هل انت متاكد من هذا العنصر ؟');"><i
                                                                    data-feather="trash-2" width="15" height='15'></i>
                                                            </button>

                                                        </form>

                                                        @endrole
                                                    </td>


                                                    <div class="modal fade modal-bookmark"
                                                        id="editModal{{$homeContent->id}}" tabindex="-1" role="dialog"
                                                        aria-labelledby="editModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog modal-lg" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="editModalLabel">

                                                                        تعديل </h5>
                                                                    <button class="btn-close" type="button"
                                                                        data-bs-dismiss="modal"
                                                                        aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form class="form-bookmark needs-validation"
                                                                        action="{{route('homeContents.update',$homeContent->id)}}"
                                                                        method="post" id="bookmark-form" novalidate="">
                                                                        @csrf
                                                                        @method('PUT')
                                                                        <div class="row">
                                                                            <div class="mb-3 mt-0 col-md-12">
                                                                                <label for="task-title">
                                                                                     الاسم بالعربى
                                                                                </label>
                                                                                <input class="form-control" name="name"
                                                                                    id="name" type="text"
                                                                                    value="{{$homeContent->name}}"
                                                                                    required="" autocomplete="off">
                                                                                @error('name')
                                                                                <div style='color:red'>{{$message}}
                                                                                </div>
                                                                                @enderror
                                                                            </div>
                                                                            <div class="mb-3 mt-0 col-md-12">
                                                                                <label for="task-title">اسم
                                                                                     بالانجليزيه</label>
                                                                                <input class="form-control" name="name_en" id="name_en"
                                                                                    type="text" required="" autocomplete="off"
                                                                                    value="{{$homeContent->name_en}}">
                                                                                @error('name_en')
                                                                                <div style='color:red'>{{$message}}</div>
                                                                                @enderror
                                                                            </div>
                                                                            <div class="mb-3 mt-0 col-md-12">
                                                                                <label for="task-title">الوصف
                                                                                    </label>
                                                                                <textarea class="form-control" name="desc" id="exampleFormControlTextarea4" rows="3">{{$homeContent->desc}}</textarea>
                                                                            </div>
                                                                        </div>
                                                                        <input id="index_var" type="hidden" value="6">
                                                                        <button class="btn btn-secondary" id="Bookmark"
                                                                            type="submit" >تعديل  
                                                                        </button>
                                                                        <button class="btn btn-primary" type="button"
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
$(window).on('load', function() {
    @if($errors -> has('method') && $errors -> first('method') == 'POST')
    $('#homeContentsModal').modal('show');
    @endif
});
</script>
@endsection
