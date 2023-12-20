@extends('layouts.admin')
@section('title', 'الصيانه')
@section('content')

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
                                    <div class="card-header">
                                        @role('maintenances.store')
                                        <a href="{{route('maintenances.create')}}" class="btn btn-square btn-primary">
                                            إضافة صيانه</a>
                                        @endrole
                                        <a href="?expired" class="btn btn-square btn-primary"
                                            style="margin:10px;">
                                                الارشيف
                                         </a>
                                        @role('maintenances.setting')
                                        <a href="{{route('maintenances.setting',array('branch' => request()->get('branch')))}}" class="btn btn-square btn-primary"
                                            style="margin:10px;">
                                                الاعدادات
                                         </a>
                                        @endrole

                                    </div>

                                    <div class="card-body">

                                        <div class="dt-ext table-responsive">
                                            <table class=" table display  data-table-responsive" id="">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>الشقه</th>
                                                        <th>نوع الشقه</th>
                                                        <th>مرفق الشقه</th>
                                                        <th>المطلوب</th>
                                                        <th>السبب</th>
                                                        <th>الملاحظه</th>
                                                        @if(request()->has('expired'))
                                                        <th>تاريخ الانتهاء</th>
                                                        @endif
                                                        <th class="not-export-col">الاعدادت</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    @foreach($maintenances as $maintenance)
                                                    <tr>
                                                        <td>{{$loop->index + 1}}</td>
                                                        <td>{{optional($maintenance->apart)->name}}</td>
                                                        <td>{{optional($maintenance->apartType)->name}}</td>

                                                        <td>{{optional($maintenance->content)->name}}</td>

                                                        <td>{{optional($maintenance->require)->name}}</td>
                                                        <td>{{$maintenance->reason}}</td>
                                                        <td>{{$maintenance->note}}</td>
                                                        @if(request()->has('expired'))
                                                          <td>{{$maintenance->expired_at}}</td>
                                                        @endif

                                                        <td>
                                                        @if(!request()->has('expired'))
                                                           <form
                                                                action="{{ route('maintenances.expired', $maintenance->id) }}"
                                                                method="POST" class="d-inline">
                                                                @csrf
                                                                <button
                                                                    style="display: inline-block;border: none;background: none;"
                                                                    type="submit" data-toggle="tooltip"
                                                                    data-placement="top" 
                                                                    onclick="return confirm('هل انت متاكد من انه تم انجاز هذا العنصر');"
                                                                    class="me-2 btn btn-primary">تم الانجاز
                                                                </button>
                                                            </form>
                                                            @endif
                                                            @role('maintenances.update')
                                                            <a href="{{route('maintenances.edit',$maintenance->id)}}"
                                                                data-id="{{$maintenance->id}}" id="edit_id" class="me-2">
                                                                <i data-feather="edit" width="15" height='15'></i>
                                                            </a>
                                                            @endrole



                                                            @role('maintenances.destroy')
                                                            <form
                                                                action="{{ route('maintenances.destroy', $maintenance->id) }}"
                                                                method="POST" class="d-inline">
                                                                @method('DELETE')
                                                                @csrf
                                                                <button
                                                                    style="display: inline-block;border: none;background: none;color: #e90f0f;"
                                                                    type="submit" data-toggle="tooltip"
                                                                    data-placement="top" title="{{ __('delete') }}"
                                                                    onclick="return confirm('هل انت متاكد من حذف هذا العنصر');"
                                                                    class="me-2"><i data-feather="trash-2" width="15"
                                                                        height='15'></i>
                                                                </button>
                                                            </form>
                                                            @endrole
                                                        </td>
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

@endsection
