@extends('layouts.admin')
@section('title', 'الشيكات')
@section('content')

<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-sm-12">                        
                        <a href="{{route('checks.index',array('status' => 'cashed'))}}" class="btn btn-square btn-primary" style="margin:10px;">تم صرف الشيك</a>
                        <a href="{{route('checks.duplicate',$check->id)}}" class="btn btn-square btn-danger" style="margin:10px;"> تكرار الشيك</a>
                    </div>
                </div>
            </div>
        
           
            <div class="card-body">
                <div class="dt-ext table-responsive">
                    <table class="table display data-table-responsive" >
                        <thead>
                          
                            <tr>
                                <th>رقم الشيك </th>
                                <th>المبلغ</th>
                                <th>الشيك باسم </th>
                                <th>النوع</th>
                                <th>التاريخ</th>
                                <th>القسم</th>
                            </tr>    
                         
                        </thead>
                        <tbody>
                         <tr>
                           <td>{{$check->check_no}}</td> 
                            <td>{{$check->amount}}</td>
                            <td>{{$check->with_name}}</td> 
                            <td>{{$check->type?'مستحق':'مؤجلة'}}</td> 
                            <td>{{Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $check->due_date)->format('Y-m-d')}}</td> 
                            <td>{{$check->branch->name}}</td>  
                           
                         </tr>
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>

</div>


@endsection
