@extends('layouts.admin')
@section('title', 'الديون  ')
@section('content')

    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row">

            <div class="col-xl-12 col-md-12 box-col-12">
                <div class="file-content">
                    <div class="card">
                        <div class="card-header">
                            @role('loans.store')
                            <a href="{{route('loans.create')}}" class="btn btn-square btn-primary"
                               style="align:left;">
                                إضافة جديد</a>
                            @endrole
                            @if(!Session::has('branch'))
                                @role('loans.setting')
                                <a href="{{route('loans.setting')}}" class="btn btn-square btn-primary">
                                    الاعدادات</a>
                                @endrole

                        </div>
                        <div class="card-header">
                            <div class="col-sm-12">
                                <a href="?" class="btn btn-square btn-outline-light btn-sm txt-dark">الكل
                                    ({{App\Models\accounting\loans\Loans::count()}})</a>
                                @foreach($branches as $branch)
                                    <a href="?loan_branch_id={{$branch->id}}"
                                       class="btn btn-square btn-outline-light btn-sm txt-dark">{{$branch->name}}
                                        ({{App\Models\accounting\loans\Loans::where('loan_branch_id',$branch->id)->count()}}
                                        )</a>
                                @endforeach
                            </div>
                        </div>
                        @else
                            <div class="card-header">
                                <div class="col-sm-12">
                                    <a href="?" class="btn btn-square btn-outline-light btn-sm txt-dark">الكل
                                        ({{App\Models\accounting\loans\Loans::count()}})</a>
                                    @foreach($branches as $branch)
                                        <a href="#"
                                           class="btn btn-square btn-outline-light btn-sm txt-dark">{{$branch->name}}
                                            ({{App\Models\accounting\loans\Loans::where('loan_branch_id',$branch->id)->count()}}
                                            )</a>
                                    @endforeach
                                </div>
                            </div>


                        @endif


                        <div class="card-body">

                            <div class="dt-ext table-responsive">
                                <table class="table display data-table-responsive" id="export-button">

                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>الاسم</th>
                                        <th>المبلغ المطلوب</th>
                                        <th>المدفوع</th>
                                        <th> المتبقى</th>
                                        <th> المتاخر</th>
                                        <th>عدد الاقساط</th>
                                        <th class="not-export-col">الحالة</th>
                                        <th class="not-export-col">الاجراءت</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @foreach($loans as $loan)
                                        <tr>
                                            <td>{{$loop->index + 1}}</td>
                                            <td>{{$loan->name}}</td>
                                            <td>{{$loan->loan_amount}}</td>
                                            @if($loan->pay_val)
                                                <td>{{$loan->pay_amount+($loan->pay_val->inst_val*$loan->pay)}}</td>
                                            @else
                                                <td>{{$loan->pay_amount}}</td>

                                            @endif
                                            <td>{{$loan->installment_amount*$loan->count}}</td>
                                            <td>{{$loan->late*$loan->installment_amount}}</td>
                                            <td>{{ Round($loan->getNOInstallmentAmountAttribute())}}</td>
                                            <td>

                                                <div class="form-check form-switch">

                                                    <input style="margin-right: auto; height:15px" value="{{$loan->id}}"
                                                           {{$loan->status_loan == 'true' ? 'checked' : ''  }}  name="loan_status"
                                                           class="form-check-input flexSwitchCheckDefault"
                                                           id="flexSwitchCheckDefault{{$loan->id}}" type="checkbox"
                                                           role="switch">
                                                </div>

                                            </td>
                                            <td>
                                                @role('loans.show')
                                                <a href="{{route('ShowDetails',$loan->id)}}"
                                                   data-id="{{$loan->id}}"
                                                   id="edit_id" class="me-2" width="15" height='15'>
                                                    <i data-feather="eye" width="15" height='15'></i>
                                                </a>
                                                @endrole
                                                @role('loans.update')
                                                <a href="{{route('loans.edit',$loan->id)}}"
                                                   data-id="{{$loan->id}}" id="edit_id" class="">
                                                    <i data-feather="edit" width="15" height='15'></i>
                                                </a>
                                                @endrole
                                                @role('products.destroy')
                                                <form action="{{ route('loans.destroy', $loan->id) }}"
                                                      method="POST" class="d-inline">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button
                                                        style="display: inline-block;border: none;background: none;color: #e90f0f;"
                                                        type="submit" data-toggle="tooltip" data-placement="top"
                                                        title="{{ __('حذف') }}"
                                                        onclick="return confirm('هل انت متاكد من الحذف');"
                                                        class="me-2"><i data-feather="trash-2" width="15"
                                                                        height='15'></i>
                                                    </button>
                                                </form>

                                                @endrole
                                            </td>
                                        </tr>
                                    @endforeach


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

@endsection
@section('scripts')



    <script type="text/javascript">
        $('.flexSwitchCheckDefault').on('change', function () {

            let url = "{{ route('change_status', ":id") }}";
            let status_change = $(this).is(":checked");

            url = url.replace(':id', $(this).val());
            $.ajax({
                url: url,
                method: 'get',
                dataType: 'json',
                data: {
                    '_token': '{{ csrf_token() }}',
                    'status' : status_change,
                    'loan_id' :$(this).val() ,
                },

                success: function(response) {
                  console.log(response);
                    location.reload();

                },


                error: function(response) {

                },

            });
        });







    </script>

@endsection
