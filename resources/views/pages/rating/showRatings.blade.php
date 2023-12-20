@extends('layouts.admin')
@section('title', 'التقييم')
@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <a href="{{route('rating_questions.index')}}" class="btn btn-square btn-primary"
                           style="display:none;"> أسئلة التقييم</a>
                        @role('rating.store')
                        <a href="{{route('rating.create')}}" class="btn btn-square btn-primary"> إضافة تقييم</a>
                        @endrole
                        @role('rating_types.index')
                        <a href="{{route('rating_types.index')}}" class="btn btn-square btn-primary"> أنواع التقييم</a>
                        @endrole
                        @role('ShowRatingStatistics')
                        <a href="{{route('ShowRatingStatistics')}}" class="btn btn-square btn-primary"> إحصائيات
                            التقييم</a>
                        @endrole
                    </div>

                    <div class="card-body">
                        <div class="dt-ext table-responsive">
                            <table class="table display data-table-responsive" id="export-button">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>التاريخ</th>
                                    <th> متوسط التقييم</th>
                                    <th class="not-export-col">عمليات</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($ratings as $rating)
                                    <tr>
                                        <td>{{$loop->index + 1}}</td>
                                        <td> {{Carbon\Carbon::parse($rating->created_at )->locale('ar')->translatedFormat('Y-m-d')}}
                                            <br/> {{Carbon\Carbon::parse($rating->created_at )->locale('ar')->translatedFormat('l')}}
                                        </td>
                                        <td>  {{ round(collect($rating->rating_avg)->avg(),1) }}</td>
                                        <td>
                                            @role('rating.show')
                                            <a href="{{route('rating.show',$rating->id)}}" data-id="{{$rating->id}}"
                                               id="edit_id" class="me-2" target="_blank" width="15" height='15'>
                                                <i data-feather="eye" width="15" height='15'></i>
                                            </a>
                                            @endrole
                                            @role('rating.destroy')
                                            <form action="{{ route('rating.destroy', $rating->id) }}"
                                                  method="POST" class="d-inline">
                                                @method('DELETE')
                                                @csrf
                                                <button
                                                    style="display: inline-block;border: none;background: none;color: #7366ff;"
                                                    type="submit" data-toggle="tooltip" data-placement="top"
                                                    title="{{ __('delete') }}"
                                                    onclick="return confirm('هل انت متاكد من حذف هذا العنصر');"
                                                    class="me-2"><i data-feather="trash-2" width="15" height='15'></i>
                                                </button>
                                            </form>
                                            @endrole
                                        </td>
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
