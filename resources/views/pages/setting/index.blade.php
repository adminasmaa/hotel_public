@extends('layouts.admin')
@section('title', 'الأعدادت')
@section('content')

    <div class="row">
        <div class="col-sm-12">
            <div class="card">

                <div class="card-header">
                    <div class="col-sm-12">
                        @if(str_contains(url()->previous(), 'employees'))
                            @role('nationalities.index')
                            <a href="{{route('nationalities.index')}}" class="btn btn-square btn-primary"
                               style="margin:10px;">الجنسيات
                            </a>
                            @endrole
                            @role('qualifications.index')

                            <a href="{{route('qualifications.index')}}" class="btn btn-square btn-primary"
                               style="margin:10px;">المؤهلات
                            </a>
                            @endrole
                            @role('professions.index')
                            <a href="{{route('professions.index')}}" class="btn btn-square btn-primary"
                               style="margin:10px;">المهن
                            </a>
                            @endrole
                            @role('jobTitles.index')
                            <a href="{{route('jobTitles.index')}}" class="btn btn-square btn-primary"
                               style="margin:10px;">المسمي الوظيفي
                            </a>
                            @endrole
                            @role('employeestatuses.index')
                            <a href="{{route('employeestatuses.index')}}" class="btn btn-square btn-primary"
                               style="margin:10px;">حالة الموظف
                            </a>
                            @endrole
                            @role('banks.index')
                            <a href="{{route('banks.index')}}" class="btn btn-square btn-primary" style="margin:10px;">البنوك
                            </a>
                            @endrole
                            {{--  <a href="{{route('branches.index')}}" class="btn btn-square btn-primary"
                                 style="margin:10px;">الفروع
                              </a>--}}
                        @endif
                        @if(str_contains(url()->previous(), 'clients'))
                                @role('cnationalities.index')
                            <a href="{{route('cnationalities.index')}}" class="btn btn-square btn-primary"
                               style="margin:10px;">انواع الجنسيات
                            </a>
                                @endrole

                                @role('clientStatuses.index')
                            <a href="{{route('clientStatuses.index')}}" class="btn btn-square btn-primary"
                               style="margin:10px;">انواع الحالات
                            </a>
                                @endrole
                            {{-- <a href="{{route('approves.index')}}" class="btn btn-square btn-primary"
                                style="margin:10px;">انواع الاثباتات
                             </a>--}}

                        @endif
                        @if(Request::url()==route('products.setting'))
                            @role('countries.index')
                            <a href="{{route('countries.index')}}" class="btn btn-square btn-primary"
                               onclick="show_data()" style="margin:10px;">بلد المنشأ
                            </a>
                            @endrole
                            @role('guarantees.index')
                            <a href="{{route('guarantees.index')}}" class="btn btn-square btn-primary"
                               onclick="show_data()" style="margin:10px;">مدة الكفالة
                            </a>
                            @endrole

                        @endif
                        @if(Request::url()==route('apartments.setting'))
                            @role('bedTypes.index')
                            <a href="{{route('bedTypes.index',array('branch' => request()->get('branch')))}}"
                               class="btn btn-square btn-primary"
                               onclick="show_data()" style="margin:10px;">انواع السراير
                            </a>
                            @endrole
                            @role('viewTypes.index')
                            <a href="{{route('viewTypes.index',array('branch' => request()->get('branch')))}}"
                               class="btn btn-square btn-primary"
                               onclick="show_data()" style="margin:10px;">انواع الاطلالات
                            </a>
                            @endrole
                            @role('homeContents.index')
                            <a href="{{route('homeContents.index',array('branch' => request()->get('branch')))}}"
                               class="btn btn-square btn-primary">
                                مرافق الشقق</a>
                            @endrole
                            @role('apartTypes.index')
                            <a href="{{route('apartTypes.index',array('branch' => request()->get('branch')))}}"
                               class="btn btn-square btn-primary"
                               onclick="show_data()" style="margin:10px;">انواع الشقق
                            </a>
                            @endrole

                        @endif
                        @if(Request::url()==route('maintenances.setting'))
                            @role('maintenanceRequires.index')
                            <a href="{{route('maintenanceRequires.index')}}" class="btn btn-square btn-primary"
                               onclick="show_data()" style="margin:10px;">انواع الصيانه المطلوبه
                            </a>
                            @endrole
                        @endif
                            @if(Request::url()==route('filesmanger.setting'))
                                @role('filesDepts.index')
                                <a href="{{route('filesDepts.index')}}" class="btn btn-square btn-primary"
                                   onclick="show_data()" style="margin:10px;"> اقسام الملفات
                                </a>
                                @endrole
                                @role('filesTypes.index')
                                <a href="{{route('filesTypes.index')}}" class="btn btn-square btn-primary"
                                   onclick="show_data()" style="margin:10px;">انواع  الملفات
                                </a>
                                @endrole
                            @endif
                        @if(Request::url()==route('commitments.setting'))
                            @role('commitmentSections.index')
                            <a href="{{route('commitmentSections.index')}}" class="btn btn-square btn-primary"
                               onclick="show_data()" style="margin:10px;">الفروع
                            </a>
                            @endrole
                        @endif
                            @if(Request::url()==route('loans.setting'))
                                @role('loanbranches.index')
                                <a href="{{route('loanbranches.index')}}" class="btn btn-square btn-primary"
                                   onclick="show_data()" style="margin:10px;"> فروع الديون
                                </a>
                                @endrole
                            @endif
                        @if(Request::url()==route('bills.setting'))
                            @role('billsTypes.index')
                            <a href="{{route('billsTypes.index')}}" class="btn btn-square btn-primary"
                               onclick="show_data()" style="margin:10px;">انواع الفواتير
                            </a>
                            @endrole
                        @endif
                    </div>
                </div>


            </div>
        </div>

    </div>

@endsection
