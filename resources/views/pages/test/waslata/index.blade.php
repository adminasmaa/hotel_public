@extends('layouts.admin')
@section('title', 'الوصلات')
@section('content')

<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-sm-12">

                        <a href="#" class="btn btn-square btn-primary" style="margin:10px;">
                            إضافة
                            وصله</a>
                          
                            




                    </div>
                </div>
            </div>
            <div class="card-header">
                <div class="col-sm-12">
                    <a href="#" class="btn btn-square  btn-sm txt-dark">الوصلات
                        (30)</a>
                    @foreach(App\Models\hr\Branch::all() as $branch)
                        <a href="#" class="btn btn-square btn-outline-primary btn-sm txt-dark">{{$branch->name}}
                        </a>
                    @endforeach
                </div>


            </div>


            <div class="card-body">
                <div class="dt-ext table-responsive">
                    <table class="table display data-table-responsive" id="export-button">
                        <thead>
                            <tr>
                                <th>الفرع</th>
                                <th>العنوان</th>
                                <th>المبلغ</th>
                                <th>التاريخ</th>
                                <th>طريقة الدفع	</th>
                                <th>البنك</th>
                                <th>الملف الاول</th>
                                <th>الملف الثانى</th>
                                <th class="not-export-col">الاجراءات</th>
                            </tr>
                        </thead>
                        <tbody>

                            <tr>

                                <td>السالميه</td>
                                <td>كويت</td>
                                <td>777</td>
                                <td>12-11-2023</td>
                                <td>شيك</td>
                                <td>الاهلى الكويتى</td>
                                <td><a href="#" class="btn btn-primary">عرض</a></td>
                                <td><a href="#" class="btn btn-primary">عرض</a</td>
                                <td>
                                
                                    <a href="#" class="me-2"><i data-feather="trash-2" width="15" height='15'></i></a>
                               

                                </td>
                            </tr>
                            <tr>
                                    <td>الريحانه</td>
                                    <td>كويت</td>
                                    <td>78877</td>
                                    <td>12-11-2023</td>
                                    <td>تحويل</td>
                                    <td>الاهلى الكويتى</td>
                                    <td><a href="#" class="btn btn-primary">عرض</a></td>
                                    <td><a href="#" class="btn btn-primary">عرض</a</td>
                                    <td>

                                        <a href="#" class="me-2"><i data-feather="trash-2" width="15" height='15'></i></a>


                                    </td>
                            </tr>
                
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>

</div>





@endsection