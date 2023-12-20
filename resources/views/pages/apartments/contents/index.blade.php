@extends('layouts.admin')
@section('title', 'محتويات الشقه')
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
                                    <div class="col-sm-12">
                                        @php
                                        $types=[
                                            'main' => 'اساسى',
                                            'normal' => 'عادى',
                                            'maintenance' =>'صيانه'
                                            ];
                                        @endphp
                                        @foreach($types as $key=>$item)
                                            <a onclick="addUrlParameter('type','{{$key}}' )"
                                            class="btn btn-square btn-outline-light btn-sm txt-dark">{{$item}}
                                             </a>
                                        @endforeach
                                    </div>
                                </div>
                                    <div class="card-body">
                                        <ul class="nav nav-pills" id="pills-tab" role="tablist" @if(request()->has('homecontent')) style="display:none" @endif>
                                            @foreach($homeContents??[] as $key=>$homeContent)
                                            <li class="nav-item"><a class="nav-link {{$key==0 ? 'active':''}}"
                                                    id="pills-home-tab{{$homeContent->id}}" data-bs-toggle="pill"
                                                    href="#pills-home{{$homeContent->id}}" role="tab"
                                                    aria-controls="pills-home"
                                                    aria-selected="true">{{$homeContent->name}}
                                                    <div class="media"></div>
                                                </a></li>
                                            @endforeach
                                        </ul>
                                        <div class="tab-content" id="pills-tabContent">
                                              @php
                                               $show=request()->has('homecontent')?request()->get('homecontent')-1:0;
                                             @endphp
                                            @foreach($homeContents??[] as $key=>$homeContent)
                                            
                                            <div class="tab-pane fade {{$key==$show ? 'show active':''}}"
                                                id="pills-home{{$homeContent->id}}" role="tabpanel"
                                                aria-labelledby="pills-home-tab{{$homeContent->id}}">

                                                <div class="card-header d-flex mb-3 p-0 mt-5">
                                                    @role('contents.store')
                                                    @if(!request()->has('apart'))
                                                    <form action="{{route('contents.create')}}" method="get">
                                                        <!-- <input type="hidden" name="apart"
                                                            value="{{request()->get('apart')}}" /> -->
                                                        <input type="hidden" name="content"
                                                            value="{{$homeContent->id}}" />

                                                        <button type="submit"
                                                            class="btn btn-square btn-primary mb-3">إضافة محتوى</button>

                                                    </form>
                                                    @endif
                                                    @endrole
                                                </div>
                                                <!-- <div class="taskadd"> -->

                                                    <div class="dt-ext table-responsive">
                                                        <table class=" table display  data-table-responsive" id="">
                                                            <thead>
                                                                <tr>
                                                                    <th>#</th>
                                                                    <th>الاسم بالعربى</th>
                                                                    <th>الاسم بالانجليزيه</th>
                                                                    <th>السعر</th>
                                                                    @if(!request()->has('type'))
                                                                    <th>النوع</th>
                                                                    @endif
                                                                    <th class="not-export-col">الاعدادت</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>

                                                                @foreach($contents->where('home_content_id',$homeContent->id)
                                                                as $content)
                                                                <tr>
                                                                    <td>{{$loop->index + 1}}</td>
                                                                    <td>{{$content->name['ar']}}</td>
                                                                    <td>{{$content->name['en']}}</td>
                                                                    <td>{{$content->price}}</td>
                                                                    @if(!request()->has('type'))
                                                                      <td>{{$content->type}}</td>
                                                                    @endif
                                                                    <td>
                                                                        @role('contents.update')
                                                                        @if(!request()->has('apart'))
                                                                        <a href="{{route('contents.edit',$content->id)}}"
                                                                            data-id="{{$content->id}}" id="edit_id"
                                                                            class="me-2">
                                                                            <i data-feather="edit"  width="15" height='15'> تعديل</i>
                                                                        </a>
                                                                        @endif
                                                                        @endrole
                                                                        @role('contents.destroy')
                                                                        @if(!request()->has('apart'))
                                                                        <form
                                                                            action="{{ route('contents.destroy', $content->id) }}"
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
                                                                                    width="15" height='15'></i>
                                                                            </button>
                                                                        </form>
                                                                        @else
                                                                        <form
                                                                            action="{{ route('contents.remove',['apartment'=>request()->apart,'content'=>$content->id]) }}"
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
                                                                                    width="15" height='15'></i>
                                                                            </button>
                                                                        </form>

                                                                        @endif
                                                                        @endrole






                                                                    </td>
                                                                </tr>
                                                                @endforeach


                                                            </tbody>
                                                            <tfoot>

                                                            </tfoot>
                                                        </table>
                                                    </div>
                                                <!-- </div> -->
                                            </div>
                                            @endforeach

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
<script>
function addUrlParameter(name, value) {
    var searchParams = new URLSearchParams(window.location.search)
    searchParams.set(name, value)
    window.location.search = searchParams.toString()
}

function removeUrlParameter(name) {
    var searchParams = new URLSearchParams(window.location.search)
    searchParams.delete(name)
    window.location.search = searchParams.toString()
}
</script>
@endsection