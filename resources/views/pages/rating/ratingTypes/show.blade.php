
@extends('layouts.admin')
@section('title', ' أنواع التقييم')
@section('content')

<div class="container-fluid">
          <div class="row">
            <div class="col-sm-12">
              <div class="card">
               
                <div class="card-header">
                @role('rating_types.store')                 
                <a href="{{route('rating_types.create',array('profession' => $type))}}" class="btn btn-square btn-primary"> إضافة نوع</a>
                  @endrole
                </div>
                <div class="card-body">
                  <div class="dt-ext table-responsive">
                    <table class="table display data-table-responsive" id="export-button">
                      <thead>
                        <tr>
                        <th>#</th>   
                          <th>  اسم النوع</th> 
                          <th> عدد الاسئلة</th>                   
                          <th class="not-export-col">عمليات</th>
                        </tr>
                      </thead>
                      <tbody>
                      @foreach($rating_types as $type)
                        <tr>
                           <td>{{$loop->index + 1}}</td> 
                            <td>{{$type->name}}</td> 
                            <td><a href="{{route('rating_questions.index',array('profession' => $type->profession_id ,'type'=>$type->id ))}}"  class="me-2">{{$type->getCount($type->id)}} </a></td>                            
                            <td>
                            @role('rating_questions.store')
                              <a href="{{route('rating_questions.create',array('profession' => $type->profession_id,'type'=>$type->id))}}" data-id="{{$type->id}}"  id="create_id" class="me-2"  width="15" height='15' title="اضافة سؤال">
                                <i data-feather="plus-circle"  width="15" height='15'></i></a>
                            @endrole 
                            @role('rating_types.update')
                            <a href="{{route('rating_types.edit',$type->id)}}" data-id="{{$type->id}}"  id="edit_id" class="me-2"  width="15" height='15'>
                               <i data-feather="edit"  width="15" height='15'></i>
                            </a>
                            @endrole
                            @role('rating_types.destroy')
                            <form action="{{ route('rating_types.destroy', $type->id) }}"
                                method="POST" class="d-inline">
                                @method('DELETE')
                                @csrf
                                <button style="display: inline-block;border: none;background: none;color: #7366ff;"
                                type="submit" data-toggle="tooltip" data-placement="top" title="{{ __('delete') }}"
                                    onclick="return confirm('سيتم حذف جميع  الاسئلة المرتبطه بهذا النوع هل انت متاكد من حذف هذا العنصر');"
                                    class="me-2"><i data-feather="trash-2"  width="15" height='15'></i>
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
