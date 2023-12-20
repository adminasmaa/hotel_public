@extends('layouts.admin')
@section('title', 'التفتيش')

@section('content')
    <div class="modal fade modal-bookmark" id="checkallTypesModal"
         tabindex="-1"
         role="dialog" aria-labelledby="checkallTypesModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"
                        id="checkallTypesModalLabel">نوع التفتيش
                        جديد </h5>
                    <button class="btn-close" type="button"
                            data-bs-dismiss="modal"
                            aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="form-bookmark needs-validation"
                          action="{{route('checkallTypes.store')}}"
                          method="post" id="bookmark-form"
                          novalidate="">
                        @csrf
                        <div class="row">
                            <div class="mb-3 mt-0 col-md-12">
                                <label for="task-title">اسم
                                    النوع </label>
                                <input class="form-control"
                                       name="name" id="name"
                                       type="text" required=""
                                       autocomplete="off">
                                @error('name')
                                <div
                                    style='color:red'>{{$message}}</div>
                                @enderror
                            </div>
                        </div>
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
    <div class="container-fluid" style="background: #f4f4f4;">
        <div class="row">
            <form class="mega-vertical" action="{{route('answers.selectType')}}" method="post"
                  enctype="multipart/form-data">
                @csrf
                <div class="col-sm-12 p-20">
                    <div class="card height-equal">
                        <div class="card-header">
                            <h5> التفتيش</h5>
                        </div>
                        <div class="card-body">

                            <div class="row">

                                <div class="col-sm-12">
                                    <div class="media-body">
                                        <div class="mb-3 row">
                                            <label class="col-sm-12 col-form-label"> النوع

                                                <span
                                                    class=" text-danger">*</span></label>
                                            <div class="col-sm-9">
                                                <select class="form-select digits" id="exampleFormControlSelect9"
                                                        name="type_id" value="{{old('type_id')}}">
                                                    <option value=''>اختر النوع</option>
                                                    @foreach($types as $item)
                                                        @if($item->checkall->count()>0)
                                                            <option value='{{$item->id}}'>{{$item->name}}</option>
                                                        @endif
                                                    @endforeach

                                                </select>
                                                @error('type_id')
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
                            <button class="btn btn-primary m-r-15" type="submit">التالى</button>

                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection
@section('scripts')

@endsection

