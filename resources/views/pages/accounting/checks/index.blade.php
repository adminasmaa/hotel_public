@extends('layouts.admin')
@section('title', 'الشيكات')
@section('content')

    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-sm-12">
                            @role('checks.store')
                            <a href="{{route('checks.create')}}" class="btn btn-square btn-primary"
                               style="margin:10px;"> إضافة شيك</a>
                            @endrole
                        </div>
                    </div>
                </div>
                <div class="card-header">
                    <div class="col-sm-12">
                        <p class="btn btn-square  btn-sm txt-dark">المطلوب
                            ({{$wanted}})</p>
                        <a href="?month=current" class="btn btn-square btn-outline-primary btn-sm txt-dark">مستحق الشهر
                            ({{$current}})</a>
                        <a href="?type=1" class="btn btn-square btn-outline-primary btn-sm txt-dark">المستحق
                            ({{$wanted}})</a>
                        <a href="?check_status=cashed" class="btn btn-square btn-outline-primary btn-sm txt-dark">تم
                            الصرف
                            ({{$cash}})</a>
                        <a href="?type=0" class="btn btn-square btn-outline-primary btn-sm txt-dark">المؤجل
                            ({{$delay}})</a>
                        <a href="?all" class="btn btn-square btn-outline-primary btn-sm txt-dark">الكل
                            ({{$sum_all}})</a>
                    </div>


                </div>

                <div class="card-body">
                    <div class="dt-ext table-responsive">
                        <table class="table display data-table-responsive">
                            <thead>
                            <tr>
                                <th> #</th>
                                <th>رقم الشيك</th>
                                <th>المبلغ</th>
                                <th>الشيك باسم</th>
                                @if(!request()->has('check_status'))
                                <th>النوع</th>
                                @endif
                                <th>التاريخ</th>
                                <th>المتبقي</th>
                                @if(request()->has('all'))
                                <th>الحالة</th>
                                @endif
                                <th class="not-export-col">عمليات</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($checks as $check)
                                <tr>
                                    <td>{{$loop->index + 1}}</td>
                                    <td>{{$check->check_no}}</td>
                                    <td>{{$check->amount}}</td>
                                    <td>{{$check->with_name}}</td>
                                    @if(!request()->has('check_status'))
                                    <td>{{$check->type?'مستحق':'مؤجلة'}}</td>
                                    @endif
                                    <td>{{Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $check->due_date)->format('Y-m-d')}}
                                    <td>{{now()->diffInDays($check->due_date).' يوم -  '.now()->format('H') .'ساعة'}}</td>
                                    @if(request()->has('all'))
                                      @if($check->status == 'cashed')
                                          <td> <span class="label label-success"> {{'تم الصرف'}} </span></td>
                                        @else
                                          <td> {{'-'}}</td>
                                        @endif
                                    @endif
                                    <td>
                                        @role('checks.show')
                                        <a href="{{route('checks.show',$check->id)}}" data-id="{{$check->id}}"
                                           class="me-2" target="_blank" width="15" height='15'>
                                            <i data-feather="eye" width="15" height='15'></i></a>
                                        @endrole
                                        @role('checks.update')
                                        <a href="{{route('checks.edit',$check->id)}}" data-id="{{$check->id}}"
                                           id="edit_id" class="me-2" width="15" height='15'>
                                            <i data-feather="edit" width="15" height='15'></i>
                                        </a>
                                        @endrole
                                        @role('checks.destroy')
                                        <form action="{{ route('checks.destroy', $check->id) }}"
                                              method="POST" class="d-inline">
                                            @method('DELETE')
                                            @csrf
                                            <button
                                                style="display: inline-block;border: none;background: none;color: #e90f0f;"


                                                type="submit" data-toggle="tooltip" data-placement="top"
                                                title="{{ __('delete') }}"
                                                onclick="return confirm('   هل انت متاكد من حذف هذا العنصر');"
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
@endsection
@section('scripts')
    <script>

        function addUrlParameter(name, value) {
            var searchParams = new URLSearchParams(window.location.search)
            searchParams.set(name, value)
            window.location.search = searchParams.toString()
        }

    </script>
@endsection
