@extends('layouts.admin')
@section('title', ' تعديل شيك')

@section('content')
<div class="container-fluid" style="background: #f4f4f4;">
    <div class="row">
        <form class="mega-vertical" action="{{route('checks.update',$check->id)}}" method="post"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="col-sm-12 p-20">
                <div class="card height-equal">
                    <div class="card-header">
                        <h5> تعديل شيك </h5>
                    </div>
                    <div class="card-body">

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="media-body">
                                    <div class="mb-3 row">
                                        <label class="col-sm-12 col-form-label"> المبلغ </label>
                                        <div class="col-sm-9">
                                            <input type="nubmer" name='amount' value="{{$check->amount}}"
                                                class="form-control" placeholder="">
                                            @error('amount')
                                            <div style='color:red'>{{$message}}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="media-body">
                                    <div class="mb-3 row">
                                        <label class="col-sm-12 col-form-label"> النوع </label>
                                        <div class="col-sm-9">
                                            <input type="radio" name='type' value="1"
                                                {{$check->type =='1'?'checked':''}}>المستحق


                                            <br />
                                            <br />
                                            <input type="radio" name='type' value="0"
                                                {{$check->type=='0'?'checked':''}}>مؤجله

                                            @error('type')
                                            <div style='color:red'>{{$message}}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="media-body">
                                    <div class="mb-3 row">
                                        <label class="col-sm-12 col-form-label"> الشيك باسم </label>
                                        <div class="col-sm-9">
                                            <input type="text" name='with_name' value="{{$check->with_name}}"
                                                class="form-control">
                                            @error('with_name')
                                            <div style='color:red'>{{$message}}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="media-body">
                                    <div class="mb-3 row">
                                        <label class="col-sm-12 col-form-label"> رقم الشيك </label>
                                        <div class="col-sm-9">
                                            <input type="nubmer" name='check_no' value="{{$check->check_no}}"
                                                class="form-control" placeholder="">
                                            @error('check_no')
                                            <div style='color:red'>{{$message}}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @if(!Session::has('branch'))
                            <div class="col-sm-12">
                                <div class="media-body">
                                    <div class="mb-3 row">
                                        <label class="col-sm-12 col-form-label">الفرع</label>
                                        <div class="col-sm-9">
                                            <select class="form-select digits" name="branch_id">
                                                <option value='branch_id'>اختر المهنة</option>
                                                @foreach(App\Models\hr\Branch::all() as $branch)
                                                <option value='{{$branch->id}}'
                                                    {{$check->branch_id==$branch->id?'selected':''}}>{{$branch->name}}
                                                </option>
                                                @endforeach
                                            </select>
                                            @error('branch_id')
                                            <div style='color:red'>{{$message}}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @else
                            <input class="form-control" name="branch_id" id="branch_id"
                                         value="{{Session::has('branch')?Session::get('branch'):'' }}"
                                         type="hidden" autocomplete="off">
                            @endif
                            <div class="col-sm-12">
                                <div class="media-body">
                                    <div class="mb-3 row">
                                        <label class="col-sm-12 col-form-label"> اسم المستلم الشيك </label>
                                        <div class="col-sm-9">
                                            <input type="text" name='recip_name' value="{{$check->recip_name}}"
                                                class="form-control" placeholder="">
                                            @error('recip_name')
                                            <div style='color:red'>{{$message}}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="media-body">
                                    <div class="mb-3 row">
                                        <label class="col-sm-12 col-form-label"> وذلك عن </label>
                                        <div class="col-sm-9">
                                            <input type="text" name='about_name' value="{{$check->about_name}}"
                                                class="form-control" placeholder="">
                                            <!-- @error('about_name')
                                                <div style='color:red'>{{$message}}</div>
                                                @enderror -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="media-body">
                                    <div class="mb-3 row">
                                        <label class="col-sm-12 col-form-label">الهاتف </label>
                                        <div class="col-sm-9">
                                            <input type="nubmer" name='phone' value="{{$check->phone}}"
                                                class="form-control" placeholder="">
                                            @error('phone')
                                            <div style='color:red'>{{$message}}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="media-body">
                                    <div class="mb-3 row">
                                        <label class="col-sm-12 col-form-label">تاريخ الاستحقاق </label>
                                        <div class="col-sm-9">
                                            <input class="form-control" type="date" name="due_date"
                                                min="{{date('Y-m-d ')}}"
                                                value="{{date('Y-m-d',strtotime($check->due_date))}}">
                                            @error('due_date')
                                            <div style='color:red'>{{$message}}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>

                </div>
            </div>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-footer text-center">
                        <button class="btn btn-primary m-r-15" type="submit">تعديل</button>
                        <a href="{{route('checks.index')}}"> <button type="button"
                                class="btn btn-light">إلغاء</button></a>

                    </div>
                </div>
            </div>
        </form>
    </div>
</div>


@endsection
@section('scripts')
@endsection