@extends('layouts.admin')
@section('title', ' انواع الشقه')
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
                                    @if(!request()->has('branch'))
                                        @role('apartTypes.store')
                                        <a href="{{route('apartTypes.create')}}" class="btn btn-square btn-primary">
                                            إضافة نوع</a>
                                        @endrole
                                        @endif
                                       
                                    </div>

                                    <div class="card-body">

                                        <div class="dt-ext table-responsive">
                                            <table class=" table display  data-table-responsive" id="">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>الاسم</th>
                                                        <th>مسمى نوع الشقه</th>
                                                        <th> نوع السرير</th>
                                                        <th> نوع الاطلالة</th>
                                                        <th>مرافق الشقه</th>
                                                        <th>عدد الشقق</th>
                                                        <th class="not-export-col">الاعدادت</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    @foreach($apartTypes as $apartType)
                                                    <tr>
                                                        <td>{{$loop->index + 1}}</td>
                                                        <td>{{$apartType->name}}</td>
                                                        <td>{{$apartType->type_name}}</td>
                                                        <td>{{$apartType->bedType->name}}</td>
                                                        <td>{{$apartType->viewType->name}}</td>
                                                        <td>
                                                            @foreach($apartType->homeContents as $key=>$item)
                                                            {{$item->name .($key!=(count($apartType->homeContents)-1)?',':'')}}
                                                            @endforeach
                                                        </td>
                                                        <td><a href="{{route('apartments.index',['type'=>$apartType->id])}}"
                                                                    class="btn btn-square btn-primary">
                                                                    {{$apartType->apart->count()}}</a></td>
                                                        <td>
                                                            @role('apartTypes.update')
                                                            <a href="{{route('apartTypes.edit',$apartType->id)}}"
                                                                data-id="{{$apartType->id}}" id="edit_id" class="me-2">
                                                                <i data-feather="edit" width="15" height='15'></i>
                                                            </a>
                                                            @endrole

                                                           

                                                            @role('apartTypes.destroy')
                                                            <form
                                                                action="{{ route('apartTypes.destroy', $apartType->id) }}"
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
