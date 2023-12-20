@extends('layouts.admin')
@section('title', 'التفتيش')
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
                        <div class="card-body">
                            <div class="taskadd">
                                <div class="dt-ext table-responsive">
                                    <table class=" table display  data-table-responsive " id="">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>السؤال</th>
                                            <th>نعم او لا</th>
                                            <th>الصورة</th>
                                            <th>الملاحظة</th>

                                        </tr>
                                        </thead>
                                        <tbody>

                                        @foreach($answers as $answer)
                                            @if(App\Models\Checkall\Checkall::find($answer->checkall_id))
                                                <tr>
                                                    <td>{{$loop->index+1}}</td>
                                                    <td>{{App\Models\Checkall\Checkall::find($answer->checkall_id)->question}}</td>
                                                    <td>{{$answer->answer?'نعم':'لا'}}</td>
                                                    <td><a href="{{asset('storage/'.$answer->image)}}">مشاهدة
                                                            الصورة</a></td>
                                                    <td>{{$answer->note}}</td>

                                                </tr>
                                            @endif
                                        @endforeach


                                        </tbody>
                                        <tfoot>

                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
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
                                   {{-- @foreach($emps as $e)
                                        <tr>
                                            <td>{{$loop->index + 1}}</td>
                                            <td>{{$e->user_name}}</td>

                                        </tr>
                                    @endforeach--}}

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
