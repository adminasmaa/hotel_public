@extends('layouts.admin')
@section('title', 'تقسيم الشقه')
@section('content')

<div class="row">

    <div class="col-xl-12 col-md-12 box-col-12" id="class-content">
        <div class="email-right-aside bookmark-tabcontent">
            <div class="card email-body radius-left">
                <div class="ps-0">
                    <div class="tab-content">
                        <div class="tab-pane fade active show" id="prices" role="tabpanel"
                            aria-labelledby="prices-tab">
                            <div class="card mb-0">
                           
                            <div class="card-header d-flex">   
                                        <form action="{{route('prices.store')}}" method="post" class="row">  
                                            @csrf
                                        <div class="form-group">
                                <label><input type="checkbox" name="days[]" value="Sat"> السبت</label>
                                <label><input type="checkbox" name="days[]" value="Sun"> الاحد</label>
                                <label><input type="checkbox" name="days[]" value="Mon"> الاتنين</label>
                                <label><input type="checkbox" name="days[]" value="Tue"> الثلاثاء</label>
                                <label><input type="checkbox" name="days[]" value="Wed"> الاربعاء</label>
                                <label><input type="checkbox" name="days[]" value="Thu"> الخميس</label>
                                <label><input type="checkbox" name="days[]" value="Fri"> الجمعه</label>
                            </div> 
                                            <div class="col-md-3"> 
                                                من
                                             <input name="from" class="form-control digits" type="date" data-date=""  data-date-format="yyyy-mm-dd" > 
                                             @error('from')
                                                                                <div style='color:red'>{{$message}}
                                                                                </div>
                                                                                @enderror
                                            </div>     
                                            <div class="col-md-3">
                                                الى
                                             <input  name="to" class="form-control digits" type="date" data-date=""  data-date-format="yyyy-mm-dd"> 
                                             @error('to')
                                                                                <div style='color:red'>{{$message}}
                                                                                </div>
                                                                                @enderror
                                            </div> 
                                            <div class="col-md-3">
                                                السعر
                                          
                                             <input  name="price" class="form-control"  type="text" disabled value="{{json_decode($apart->day_p)[0]->day}}"> 
                                            </div> 
                                            <div class="col-md-3">
                                                الخصم
                                             <input  name="discount" class="form-control" type="text"> 
                                             @error('discount')
                                                                                <div style='color:red'>{{$message}}
                                                                                </div>
                                                                                @enderror
                                            </div> 
                                            
                                            <input class="form-control" name="apart_id" id="apart_id"
                                                                    type="hidden" value="{{$apart->id}}">                                           
                                            <div class="col-md-3">
                                           <button type="submit" class="mt-4 btn btn-primary">تحديث</button>
                                            </div>                                      
                                        </form >
                            </div>
                               
                                <div class="card-body ">

                                    <div class="dt-ext table-responsive">
                                        <table class=" table display  data-table-responsive " id="">
                                            <thead>
                                                <tr>
                                                    <th>م</th>
                                                    <th> الخصم </th>
                                                    <th> التاريخ </th>
                                                    <th> اليوم </th>
                                                    <th class="not-export-col">الاعدادت</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                             
                                                @foreach($prices as $price)          
                                                <tr>
                                                    <td>{{$loop->index + 1}}</td>
                                                    <!-- <td>{{$price->price}}</td> -->
                                                    <td>{{$price->discount}}</td>
                                                    <td>{{'('.$price->from.') - ('.$price->to.')'}}</td>
                                                    <td>
                                                     @if(count(json_decode($price->days))>0)
                                                                @foreach(json_decode($price->days) as $key=>$day)
                                                                {{Carbon\Carbon::parse($day )->locale('ar')->translatedFormat('l')}} {{$key!=count(json_decode($price->days))-1?'-':''}}
                                                                @endforeach
                                                      @else
                                                             كل الايام
                                                      @endif
                                                    </td>
                                                    <td>
                                                    <!-- @role('prices.update')
                                                        <a class="me-2" data-bs-toggle="modal"
                                                            href="{{('/#editModal'.$price->id)}}"><i
                                                                data-toggle="modal"
                                                                data-target="#editModal{{$price->id}}"
                                                                data-feather="edit" width="15" height='15'></i></a>
                                                            @endrole -->
                                                     @role('prices.destroy')

                                                        <form
                                                            action="{{ route('prices.destroy', $price->id) }}"
                                                            method="post" class="d-inline">

                                                            @method('DELETE')
                                                            @csrf
                                                            <button data-toggle="tooltip"
                                                                style="display: inline-block;border: none;background: none;color: #e90f0f;"
                                                                data-placement="top"
                                                                onclick="return confirm('هل انت متاكد من هذا العنصر?');"><i
                                                                    data-feather="trash-2" width="15" height='15'></i>
                                                            </button>

                                                        </form>

                                                        @endrole
                                                    </td>


                                                    <div class="modal fade modal-bookmark"
                                                        id="editModal{{$price->id}}" tabindex="-1" role="dialog"
                                                        aria-labelledby="editModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog modal-lg" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="editModalLabel">

                                                                        تعديل </h5>
                                                                    <button class="btn-close" type="button"
                                                                        data-bs-dismiss="modal"
                                                                        aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form class="form-bookmark needs-validation"
                                                                        action="{{route('prices.update',$price->id)}}"
                                                                        method="post" id="bookmark-form" novalidate="">
                                                                        @csrf
                                                                        @method('PUT')
                                                                        <div class="row">
                                                                            <div class="mb-3 mt-0 col-md-12">
                                                                            <input class="form-control" name="apart_id" id="apart_id"
                                                                    type="hidden" value="{{request()->get('apart')}}">
                                                                                <label for="task-title">
                                                                                    تعديل السعر
                                                                                </label>

                                                                                <input class="form-control" name="price"
                                                                                    id="price" type="text"
                                                                                    value="{{$price->price}}"
                                                                                    required="" autocomplete="off">
                                                                                @error('price')
                                                                                <div style='color:red'>{{$message}}
                                                                                </div>
                                                                                @enderror
                                                                            </div>
                                                                        </div>
                                                                        
                                                                        <button class="btn btn-secondary" id="Bookmark"
                                                                            type="submit">تعديل
                                                                        </button>
                                                                        <button class="btn btn-primary" type="button"
                                                                            data-bs-dismiss="modal">
                                                                            إلغاء
                                                                        </button>
                                                                    </form>
                                                                </div>


                                                            </div>
                                                        </div>
                                                    </div>

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





@endsection
@section('scripts')

<script type="text/javascript">
$(window).on('load', function() {
    @if($errors -> has('method') && $errors -> first('method') == 'POST')
    $('#pricesModal').modal('show');
    @endif
});


        $(window).on('load', function () {
            let var_id = '{{$errors->first('id')}}';
            @if($errors -> has('method') && $errors -> first('method') == 'PUT' && $errors -> has('id'))
            $('#editModal' + var_id).modal('show');
            @endif
        });
</script>
@endsection
