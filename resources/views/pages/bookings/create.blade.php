@extends('layouts.admin')
@section('title', ' اضافه الشقه')

@section('content')
    <div class="container-fluid" style="background: #f4f4f4;">
        <div class="row">
            <form class="mega-vertical" action="{{ route('bookings.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="col-sm-12 p-20">
                    <div class="card height-equal">
                        <div class="card-header">
                            <h5> حجز جديد</h5>
                            <div style="float:left">
                                <a class="btn btn-primary m-r-15" href="#">تحويل الشقه إلي صيانة</a>
                                <a class="btn btn-primary m-r-15" href="#">تحويل الشقه إلي انتظار</a>
                            </div>

                        </div>
                        <div class="card-body">

                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="media-body">
                                        <div class="mb-3 row">
                                            <label class="col-sm-12 col-form-label"> الشقة: {{ $apart_data->name }} </label>

                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <div class="media-body">
                                        <div class="mb-3 row">
                                            <label class="col-sm-12 col-form-label"> الدور :
                                                {{ $apart_data->floor }}</label>

                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <label class="col-sm-3 col-form-label">نوع الاثبات : </label>
                                    <div class="col-sm-9">
                                        <select class="form-select digits chooseWay" name="approve_id"
                                            id="exampleFormControlSelect9">
                                            <option value=''>اختر</option>
                                            @foreach ($approves as $approve)
                                                <option value="{{ $approve->id }}"
                                                    {{ old('approve_id') == $approve->id ? 'selected' : '' }}>
                                                    {{ $approve->name }}
                                                </option>
                                            @endforeach


                                        </select>
                                        @error('approve_id')
                                            <div style='color:red'>{{ $message }}</div>
                                        @enderror

                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="media-body">
                                        <div class="mb-3 row">
                                            <label class="col-sm-12 col-form-label"> الرقم </label>
                                            <div class="col-sm-9">
                                                <input type="number" name='num' value="{{ old('num') }}"
                                                    class="form-control" placeholder="">
                                                @error('num')
                                                    <div style='color:red'>{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-footer text-center">
                                    <button class="btn btn-primary m-r-15" type="submit">حفظ</button>
                                    <a href="{{ url('apartments') }}"> <button type="button"
                                            class="btn btn-light">إلغاء</button></a>

                                </div>
                            </div>
                        </div>
                    </div>

            </form>
        </div>
    </div>


@endsection
