@extends('layouts.admin')
@section('title', 'الشقه')
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
                                        <div class="card-header">
                                            @role('apartments.store')
                                            <a href="{{route('apartments.create')}}" class="btn btn-square btn-primary">
                                                إضافة شقه</a>
                                            @endrole

                                            @role('apartments.setting')
                                            <a href="{{route('apartments.setting',array('branch' => request()->get('branch')))}}"
                                               class="btn btn-square btn-primary"
                                               style="margin:10px;">
                                                الاعدادات
                                            </a>
                                            @endrole
                                            <!-- @role('contents.index')
                                            <form action="{{route('contents.index')}}" method="get">
                                                <button type="submit"
                                                     class="btn btn-square btn-primary mt-3">محتويات
                                                الشقه</button>
                                             </form>
                                     @endrole -->
                                        </div>

                                        <div class="card-body">

                                            <div class="dt-ext table-responsive">
                                                <table class=" table display  data-table-responsive" id="">
                                                    <thead>
                                                    @if(isset($apartments))
                                                        <tr>
                                                            <th>#</th>
                                                            <th>الاسم</th>
                                                            <th>الدور</th>
                                                            <th class="not-export-col">محتويات الشقه</th>
                                                            <th>عدد الصور</th>
                                                            <th>السعر</th>
                                                            <th class="not-export-col">الاعدادت</th>
                                                        </tr>
                                                    @else
                                                        <tr>
                                                            <th>#</th>
                                                            <th>نوع الشقه</th>
                                                            <th>عدد الشقق</th>
                                                        </tr>
                                                    @endif
                                                    </thead>
                                                    <tbody>
                                                    @if(isset($apartments))
                                                        @foreach($apartments as $apartment)
                                                            <tr>
                                                                <td>{{$loop->index + 1}}</td>
                                                                <td>{{$apartment->name}}</td>
                                                                <td>{{$apartment->floor}}</td>


                                                                <td class="not-export-col">
                                                                    @role('contents.index')
                                                                    <form action="{{route('contents.index')}}"
                                                                          method="get">
                                                                        <input type="hidden" name="apart"
                                                                               value="{{$apartment->id}}"/>
                                                                        <button type="submit"
                                                                                class="btn btn-square btn-primary">
                                                                            محتويات
                                                                            الشقه
                                                                        </button>
                                                                    </form>
                                                                    @endrole
                                                                </td>
                                                                <td>
                                                                    @role('contents.image')
                                                                    <a href="{{route('contents.image',$apartment->id)}}"
                                                                       class="btn btn-primary">{{$apartment->homeContents->count()}}</a>
                                                                    @endrole
                                                                </td>

                                                                <td>
                                                                    @if($apartment->type=='day')
                                                                        @role('prices.index')
                                                                        <a href="{{route('prices.index',array('apart'=>$apartment->id))}}"
                                                                           class="btn btn-primary">السعر</a>
                                                                        @endrole
                                                                    @endif
                                                                </td>


                                                                <td>
                                                                    @role('apartments.update')
                                                                    <a href="{{route('apartments.edit',$apartment->id)}}"
                                                                       data-id="{{$apartment->id}}" id="edit_id"
                                                                       class="me-2">
                                                                        <i data-feather="edit" width="15"
                                                                           height='15'></i>
                                                                    </a>
                                                                    @endrole

                                                                    <!-- <a href=""  data-placement="top" title="{{ __('صيانه') }}"
                                                               data-id="{{$apartment->id}}" id="maintenance_id" class="me-2">
                                                                <i data-feather="scissors" width="15"   height='15'></i>
                                                            </a> -->

                                                                    @role('apartments.destroy')
                                                                    <form
                                                                        action="{{ route('apartments.destroy', $apartment->id) }}"
                                                                        method="POST" class="d-inline">
                                                                        @method('DELETE')
                                                                        @csrf
                                                                        <button
                                                                            style="display: inline-block;border: none;background: none;color: #e90f0f;"
                                                                            type="submit" data-toggle="tooltip"
                                                                            data-placement="top"
                                                                            title="{{ __('delete') }}"
                                                                            onclick="return confirm('هل انت متاكد من حذف هذا العنصر');"
                                                                            class="me-2"><i data-feather="trash-2"
                                                                                            width="15"
                                                                                            height='15'></i>
                                                                        </button>
                                                                    </form>
                                                                    @endrole
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    @else
                                                        @foreach($apartTypes as $apartType)
                                                            <tr>
                                                                <td>{{$loop->index + 1}}</td>
                                                                <td>{{$apartType->name}}</td>
                                                                <td>
                                                                    <a href="{{route('apartments.index',['type'=>$apartType->id])}}"
                                                                       class="btn btn-square btn-primary">
                                                                        {{$apartType->apart->count()}}</a></td>

                                                            </tr>
                                                        @endforeach
                                                    @endif

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

@endsection
