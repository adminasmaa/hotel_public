@extends('layouts.admin')
@section('title', 'التقييم')
@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div class="col-sm-12 d-flex">
                            <div class="col-sm-9 " id="ver-pills-tab">
                                <a onclick="addUrlParameter('week','all' )" role="tab" data-bs-toggle="tab"
                                   class="btn btn-square btn-outline-light btn-sm txt-dark  tab-info active check-active"
                                   aria-selected="true">الكل
                                    ({{$all->count()}})</a>

                                <a onclick="addUrlParameter('week','start' )" role="tab" data-bs-toggle="tab"
                                   class="btn btn-square btn-outline-light btn-sm txt-dark tab-info check-active "
                                   aria-selected="false">الاسبوع الاول
                                    ({{$start->count()}})</a>
                                <a onclick="addUrlParameter('week','second' )" role="tab" data-bs-toggle="tab"
                                   class="btn btn-square btn-outline-light btn-sm txt-dark tab-info  check-active"
                                   aria-selected="false">الاسبوع الثانى
                                    ({{$second->count()}})</a>
                                <a onclick="addUrlParameter('week','third' )" role="tab" data-bs-toggle="tab"
                                   class="btn btn-square btn-outline-light btn-sm txt-dark tab-info check-active "
                                   aria-selected="false">الاسبوع الثالث
                                    ({{$third->count()}})</a>
                                <a onclick="addUrlParameter('week','end' )" role="tab" data-bs-toggle="tab"
                                   class="btn btn-square btn-outline-light btn-sm txt-dark tab-info check-active "
                                   aria-selected="false">الاسبوع الاخير
                                    ({{$end->count()}})</a>
                            </div>

                            <div class="col-sm-3">
                                <form class="mega-vertical" action="{{route('ShowAnswerStatistics')}}" method="get">
                                    <div style="margin: auto">
                                        <select name='monthe' class="form-select" onchange="this.form.submit()"
                                                aria-label="Default select example">
                                            <option
                                                value="{{request()->has('monthe')? request()->get('monthe'):  $month_name  }}">
                                                {{request()->has('monthe')? request()->get('monthe'): $month_name }}
                                            </option>
                                            <option value='يناير-01'>يناير</option>
                                            <option value='فبراير-02'>فبراير</option>
                                            <option value='مارس-03'>مارس</option>
                                            <option value='ابريل-04'>ابريل</option>
                                            <option value='مايو-05'>مايو</option>
                                            <option value='يونيو-06'>يونيو</option>
                                            <option value='يوليو-07'>يوليو</option>
                                            <option value='اغسطس-08'>اغسطس</option>
                                            <option value='سبتمبر-09'>سبتمبر</option>
                                            <option value='اكتوبر-10'>اكتوبر</option>
                                            <option value='نوفمبر-11'>نوفمبر</option>
                                            <option value='ديسمبر-12'>ديسمبر</option>
                                        </select>
                                        <div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="card-body chat " id="ver-pills-tabContent">
                        @if(request()->has('employee_id') && request()->has('type_id'))
                            <div class="dt-ext table-responsive">
                                <table class=" table display  data-table-responsive " id="">
                                    <thead>
                                    <tr>
                                        <th>التاريخ</th>


                                        <th class="not-export-col">مشاهدة</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach( $checkallanswers as $answerselect)

                                        <tr>
                                            <td> {{Carbon\Carbon::parse($answerselect->created_at )->locale('ar')->translatedFormat('Y-m-d')}}
                                                <br/> {{Carbon\Carbon::parse($answerselect->created_at )->locale('ar')->translatedFormat('l')}}
                                            </td>
                                            <td>
                                                @role('answers.show')
                                                <a href="{{ route('answers.show',$answerselect->ids($answerselect->employee_id,$answerselect->created_at,$answerselect->type->id))}}"
                                                   data-id="{{$answerselect->id}}"
                                                   id="edit_id" class="me-2" target="_blank" width="15" height='15'>
                                                    <i data-feather="eye" width="15" height='15'></i>
                                                </a>
                                                @endrole


                                            </td>


                                        </tr>

                                    @endforeach

                                    </tbody>
                                    <tfoot>

                                    </tfoot>
                                </table>
                            </div>

                        @elseif(request()->has('employee_id') )
                            <div class="dt-ext table-responsive">
                                <table class="table display data-table-responsive" id="export-button">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th> نوع التفتيش</th>
                                        <th>العدد</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach( $checkallanswers as $answer)

                                        <tr>

                                            <td>{{$loop->index + 1}}</td>
                                            <td>{{$answer->type->name}}</td>
                                            <td>
                                                <a href="{{route('ShowAnswerStatisticsEmp',array('employee_id' => $answer->employee_id, 'type_id'=>$answer->type->id ))}}">{{$answer->type_count}}</a>

                                            </td>

                                        </tr>
                                    @endforeach

                                    </tbody>

                                </table>
                            </div>
                        @else
                            <div class="dt-ext table-responsive">
                                <table class="table display data-table-responsive" id="export-button">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>اسم الموظف</th>
                                        <th>عدد التفتيشات</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($checkallanswers as $answer)

                                        <tr>
                                            <td>{{$loop->index + 1}}</td>
                                            <td>{{$answer->employee->ar_name}}</td>
                                            <td>
                                                <a href="{{route('ShowAnswerStatistics',array('employee_id' => $answer->employee_id))}}">{{$answer->count}}</a>
                                            </td>


                                        </tr>
                                    @endforeach

                                    </tbody>

                                </table>
                            </div>
                        @endif
                    </div>
                    <div class=" tab-content ">
                        <div class="card-body chat-body " id="test" style="display:none;"
                             aria-labelledby="ver-pills-Not_yet-tab">
                            <div class="dt-ext table-responsive">
                                <table class="table display data-table-responsive" id="export-button">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>اسم الموظف</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($emps as $e)
                                        <tr>
                                            <td>{{$loop->index + 1}}</td>
                                            <td>{{$e->user_name}}</td>

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
    </div>

@endsection
@section('scripts')
    <script>

        function addUrlParameter(name, value) {
            var searchParams = new URLSearchParams(window.location.search)
            searchParams.set(name, value)
            window.location.search = searchParams.toString()
        }

        function myFunction() {

            var x = document.getElementById("test");
            if (x.style.display === "none") {
                x.style.display = "block";
                $(".chat").css("display", "none");
            }
        }

    </script>
@endsection
