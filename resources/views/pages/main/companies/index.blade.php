@extends('layouts.admin')
@section('title', 'الشركات')
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
                                        @role('companies.create')
                                        <div class="card-header d-flex">
                                            <a href="{{route('companies.create')}}" class="btn btn-square btn-primary">
                                                إضافة شركه</a>

                                        </div>
                                        @endrole
                                        <div class="card-body">

                                            <div class="dt-ext table-responsive">
                                                <table class=" table display  data-table-responsive " id="">
                                                    <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th> اسم الشركه</th>
                                                        <th>عدد المنتجات</th>

                                                        <th> طلبات الشراء الجديدة</th>
                                                        <th> اجمالى الدين</th>
                                                        <th> طلبات الشراء</th>
                                                        <th>كشف الحساب</th>
                                                        <th class="not-export-col">الاعدادت</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>

                                                    @foreach($companies as $company)
                                                        <tr>
                                                            <td>{{$loop->index + 1}}</td>
                                                            <td>{{$company->name}}</td>
                                                            <td>
                                                                <a href="{{route('products.index',array('company_id' => $company->id))}}"> {{$company->product->count()}}</a>

                                                               </td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td>
                                                                @role('companies.update')
                                                                <a href="{{route('companies.edit',$company->id)}}"
                                                                   data-id="{{$company->id}}" id="edit_id" class="me-2">
                                                                    <i data-feather="edit" width="15" height='15'></i>
                                                                </a>
                                                                @endrole
                                                                @role('companies.destroy')
                                                                <form
                                                                    action="{{ route('companies.destroy', $company->id) }}"
                                                                    method="POST" class="d-inline">
                                                                    @method('DELETE')
                                                                    @csrf
                                                                    <button
                                                                        style="display: inline-block;border: none;background: none;color: #e90f0f;"
                                                                        type="submit" data-toggle="tooltip"
                                                                        data-placement="top" title="{{ __('delete') }}"
                                                                        onclick="return confirm('سيتم حذف كل الاصناف والمنتجات والماركات المتعلق بهذا العنصر هل انت متاكد من ذلك؟' );"
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
