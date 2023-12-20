@extends('layouts.admin')
@section('title', 'اضافة دين')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="card">
                <div class="modal fade modal-bookmark" id="loanbranchtModal" tabindex="-1"
                     role="dialog" aria-labelledby="loanbranchtModallLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="loanbranchtModalLabel"> فرع دين
                                    جديد </h5>
                                <button class="btn-close" type="button" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form class="form-bookmark needs-validation"
                                      action="{{route('loanbranches.store')}}" method="post"
                                      id="bookmark-form" novalidate="">
                                    @csrf
                                    <div class="row">
                                        <div class="mb-3 mt-0 col-md-12">
                                            <label for="task-title">

                                                اسم الفرع <span
                                                    class=" text-danger">*</span></label>
                                            <input class="form-control" name="name" id="name"
                                                   type="text" required="" autocomplete="off">
                                            @error('name')
                                            <div style='color:red'>{{$message}}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <input id="index_var" type="hidden" value="6">
                                    <button class="btn btn-secondary" id="Bookmark"
                                            type="submit">حفظ
                                    </button>
                                    <button class="btn btn-primary" type="button"
                                            data-bs-dismiss="modal">إلغاء
                                    </button>

                                </form>
                            </div>


                        </div>
                    </div>
                </div>

                <form class="mega-vertical" action="{{route('loans.store')}}" method="post"
                      enctype="multipart/form-data">
                    @method('Post')
                    @csrf
                    <div class="col-sm-12 box-col-12 p-20">
                        <div class="card height-equal">
                            <div class="card-header">
                                <h5>إضافة صنف جديد </h5>
                            </div>
                            <div class="card-body">
                                <div class="row">

                                    <div class="mb-3 mt-0 col-md-4">
                                        <label for="task-title">الاسم <span class=" text-danger">*</span>


                                        </label>
                                        <input class="form-control" name="name" value="{{old('name')}}" id="name"
                                               type="text"
                                               autocomplete="off">
                                        @error('name')
                                        <div style='color:red'>{{$message}}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3 mt-0 col-md-4">

                                        <label for="task-title"> رقم الهاتف <span class=" text-danger">*</span></label>

                                        <input class="form-control" type="text" name='phone'
                                               value="{{old('phone')}}"
                                               placeholder="">
                                        @error('phone')
                                        <div style='color:red'>{{$message}}</div>
                                        @enderror

                                    </div>
                                    @if(!Session::has('branch'))
                                        <div class="mb-3 mt-0 col-md-4">
                                            <label for="task-title">
                                                فرع الدين
                                                <span class=" text-danger">*</span></label>

                                            <div class="row">
                                                <div class="col-sm-11">
                                                    <select name='branch_id' class="form-select"
                                                            id="branch_id"
                                                            aria-label="Default select example">
                                                        <option value=''>اختر الفرع</option>
                                                        @foreach($branches_main as $branche_main)
                                                            <option
                                                                value='{{$branche_main->id}}'{{old('branch_id') == $branche_main->id ?'selected':''}}>{{$branche_main->name}}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('branch_id')
                                                    <div style='color:red'>{{$message}}</div>
                                                    @enderror
                                                </div>
                                                @role('branches.create')
                                                <div style="padding-right:0px" class="col-sm-1"><a

                                                        data-dismiss="modal"
                                                        title="{{ __(' اضافة جديد') }}"
                                                        href="{{route('branches.create')}}"><i
                                                            class="fa fa-plus-square"></i></a>
                                                </div>
                                                @endrole


                                            </div>
                                        </div>
                                    @else
                                        <input name="branch_id" type="hidden"
                                               value="{{App\Models\hr\Branch::withoutGlobalScope('branch')->find(Session::get('branch'))->id}}">
                                    @endif
                                    <div class="mb-3 mt-0 col-md-4">
                                        <label for="task-title">
                                            فرع الدين
                                            <span class=" text-danger">*</span></label>

                                        <div class="row">
                                            <div class="col-sm-11">
                                                <select name='loan_branch_id' class="form-select"
                                                        id="loan_branch_id"
                                                        aria-label="Default select example">
                                                    <option value=''>اختر الفرع</option>
                                                    @foreach($branches as $branche)
                                                        <option
                                                            value='{{$branche->id}}'{{old('loan_branch_id') == $branche->id ?'selected':''}}>{{$branche->name}}</option>
                                                    @endforeach
                                                </select>
                                                @error('loan_branch_id')
                                                <div style='color:red'>{{$message}}</div>
                                                @enderror
                                            </div>

                                            @role('loanbranches.store')
                                            <div style="padding-right:0px" class="col-sm-1"><a
                                                    id="add_new_loan_branch"
                                                    data-bs-target="#loanbranchtModal"
                                                    data-dismiss="modal"
                                                    title="{{ __(' اضافة جديد') }}"
                                                    href="#"><i
                                                        class="fa fa-plus-square"></i></a>


                                            </div>
                                            @endrole


                                        </div>
                                    </div>

                                    <div class="mb-3 mt-0 col-md-4">

                                        <label for="task-title"> المبلغ <span class=" text-danger">*</span></label>

                                        <input class="form-control" type="text" name='loan_amount'
                                               value="{{old('loan_amount')}}"
                                               placeholder="">
                                        @error('loan_amount')
                                        <div style='color:red'>{{$message}}</div>
                                        @enderror

                                    </div>

                                    <div class="mb-3 mt-0 col-md-4">
                                        <label for="task-title">المقدم <span class=" text-danger">*</span>


                                        </label>
                                        <input class="form-control" name="pay_amount" value="{{old('pay_amount')}}"
                                               id="pay_amount"
                                               type="text"
                                               autocomplete="off">
                                        @error('pay_amount')
                                        <div style='color:red'>{{$message}}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3 mt-0 col-md-4">

                                        <label for="task-title"> القسط <span class=" text-danger">*</span></label>

                                        <input class="form-control" type="text" name='installment_amount'
                                               value="{{old('installment_amount')}}"
                                               placeholder="">
                                        @error('installment_amount')
                                        <div style='color:red'>{{$message}}</div>
                                        @enderror

                                    </div>


                                    <div class="mb-3 mt-0 col-md-4">
                                        <label for="task-title"> تاريج المعاملة<span class=" text-danger">*</span>
                                        </label>

                                        <input class="form-control" name="loan_date" id="loan_date"
                                               type="date" value="{{old('loan_date')}}"
                                               autocomplete="off">
                                        @error('loan_date')
                                        <div style='color:red'>{{$message}}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3 mt-0 col-md-4">
                                        <label for="task-title"> تاريج اول قسط <span
                                                class=" text-danger">*</span></label>

                                        <input class="form-control" name="installment_data" id="installment_data"
                                               type="date" value="{{old('installment_data')}}"
                                               autocomplete="off">
                                        @error('installment_data')
                                        <div style='color:red'>{{$message}}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3 mt-0 col-md-4">
                                        <label for="task-title">طريقة الدفع <span class=" text-danger">*</span>


                                        </label>
                                        <input class="form-control" name="pay_type" value="{{old('pay_type')}}"
                                               id="pay_type"
                                               type="text"
                                               autocomplete="off">
                                        @error('pay_type')
                                        <div style='color:red'>{{$message}}</div>
                                        @enderror
                                    </div>


                                    <div class="card-footer text-center">
                                        <button class="btn btn-primary m-r-15" type="submit">حفظ</button>
                                        <a href="{{url('loans')}}">
                                            <button type="button" class="btn btn-light">إلغاء</button>
                                        </a>

                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>
                </form>


            </div>
        </div>
    </div>

@endsection
@section('scripts')
    <script type="text/javascript">

        $("#add_new_loan_branch").on("click", function () {
            $("#loanbranchtModal").modal("show");
        });
        $(window).on('load', function () {
            @if($errors -> has('method') && $errors -> first('method') == 'POST')
            $('#fileTypeModal').modal('show');
            @endif
        });


        س


    </script>

@endsection
