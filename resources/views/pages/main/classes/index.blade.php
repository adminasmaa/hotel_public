@extends('layouts.admin')
@section('title', 'الاصناف')
@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">

                        @role('classes.store')
                        <a href="{{route('classes.create')}}" class="btn btn-square btn-primary" style="align:left;">
                            إضافة صنف</a>
                        @endrole
                    </div>

                    <div class="card-body">
                        <div class="dt-ext table-responsive">
                            <table class="table display data-table-responsive" id="export-button ">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>الاسم</th>
                                    <th>عدد الاصناف</th>
                                    <th class="not-export-col">اعدادات</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($classes as $class)
                                    <tr>
                                        <td>{{$loop->index + 1}}</td>
                                        <td>{{$class->name}}</td>
                                        <td>
                                            <a href="{{route('types.index',array('class' => $class->id))}}">{{$class->count}}</a>
                                        </td>
                                        <td>
                                            @role('classes.update')
                                            <a href="{{route('classes.edit',$class->id)}}" data-id="{{$class->id}}"
                                               id="edit_id" class="me-2">
                                                <i data-feather="edit" width="15" height='15'> تعديل</i>
                                            </a>

                                            @endrole
                                            @role('classes.destroy')
                                            <form action="{{ route('classes.destroy', $class->id) }}"
                                                  method="POST" class="d-inline">
                                                @method('DELETE')
                                                @csrf
                                                <button
                                                    style="display: inline-block;border: none;background: none;color: #e90f0f;"

                                                    type="submit" data-toggle="tooltip" data-placement="top"
                                                    title="{{ __('delete') }}"
                                                    onclick="return confirm('سيتم حذف جميع المنتجات والانواع المرتبطه بهذا الصنف هل انت متاكد من حذف هذا العنصر ');"
                                                    class="me-2"><i data-feather="trash-2" width="15" height='15'></i>
                                                </button>
                                            </form>
                                            @endrole
                                        </td>
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

@endsection

@section('scripts')
    <script>
        $(document).ready(function () {
            let currentURL = window.location.href;
            let url = "{{ route('classes.create') }}";
            if (currentURL === url) {

                $("#card").css('display', 'none');
                $('#class-content').attr('class', 'col-xl-12 col-md-12 box-col-12');

            } else {

                $("#card").css('display', 'block');
            }

        });


    </script>

@endsection


