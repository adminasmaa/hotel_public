
@extends('layouts.admin')
@section('title', 'التقييم')
@section('content')

<div class="container-fluid">
          <div class="row">
            <div class="col-sm-12">
              <div class="card">              
                <div class="card-body">
                  <div class="dt-ext table-responsive">
                    <table class="table display data-table-responsive" id="export-button">
                      <thead>
                        <tr>
                          <th>اسم المستخدم</th>
                          <th>التاريخ</th>                         
                          <th>الوقت</th>
                        </tr>
                      </thead>
                      <tbody>
                      @foreach($ratings as $rating)
                        <tr>
                           <td>{{$loop->index + 1}}</td>
                            <td>{{optional($rating->emp)->ar_name}}</td>
                            <td>{{$rating->created_at}}</td>
                            <td>{{$rating->rating_avg}}</td>
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
@endsection
