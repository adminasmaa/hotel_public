@extends('layouts.admin')
@section('title',  'عرض التفتيش')
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
                                                <div class="col-sm-12">
                                                    @role('answers.addAnswer')
                                                    <a href="{{route('answers.addAnswer')}}"
                                                       class="btn btn-square btn-primary" style="margin:10px;"> إضافة
                                                        تفتيش</a>
                                                    @endrole
                                                    {{--   <a href="{{route('checkalls.index')}}" class="btn btn-square btn-primary" style="margin:10px;"> اسئله التفتيش</a>--}}
                                                    @if(!Session::get('branch'))
                                                    @role('checkallTypes.index')
                                                    <a href="{{route('checkallTypes.index')}}"
                                                       class="btn btn-square btn-primary" style="margin:10px;"> نوع
                                                        تفتيش</a>
                                                    @endrole
                                                    @endif
                                                    @role('ShowAnswerStatistics')
                                                    <a href="{{route('ShowAnswerStatistics')}}" class="btn btn-square btn-primary">  إحصائيات التفتيش</a>
                                                    @endrole
                                                </div>
                                            </div>

                                        </div>

                                        <div class="card-body">

                                            <div class="dt-ext table-responsive">
                                                <table id="answerprinttable" class="display table  " >


                                                    <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>المستخدم</th>
                                                        <th>التاريخ</th>
                                                        @foreach($types as $type)
                                                            <th class="noprint">{{$type->name}}</th>
                                                        @endforeach
                                                    </tr>
                                                    </thead>
                                                    <tbody>

                                                    @foreach($answers as $answer)

                                                        <tr>
                                                            <td>{{$loop->index+1}}</td>

                                                            <td>{{$answer->employee->user_name}}</td>
                                                            <td>
                                                                {{Carbon\Carbon::parse($answer->created_at )->locale('ar')->translatedFormat('Y-m-d')}}
                                                                <br/> {{Carbon\Carbon::parse($answer->created_at )->locale('ar')->translatedFormat('l')}}
                                                            </td>
                                                            @foreach($types as $type)
                                                                <td>
                                                                    @if($answer->type($answer->employee_id,$answer->created_at,$type->id))
                                                                        @role('answers.show')
                                                                        <a class="btn btn-primary" action="get"
                                                                           href="{{ route('answers.show', $answer->ids($answer->employee_id,$answer->created_at,$type->id)) }}">عرض</a>
                                                                        @endrole
                                                                        @role('answers.destroy')
                                                                        <form
                                                                            action="{{ route('answers.destroy', $answer->ids($answer->employee_id,$answer->created_at,$type->id)) }}"
                                                                            method="POST" class="d-inline">
                                                                            @method('DELETE')
                                                                            @csrf
                                                                            <br/><br/>
                                                                            <button style="    padding-right: 30px;
                                                                          padding-left: 30px;display: inline-block;border: none;background: none;"
                                                                                    type="submit" data-toggle="tooltip"
                                                                                    data-placement="top"
                                                                                    title="{{ __('حذف') }}"
                                                                                    onclick="return confirm('هل انت متاكده من حذف هذا العنصر');"
                                                                                    class="btn btn-primary">حذف
                                                                            </button>
                                                                        </form>
                                                                        @endrole
                                                                    @else
                                                                        لا يوجد
                                                                    @endif
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

    <script>

           /* $('#answerprinttable').DataTable( {
                dom: 'Bfrtip',
                buttons: [
                    {
                        extend: 'print',
                        text: 'طباعة',
                        columns: ':not(.noprint[data-visible="false"])',


                        customize: function ( win ) {

                            $(win.document.body)
                                .css( 'font-size', '10pt' )
                                .prepend(
                                    '<img src="http://datatables.net/media/images/logo-fade.png" style="position:absolute; top:0; left:0;" />'
                                );

                            $(win.document.body).find( 'table' )
                                .addClass( 'compact' )
                                .css( 'font-size', 'inherit' );
                        }
                    }
                ]
            } );*/

    </script>

@endsection
