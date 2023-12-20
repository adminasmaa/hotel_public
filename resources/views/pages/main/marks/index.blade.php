@extends('layouts.admin')
@section('title', 'الماركات')
@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">

                        @role('marks.store')
                        <a href="{{route('marks.create')}}" class="btn btn-square btn-primary" style="align:left;">
                            إضافة ماركة</a>
                        @endrole
                    </div>

                    <div class="card-body">
                        <div class="dt-ext table-responsive">
                            <table class="table display data-table-responsive" id="export-button ">

                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>اسم الماركة</th>
                                    <th> الشركات الموردة</th>
                                    <th>النسبة</th>
                                    <th class="not-export-col">الصورة</th>
                                    <th class="not-export-col">تعديل</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($marks as $mark)
                                    <tr>
                                        <td>{{$loop->index + 1}}</td>
                                        <td>{{$mark->name}}</td>
                                        <td>
                                            @foreach(json_decode($mark->company_id) as $key=>$value)
                                                <p style="color:#2b2b2b">{{$value->company_name}}</p>

                                            @endforeach
                                        </td>

                                        <td>{{$mark->discount}}</td>
                                        <td>
                                            <a target="_blank" href="{{asset('storage/'.$mark->company_img)}}"><img
                                                    class="b-r-10" width="50px" height="50px"
                                                    src="{{asset('storage/'.$mark->company_img)}}" alt=""></a>
                                        </td>
                                        <td>
                                            @role('marks.update')
                                            <a href="{{route('marks.edit',$mark->id)}}" data-id="{{$mark->id}}"
                                               id="edit_id" class="me-2">
                                                <i data-feather="edit" width="15" height='15'> تعديل</i>
                                            </a>
                                            @endrole
                                            @role('marks.destroy')
                                            <form action="{{ route('marks.destroy', $mark->id) }}"
                                                  method="POST" class="d-inline">
                                                @method('حذف')
                                                @csrf
                                                <button
                                                    style="display: inline-block;border: none;background: none;color: #e90f0f;"

                                                    type="submit" data-toggle="tooltip" data-placement="top"
                                                    title="{{ __('delete') }}"
                                                    onclick="return confirm('سيتم حذف كل الاصناف المتعلق بهذا العنصر هل انت متاكد من ذلك؟' );"
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


