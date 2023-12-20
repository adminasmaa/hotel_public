@extends('layouts.admin')
@section('title', 'المنتجات')
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
                                        <div class="card-header d-flex">
                                            @role('products.create')
                                            <a href="{{route('products.create')}}" class="btn btn-square btn-primary">
                                                إضافة
                                                منتج</a>
                                            @endrole
                                            @if(!request()->has('branch'))
                                            @role('products.setting')
                                            <a href="{{route('products.setting')}}" class="btn btn-square btn-primary">
                                                الاعدادات</a>
                                            @endrole
                                            @endif
                                        </div>

                                        <div class="card-header">
                                            <div class="col-sm-12">
                                                @role('countries.index')
                                                <a href="{{route('countries.index')}}"
                                                   class="btn btn-square btn-outline-light btn-sm txt-dark">بلد المنشأ
                                                    ( {{$countries->count()}} )</a>
                                                @endrole
                                                @role('guarantees.index')
                                                <a href="{{route('guarantees.index')}}"
                                                   class="btn btn-square btn-outline-light btn-sm txt-dark">مدة الكفالة
                                                    ( {{$guarantees->count()}} )</a>

                                                @endrole
                                            </div>
                                        </div>


                                        <div class="card-header">
                                            <form class="vertical" action="{{route('products.index')}}" method="get">
                                                <div class="row">
                                                    <div class="col-sm-2 ">
                                                        <label class=" col-form-label"> الموديل </label>
                                                    </div>
                                                    <div class="col-sm-2 ">


                                                        <input type="text" name='modal'
                                                               value="{{request()->has('modal')?request()->get('modal'):''}}"
                                                               class="form-control" placeholder="">
                                                    </div>
                                                    <div class="col-sm-2 ">
                                                        <label class=" col-form-label"> الباركود </label>
                                                    </div>
                                                    <div class="col-sm-2">

                                                        <input type="text" name='bar_code'
                                                               value="{{request()->has('bar_code')?request()->get('bar_code'):''}}"
                                                               class="form-control" placeholder="">

                                                    </div>
                                                    <div class="col-sm-2 ">
                                                        <label class="col-form-label"> الشركه الموردة </label>
                                                    </div>
                                                    <div class="col-sm-2 ">

                                                        <select name='company_id' class="form-select"
                                                                aria-label="Default select example">
                                                            <option value=''>----</option>
                                                            @foreach($companies as $company)
                                                                <option value='{{$company->id}}'
                                                                    {{request()->has('company_id')&&request()->get('company_id')==$company->id?'selected':''}}>
                                                                    {{$company->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row" style="margin-top: 20px;">

                                                    <div class="col-sm-2 ">
                                                        <label class="col-form-label"> الصنف</label>
                                                    </div>
                                                    <div class="col-sm-2 ">
                                                        <select name='class_id' class="form-select"
                                                                aria-label="Default select example">
                                                            <option value=''>----</option>
                                                            @foreach($classes as $class)
                                                                <option value='{{$class->id}}'
                                                                    {{request()->has('class_id')&&request()->get('class_id')==$class->id?'selected':''}}>
                                                                    {{$class->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="col-sm-2 ">
                                                        <label class="col-form-label">نوع الصنف </label>
                                                    </div>
                                                    <div class="col-sm-2 ">
                                                        <select name='type_id' class="form-select"
                                                                aria-label="Default select example">
                                                            <option value=''>----</option>
                                                            @foreach($types as $type)
                                                                <option value='{{$type->id}}'
                                                                    {{request()->has('type_id')&&request()->get('type_id')==$type->id?'selected':''}}>
                                                                    {{$type->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="col-sm-2 ">
                                                        <label class="col-form-label">الماركه</label>
                                                    </div>
                                                    <div class="col-sm-2 ">
                                                        <select name='marks_id' class="form-select"
                                                                aria-label="Default select example">
                                                            <option value=''>----</option>
                                                            @foreach($marks as $mark)
                                                                <option value='{{$mark->id}}'
                                                                    {{request()->has('marks_id')&&request()->get('marks_id')==$mark->id?'selected':''}}>
                                                                    {{$mark->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>


                                                <div class="row">


                                                    <br/>

                                                    <div class="col-sm-2  mt-7 justify-content-center" style="    margin-top: 20px;
                                                text-align: center;">
                                                        <button class='btn btn-primary' type="submit">بحث</button>
                                                    </div>
                                                </div>


                                            </form>
                                        </div>

                                        <div class="card-body">

                                            <div class="dt-ext table-responsive">
                                                <table class="table display data-table-responsive" id="export-button">

                                                    <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>الاسم</th>
                                                        <th>الموديل</th>
                                                        <th> الباركود</th>
                                                        <th> الشركه الموردة</th>
                                                        <th>الماركه</th>
                                                        <th>الصنف</th>
                                                        <th class="not-export-col">الاعدادت</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>

                                                    @foreach($products as $product)
                                                        <tr>

                                                            <td>{{$loop->index + 1}}</td>
                                                            <td>{{$product->name}}</td>
                                                            <td>{{$product->modal}}</td>
                                                            <td>{{$product->bar_code}}</td>
                                                            <td>{{$product->company->name}}</td>
                                                            <td>{{optional($product->mark)->name}}</td>
                                                            <td>{{$product->class->name}}</td>
                                                            <td>
                                                                @role('products.update')
                                                                <a href="{{route('products.edit',$product->id)}}"
                                                                   data-id="{{$product->id}}" id="edit_id" class="">
                                                                    <i data-feather="edit" width="15" height='15'></i>
                                                                </a>
                                                                @endrole
                                                                @role('products.destroy')
                                                                <form
                                                                    action="{{ route('products.destroy', $product->id) }}"
                                                                    method="POST" class="d-inline">
                                                                    @method('DELETE')
                                                                    @csrf
                                                                    <button
                                                                        style="display: inline-block;border: none;background: none;color: #e90f0f;"
                                                                        type="submit" data-toggle="tooltip"
                                                                        data-placement="top" title="{{ __('delete') }}"
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
