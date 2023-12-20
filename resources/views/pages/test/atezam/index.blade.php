@extends('layouts.admin')
@section('title', 'الالتزامات')
@section('content')

<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-sm-12">

                        <a href="#" class="btn btn-square btn-primary" style="margin:10px;">
                            إضافة
                            الالتزام</a>
                            <a href="#" class="btn btn-square btn-primary" style="margin:10px;">
                            إضافة
                            التسليم</a>
                            




                    </div>
                </div>
            </div>
            <div class="card-header">
                <div class="col-sm-12">
                    <a href="#" class="btn btn-square  btn-sm txt-dark">الالتزام
                        (30)</a>
                    <a href="#" class="btn btn-square  btn-sm txt-dark">الخصم
                        (0)</a>
                    <a href="#" class="btn btn-square  btn-sm txt-dark">الالتزامات
                        (5995)</a>
                    <a href="#" class="btn btn-square btn-outline-primary btn-sm txt-dark">الاهل
                        (4465)</a>
                    <a href="#" class="btn btn-square btn-outline-primary btn-sm txt-dark">الاقارب
                        (1130)</a>
                    <a href="#" class="btn btn-square btn-outline-primary btn-sm txt-dark">اخرى
                        (400)</a>

                </div>


            </div>


            <div class="card-body">
                <div class="dt-ext table-responsive">
                    <table class="table display data-table-responsive" id="export-button">
                        <thead>
                            <tr>
                                <th>القسم</th>
                                <th>الاسم</th>
                                <th>الحالة</th>
                                <th>المبلغ</th>
                                <th>التليفون</th>
                                <th>الدوله</th>
                                <th>رقم الحساب</th>
                                <th>الصافي</th>
                                <th class="not-export-col">الاجراءات</th>
                            </tr>
                        </thead>
                        <tbody>

                            <tr>

                                <td>الاهل</td>
                                <td>ايمان</td>
                                <td><a href="#" class="btn btn-danger">غير مفعل</a></td>
                                <td>75</td>
                                <td>76546445</td>
                                <td>الكويت</td>
                                <td>مع الراتب المعتمدين </td>
                                <td>7878</td>
                                <td>
                                    <a href="#" class="me-2"><i data-feather="eye" width="15" height='15'></i></a>
                                    <a href="#" class="me-2"><i data-feather="edit" width="15" height='15'></i></a>
                                    <a href="#" class="me-2"><i data-feather="trash-2" width="15" height='15'></i></a>
                                    <a href="#" class="btn btn-danger">دفع</a>

                                </td>
                            </tr>
                            <tr>

                                <td>الاقارب</td>
                                <td>محمد</td>
                                <td><a href="#" class="btn btn-primary"> مفعل</a></td>
                                <td>666</td>
                                <td>7686676</td>
                                <td>مصر</td>
                                <td>987878776</td>
                                <td>90909</td>
                                <td>
                                    <a href="#" class="me-2"><i data-feather="eye" width="15" height='15'></i></a>
                                    <a href="#" class="me-2"><i data-feather="edit" width="15" height='15'></i></a>
                                    <a href="#" class="me-2"><i data-feather="trash-2" width="15" height='15'></i></a>
                                    <a href="#" class="btn btn-danger">دفع</a>
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