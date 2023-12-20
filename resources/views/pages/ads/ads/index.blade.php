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
                                            @role('bills.store')
                                                <a href="{{ route('bills.create', ['name' => request()->get('name')]) }}"
                                                    class="btn btn-square btn-primary">
                                                    إضافة الفاتورة</a>
                                            @endrole


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

                                                            <th>اسم الحملة</th>
                                                            <th>اللينك </th>

                                                            <th>احصائيات الاعلان </th>

                                                        </tr>
                                                    </thead>
                                                    <tbody>

                                                        @foreach ($ads as $stat)
                                                            <tr>
                                                                <td>{{ $loop->index + 1 }}</td>
                                                                <td>{{ $stat->name }}</td>
                                                                <td><a href="{{ $stat->link }}">الدخول إلي الرابط</a></td>

                                                                <td><a href="<?= url('/ads/stat/' . $stat->id) ?>"
                                                                        target="_blank">
                                                                        مشاهدة
                                                                        احصائيات الحملة</a></td>

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
