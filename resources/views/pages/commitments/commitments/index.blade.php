@extends('layouts.admin')
@section('title', 'التزامات')
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
                                        @role('commitments.store')
                                        <a href="{{route('commitments.create')}}" class="btn btn-square btn-primary">
                                            إضافة التزام</a>
                                        @endrole
                                        @role('commitments.setting')
                                        <a href="{{route('commitments.setting')}}" class="btn btn-square btn-primary"
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
                                                        <th>الفرع</th>
                                                        <th> الحاله</th>
                                                        <th>المبلغ</th>
                                                        <th>رقم الهاتف</th>
                                                        <th>الدوله</th>
                                                        <th>رقم الحساب</th>
                                                        <th class="not-export-col">الاعدادت</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    @foreach($commitments as $commitment)
                                                    <tr>
                                                        <td>{{$loop->index + 1}}</td>
                                                        <td>{{$commitment->section->name}}</td>
                                                        <td>{{$commitment->status=='work'?'يعمل':'متوقف'}}</td>
                                                        <td>{{$commitment->value}}</td>
                                                        <td>{{$commitment->phone}}</td>

                                                        <td>{{optional($commitment->country)->name}}</td>
                                                        <td>{{$commitment->account_num}}</td>


                                                        <td>

                                                            @role('commitments.update')
                                                            <a href="{{route('commitments.edit',$commitment->id)}}"
                                                                data-id="{{$commitment->id}}" id="edit_id" class="me-2">
                                                                <i data-feather="edit" width="15" height='15'></i>
                                                            </a>
                                                            @endrole



                                                            @role('commitments.destroy')
                                                            <form
                                                                action="{{ route('commitments.destroy', $commitment->id) }}"
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
