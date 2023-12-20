@extends('layouts.admin')
@if(Session::get('branch'))
    @php
        $branch_name=App\Models\hr\branch::where('id',Session::get('branch'))->first()->name;
    @endphp
    @section('title', 'عملاء- '.$branch_name)

@else
    @section('title', 'العملاء')
@endif
@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">

                        @role('clients.store')
                        <a href="{{route('clients.create')}}"
                           class="btn btn-square btn-primary"> إضافة عميل</a>
                        @endrole

                        <a href="?status=3" class="btn btn-square btn-primary"> عرض البلاك لست</a>
                        @if(!Session::get('branch'))
                            @if(auth()->user()->type_role != 'super')
                                @role('clients.setting')
                                <a href="{{route('client.setting')}}"
                                   class="btn btn-square btn-primary"
                                   style="margin:10px;">
                                    الاعدادات
                                </a>
                                @endrole
                            @else
                                <a href="{{route('client.setting')}}"
                                   class="btn btn-square btn-primary"
                                   style="margin:10px;">
                                    الاعدادات
                                </a>
                            @endif
                            <div class="card-header">
                                <div class="col-sm-12">
                                    @foreach($branches as $branch)
                                        @if($branch->id!=1)
                                            <a onclick="addUrlParameter('branch','{{$branch->id}}' )"
                                               class="btn btn-square btn-outline-light btn-sm txt-dark">{{$branch->name}}
                                                ({{$branch->c_count}})</a>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        @endif
                    </div>

                    <div class="card-body">
                        <div class="dt-ext table-responsive">
                            <table class="table display data-table-responsive" id="export-button">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>الاسم</th>
                                    <th>الفرع</th>
                                    <th>الجنسية</th>
                                    <th>الهاتف</th>
                                    <th class="not-export-col">عمليات</th>

                                </tr>
                                </thead>
                                <tbody>
                                @foreach($clients as $client)
                                    <tr>
                                        <td>{{$loop->index + 1}}</td>
                                        <td>{{$client->name}}</td>
                                        <td>{{optional($client->branch)->name}}</td>
                                        <td>{{optional($client->nationality)->name}}</td>
                                        <td>{{$client->phone}}</td>
                                        <td>
                                            @role('clients.show')
                                            <a href="{{route('clients.show',$client->id,array('branch' => request()->get('branch')))}}"
                                               data-id="{{$client->id}}"
                                               id="edit_id" class="me-2" width="15" height='15'>
                                                <i data-feather="eye" width="15" height='15'></i>
                                            </a>
                                            @endrole
                                            @if(!request()->has('status'))
                                                @role('clients.update')
                                                <a href="{{route('clients.edit',$client->id,array('branch' => request()->get('branch')))}}"
                                                   data-id="{{$client->id}}"
                                                   id="edit_id" class="me-2" width="15" height='15'>
                                                    <i data-feather="edit" width="15" height='15'></i>
                                                </a>
                                                @endrole
                                            @endif
                                            @role('clients.destroy')
                                            <form
                                                action="{{ route('clients.destroy', $client->id,array('branch' => request()->get('branch'))) }}"
                                                method="POST" class="d-inline">
                                                @method('DELETE')
                                                @csrf
                                                <button
                                                    style="display: inline-block;border: none;background: none;color: #e90f0f;"
                                                    type="submit" data-toggle="tooltip" data-placement="top"
                                                    title="{{ __('حذف') }}"
                                                    onclick="return confirm('هل انت متاكد من حذف هذا العنصر');"
                                                    class="me-2"><i data-feather="trash-2" width="15" height='15'></i>
                                                </button>
                                            </form>
                                            @endrole


                                            @if($client->client_statuses_id == 3)
                                                @role('clients.remove_black')
                                                <a type="button" title="إلغاء للبلاك ليست "
                                                   href="{{route('clients.remove_black',$client->id,array('branch' => request()->get('branch')))}}"
                                                   class="btn btn-primary">
                                                    <i class="fa fa-toggle-on"></i>
                                                </a>
                                                @endrole

                                            @else
                                                @role('clients.store_black')

                                                <button class="me-3 btn btn-primary" title="إضافة للبلاك ليست "
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#add_black{{$client->id}}" type="button"
                                                        style="border: none;" width="15" height='15'>
                                                    <i class="fa fa-list" width="15" height='15'></i></button>
                                                @endrole
                                            @endif


                                        </td>

                                        <div class="modal fade modal-bookmark" id="add_black{{$client->id}}"
                                             tabindex="-1" role="dialog"
                                             aria-labelledby="sendMsgLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="sendMsgLabel">إضافة للبلاك
                                                            ليست </h5>
                                                        <button class="btn-close" type="button" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form class="form-bookmark needs-validation" id="bookmark-form"
                                                              novalidate=""
                                                              action="{{route('clients.store_black',$client->id,array('branch' => request()->get('branch')))}}"
                                                              method="post"
                                                              enctype="multipart/form-data">
                                                            @csrf
                                                            <div class="row">
                                                                <div class="mb-3 mt-0 col-md-12">
                                                                    <label for="task-title">السبب </label>
                                                                    <textarea class="form-control" id="status_reason"
                                                                              name="status_reason" required=""
                                                                              autocomplete="off"></textarea>
                                                                </div>
                                                            </div>
                                                            <input id="index_var" type="hidden" value="6">
                                                            <button class="btn btn-secondary" id="Bookmark"
                                                                    type="submit">إرسال
                                                            </button>
                                                            <button class="btn btn-primary" type="button"
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
        function addUrlParameter(name, value) {
            var searchParams = new URLSearchParams(window.location.search)
            searchParams.set(name, value)
            window.location.search = searchParams.toString()
        }

    </script>
@endsection
