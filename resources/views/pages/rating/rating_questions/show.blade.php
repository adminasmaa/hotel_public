
@extends('layouts.admin')
@section('title', 'اسئلة التقييم ')
@section('content')

<div class="container-fluid">
          <div class="row">
            <div class="col-sm-12">
              <div class="card">
              <div class="card-header">
                <h4> التقييم</h4>
              
               </div>
                <div class="card-header">                 
                   <a href="{{route('rating_questions.create')}}" class="btn btn-square btn-primary"> إضافة سؤال</a>
                </div>
              
                <div class="card-body">
                  <div class="dt-ext table-responsive">
                    <table class="table display data-table-responsive" id="export-button">
                      <thead>               
                        <tr>
                        <th>#</th>
                          <th>السؤال</th>                         
                          <th>نوع التقييم</th>
                          <th>المهنة</th>
                          <th>عمليات</th>
                        </tr>
                      </thead>
                      <tbody>
                    
                      </tbody>

                    </table>
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>

@endsection
