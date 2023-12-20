
@extends('layouts.admin')
@section('title', 'اسئلة التقييم ')
@section('content')

<div class="container-fluid">
          <div class="row">
            <div class="col-sm-12">
              <div class="card">
              <div class="card-header">
                <h4> التقييم</h4>
                  @foreach($professions as $profession)
                    <a href="?profession={{$profession->id}}" class="btn btn-square btn-primary" style="margin-left:8px;">{{$profession->name}}</a>
                  @endforeach
               </div>
                <div class="card-header">
                @role('rating_questions.store')
                   <a href="{{route('rating_questions.create')}}" class="btn btn-square btn-primary" > إضافة سؤال</a>
                   @endrole
                </div>

                <div class="card-body">
                  <div class="dt-ext table-responsive">
                    <table class="table display data-table-responsive" id="export-button">
                      <thead>
                        <tr>
                        @if(request()->has('profession'))
                          <th>#</th>
                          <th>السؤال</th>
                          <th class="not-export-col">عمليات</th>
                          @else
                          <th>#</th>
                          <th>السؤال</th>
                         {{-- <th>نوع التقييم</th>
                          <th>المهنة</th>--}}
                          <th class="not-export-col">عمليات</th>
                          @endif
                        </tr>
                      </thead>
                      <tbody>
                      @foreach($rating_question as $quest)
                        <tr>
                        @if(request()->has('profession'))
                        <td>{{$loop->index + 1}}</td>
                        <td>{{$quest->text}}</td>
                        <td>

                          @role('rating_questions.update')
                            <a href="{{route('rating_questions.edit',$quest->id)}}" data-id="{{$quest->id}}"  id="edit_id" class="me-2"  width="15" height='15'>
                               <i data-feather="edit"  width="15" height='15'></i>
                            </a>
                            @endrole
                            @role('rating_questions.destroy')
                            <form action="{{route('rating_questions.destroy',$quest->id)}}"
                                method="POST" class="d-inline">
                                @method('DELETE')
                                @csrf
                                <button style="display: inline-block;border: none;background: none;color: #7366ff;"
                                type="submit" data-toggle="tooltip" data-placement="top" title="{{ __('delete') }}"
                                    onclick="return confirm('هل انت متاكد من حذف هذا العنصر');"
                                    class="me-2"><i data-feather="trash-2"  width="15" height='15'></i>
                                </button>
                            </form>
                            @endrole
                            </td>
                            @else
                           <td>{{$loop->index + 1}}</td>
                           <td>{{$quest->text}}</td>
                          {{-- <td>{{optional($quest->type)->name}}</td>
                           <td>{{optional($quest->group)->name}}</td> --}}
                            <td>
                            @role('rating_questions.update')
                            <a href="{{route('rating_questions.edit',$quest->id)}}" data-id="{{$quest->id}}"  id="edit_id" class="me-2"  width="15" height='15'>
                               <i data-feather="edit"  width="15" height='15'></i>
                            </a>
                            @endrole
                            @role('rating_questions.destroy')
                            <form action="{{route('rating_questions.destroy',$quest->id)}}"
                                method="POST" class="d-inline">
                                @method('DELETE')
                                @csrf
                                <button style="display: inline-block;border: none;background: none;color: #7366ff;"
                                type="submit" data-toggle="tooltip" data-placement="top" title="{{ __('delete') }}"
                                    onclick="return confirm('هل انت متاكد من حذف هذا العنصر');"
                                    class="me-2"><i data-feather="trash-2"  width="15" height='15'></i>
                                </button>
                            </form>
                            @endrole
                            </td>
                            @endif
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
