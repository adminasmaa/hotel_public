@extends('layouts.admin')
@section('title', 'التقييم')
@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">


                    <div class="card-body chat " id="ver-pills-tabContent">

                        <div class="dt-ext table-responsive">
                            <table class=" table display  data-table-responsive " id="">
                                <thead>
                                <tr>
                                    <th>تاريج الاستحاق</th>
                                    <th>القيمة</th>
                                    <th>حالة</th>
                                    <th>دفع</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach( $loan_details as $loan_detail)
                                    <tr>
                                        <td> {{Carbon\Carbon::parse($loan_detail->inst_dt )->locale('ar')->translatedFormat('Y-m-d')}}
                                            <br/> {{Carbon\Carbon::parse($loan_detail->inst_dt )->locale('ar')->translatedFormat('l')}}
                                        </td>

                                        <td>{{$loan_detail->inst_val}}</td>
                                        @if($loan_detail->inst_status==1)
                                        <td>
                                            <button class="btn btn-square btn-success active "
                                                    title="">  مدفوعة
                                            </button>
                                        </td>

                                        @elseif($loan_detail->inst_status==0 && $loan_detail->inst_dt >  date('Y-m-d') )
                                            <td>
                                                <button class="btn btn-square btn-warning active "
                                                        title=""> غير مدفوعة
                                                </button>

                                                </td>
                                        @else
                                              <td>
                                                <button class="btn btn-square btn-danger active "
                                                        title=""> متاخرة
                                                </button>
                                                </td>
                                        @endif

                                        <td>
                                            @if($loan_detail->inst_status!=1)
                                                @role('loans.show')
                                                <form
                                                    action="{{route('ShowDetails',$loan_detail->loan_id)}}"
                                                    method="get" class="d-inline">
                                                    @method('get')
                                                    @csrf
                                                    <input type="hidden" name="details_id" value="{{$loan_detail->id}}">
                                                    <button class="btn btn-square btn-primary active" type="submit"
                                                            title="دفع">دفع
                                                    </button>
                                                </form>
                                                @endrole
                                            @else
                                                <button class="btn btn-square btn-success active"
                                                        title="">تم الدفع
                                                </button>

                                            @endif
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
