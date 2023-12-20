@extends('layouts.admin')
@section('title', 'الشيكات')
@section('css')
  <style>
    .border>div{
        border: 1px solid #f3f0f0;
        padding: 10px 5px;
    }
  </style>
@endsection
@section('content')

<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-sm-12">
                        
                    </div>
                </div>
            </div>
        
            <div class="card-body">
              <h3 class="mb-3">عرض الموظف</h3>
            <div class="row mb-5">
                        <div class="col-sm-6 ">
                            <div class="row border">
                               <div class="col-sm-6"> الاسم بالعربى</div>
                               <div class="col-sm-6"> محمد</div>
                            </div>
                            <div class="row border">
                               <div class="col-sm-6"> الجنسية </div>
                               <div class="col-sm-6"> مصريه</div>
                            </div>
                            <div class="row border">
                               <div class="col-sm-6"> الموهل</div>
                               <div class="col-sm-6"> حقوق</div>
                            </div>
                            <div class="row border">
                               <div class="col-sm-6"> المهنه </div>
                               <div class="col-sm-6"> محامى</div>
                            </div>
                            <div class="row border">
                               <div class="col-sm-6"> الراتب </div>
                               <div class="col-sm-6"> 67676</div>
                            </div>
                           
                          
                        </div>
                        <div class="col-sm-6 ">
                           <div class="row border">
                               <div class="col-sm-6"> الاسم  بالانجليزيه</div>
                               <div class="col-sm-6"> mohamed</div>
                            </div>
                            <div class="row border">
                               <div class="col-sm-6"> التليفون</div>
                               <div class="col-sm-6"> 1208947564523</div>
                            </div>
                            <div class="row border">
                               <div class="col-sm-6"> المسمى الوظيفى</div>
                               <div class="col-sm-6"> محامى</div>
                            </div>
                            <div class="row border">
                               <div class="col-sm-6"> الجنس</div>
                               <div class="col-sm-6"> ذكر</div>
                            </div>
                            <div class="row border">
                               <div class="col-sm-6"> توقيت العمل</div>
                               <div class="col-sm-6"> 5-8</div>
                            </div>
                          
                        </div>
                </div>
                <div class="dt-ext table-responsive">
                    <table class="table display data-table-responsive" id="export-button">
                        <thead>
                            <tr>
                                <th>رقم  </th>
                                <th>المبلغ</th>
                                <th>السبب</th>
                                <th>الاجراءات</th>
                            </tr>
                        </thead>
                        <tbody>
                          
                            <tr>
                                <td>0531</td>
                                <td>3000</td>
                                <td>سلفة من الراتب</td>
                                <td><a href="#" class="me-2"><i data-feather="trash-2" width="15" height='15'></i></a></td>

                               
                            </tr>
                            <tr>
                                <td>05645531</td>
                                <td>30600</td>
                                <td>سلفة من الراتب</td>
                                <td><a href="#" class="me-2"><i data-feather="trash-2" width="15" height='15'></i></a></td>

                               
                            </tr>
                          


                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>

</div>





@endsection
