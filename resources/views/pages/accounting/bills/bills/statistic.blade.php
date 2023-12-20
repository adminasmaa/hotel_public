@extends('layouts.admin')
@section('title', 'احصائيات الفواتير')
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
                                        <div class="row">
                                        <div class="col-9">
                                           <h5>الاحصائيات الشهريه</h5> 
                                        </div>
                                        <div class="col-sm-3">
                                            <form class="mega-vertical" action="{{route('bills.statistic')}}"
                                                method="get">
                                                <div style="margin: auto">
                                                    <select name='month' class="form-select"
                                                        onchange="this.form.submit()"
                                                        aria-label="Default select example">

                                                        @foreach($monthName as $key=>$name)
                                                        @if($key==0)
                                                        <option>اختر الشهر</option>
                                                        @else
                                                        <option value='{{$key}}'
                                                            {{request()->has('month')&&request()->get('month')==$key?'selected':''}}>
                                                            {{$name}}</option>
                                                        @endif
                                                        @endforeach
                                                    </select>
                                                    <div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        </div>
                                    </div>

                                    <div class="card-body">

                                        <div class="dt-ext table-responsive">
                                            <table class=" table display  data-table-responsive" id="">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>الشهر</th>
                                                        @foreach($types as $type)
                                                        <th>{{$type->name}}</th>
                                                        @endforeach


                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    @foreach($months as $month)

                                                    <tr>
                                                        <td>{{$loop->index + 1}}</td>
                                                        <td>{{$monthName[$month->month]}}</td>
                                                        @foreach($types as $type)
                                                        <td>{{App\Models\accounting\Bill\Bill::monthy($month->month,$type->id)->sum('value')}}
                                                        </td>
                                                        @endforeach

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