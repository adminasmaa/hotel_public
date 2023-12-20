@extends('layouts.admin')
@section('title', 'الفواتير')
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
                                        @role('bills.store')
                                        <a href="{{route('bills.create',array('name'=>request()->get('name')))}}" class="btn btn-square btn-primary">
                                            إضافة الفاتورة</a>
                                        @endrole
                                        @if(!request()->has('name')||request()->get('name')=='bills')
                                        @role('bills.store')
                                        <a href="{{route('bills.index',array('name'=>'convenant'))}}" class="btn btn-square btn-primary">
                                            العهد </a>
                                        @endrole
                                        @role('bills.store')
                                        <a href="{{route('bills.index',array('name'=>'accredited'))}}" class="btn btn-square btn-primary">
                                            المعتمدين </a>
                                        @endrole
                                        <a href="{{route('bills.statistic')}}" class="btn btn-square btn-primary">
                                                 الاحصائيات
                                         </a>
                                        @role('bills.setting')
                                        <a href="{{route('bills.setting')}}" class="btn btn-square btn-primary">
                                                الاعدادات
                                         </a>
                                        @endrole
                                        <a href="#" class="btn btn-square btn-primary">
                                                تحديث الرصيد
                                         </a>
                                        @endif

                                    </div>
                                    @if(!Session::get('branch'))
                                    <div class="card-header">
                                        <div class="col-sm-12">
                                            

                                            @foreach($branches as $branch)
                                                <a onclick="addUrlParameter('branch','{{$branch->id}}')"
                                                class="btn btn-square btn-outline-light btn-sm txt-dark">{{$branch->name}}
                                                    ({{App\Models\accounting\Bill\Bill::counts()->where('branch_id',$branch->id)->count()}}
                                                    )</a>
                                            @endforeach
                                        </div>
                                    </div>
                                    @endif
                                    <div class="card-header">
                                        <div class="col-sm-12">
                                            

                                            @foreach(App\Models\accounting\Bill\BillsType::get() as $type)
                                                <a onclick="addUrlParameter('type','{{$type->id}}')"
                                                class="btn btn-square btn-outline-light btn-sm txt-dark">{{$type->name}}
                                                    ({{App\Models\accounting\Bill\Bill::counts()->where('type_id',$type->id)->sum('value')}})</a>
                                            @endforeach
                                        </div>
                                    </div>

                                    <div class="card-body">

                                        <div class="dt-ext table-responsive">
                                            <table class=" table display  data-table-responsive" id="">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>المبلغ</th>
                                                        @if(!request()->has('type'))
                                                        <th> النوع</th>
                                                        @endif
                                                        @if(!request()->has('branch')&&!Session::get('branch'))
                                                        <th>الفرع</th>
                                                        @endif
                                                        <th>التاريخ</th>
                                                        <th class="not-export-col">الاعدادت</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    @foreach($bills as $bill)
                                                    <tr>
                                                        <td>{{$loop->index + 1}}</td>
                                                        <td>{{$bill->value}}</td>
                                                        @if(!request()->has('type'))
                                                        <td>{{$bill->type->name}}</td>
                                                        @endif
                                                        @if(!request()->has('branch')&&!Session::get('branch'))
                                                        <td>{{$bill->branch->name}}</td>
                                                        @endif
                                                        <td>{{$bill->date}}</td>

                                                        <td>

                                                          @role('bills.show')
                                                            <a href="{{route('bills.show',$bill->id)}}"
                                                                data-id="{{$bill->id}}" id="edit_id"
                                                                class="me-2" width="15" height='15'>
                                                                <i data-feather="eye" width="15" height='15'></i>
                                                            </a>
                                                            @endrole
                                                            @role('bills.update')
                                                            <a href="{{route('bills.edit',$bill->id)}}"
                                                                data-id="{{$bill->id}}" id="edit_id" class="me-2">
                                                                <i data-feather="edit" width="15" height='15'></i>
                                                            </a>
                                                            @endrole



                                                            @role('bills.destroy')
                                                            <form
                                                                action="{{ route('bills.destroy', $bill->id) }}"
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
<script>
function addUrlParameter(name, value) {
    var searchParams = new URLSearchParams(window.location.search)
    searchParams.set(name, value)
    window.location.search = searchParams.toString()
}
</script>

@endsection
