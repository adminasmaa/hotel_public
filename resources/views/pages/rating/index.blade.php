
@extends('layouts.admin')
@if(request()->has('branch'))
    @php
        $branch_name=App\Models\hr\Branch::where('id',request()->get('branch'))->first()->name;
    @endphp
    @section('title', 'التقييم- '.$branch_name)

@else
    @section('title', 'التقييم')

@endif
@section('content')

<div class="container-fluid">
          <div class="row">
            <div class="col-sm-12">
              <div class="card">
                <div class="card-header">
                  <a href="{{route('rating_questions.index')}}" class="btn btn-square btn-primary" style="display:none;"> أسئلة  التقييم</a>
                  @role('rating.store')
                  <a href="{{route('rating.create')}}" class="btn btn-square btn-primary"> إضافة تقييم</a>
                  @endrole
                  @role('rating_types.index')
                  <a href="{{route('rating_types.index')}}" class="btn btn-square btn-primary">  أنواع التقييم</a>
                  @endrole
                  @role('ShowRatingStatistics')
                  <a href="{{route('ShowRatingStatistics')}}" class="btn btn-square btn-primary">  إحصائيات التقييم</a>
                  @endrole
                </div>

                <div class="card-body">
                  <div class="dt-ext table-responsive">
                    <table class="table display data-table-responsive" id="export-button">
                      <thead>
                        <tr>
                        <th>#</th>
                          <th>اليوزر</th>
                          <!-- <th>التاريخ</th> -->
                          <th>عدد التقييمات</th>
                          <!-- <th class="not-export-col">عمليات</th> -->
                        </tr>
                      </thead>
                      <tbody>
                      @foreach($ratings as $rating)
                        <tr>
                            <td>{{$loop->index + 1}}</td>
                            <td>{{optional($rating->admin)->ar_name}}</td>
                            <!-- <td> {{Carbon\Carbon::parse($rating->created_at )->locale('ar')->translatedFormat('Y-m-d')}}
                            <br/> {{Carbon\Carbon::parse($rating->created_at )->locale('ar')->translatedFormat('l')}}</td> -->
                            <!-- <td><a href="{{ url('/showRatings', [Carbon\Carbon::parse($rating->created_at )->format('Y-m-d')]) }}"  class="me-2">{{$rating->getCount($rating->created_at)}} </a></td> -->
                            <td><a href="{{ url('/showRatings',$rating->user_id) }}"  class="me-2">{{$rating->getCount($rating->user_id)}} </a></td>

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
