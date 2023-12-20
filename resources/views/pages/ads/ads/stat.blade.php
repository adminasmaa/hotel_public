@extends('layouts.admin')
@section('title', 'الحملات الاعلانية')
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
                                        <div class="card-header" style="display:none;">


                                        </div>

                                        <div class="card-header">
                                            <div class="col-sm-12">


                                            </div>
                                        </div>

                                        <div class="card-body">

                                            <div class="dt-ext table-responsive">
                                                <table class=" table display  data-table-responsive" id="">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>عدد الزيارات</th>
                                                            <th>عدد ضغطات الاتصال</th>
                                                            <th>عدد ضغطات الواتساب</th>
                                                            <th>عدد ضغطات الانستجرام</th>

                                                        </tr>
                                                    </thead>
                                                    <tbody>




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
