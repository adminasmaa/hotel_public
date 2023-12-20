@extends('layouts.admin')
@section('title', 'العملاء')
@section('content')
<div class="container-fluid">
          <div class="row">

            <section>
              <div class="container py-5">


                <div class="row">
                  <div class="col-lg-12">
                    <div class="card mb-4">
                      <div class="card-body text-center">
                     
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0"> اسم العميل</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">{{$booking->client->name}}</p>
                                </div>
                            </div>
                             <hr>
                             <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">رقم الهاتف</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">{{$booking->client_date[0]['phone']}}</p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
    
                                    <p class="mb-0"> {{$booking->approve}}</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">{{$booking->client_date[0]['number']}}</p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">تاريخ الحجز</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">{{$booking->book_date}}</p>
                                </div>
                            </div>
                             <hr>
                             <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0"> حالة الحجز</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">{{$booking->status?'تم الدفع':'لم يتم الدفع'}}</p>
                                </div>
                            </div>
                            <hr>
                          
                           
                           

                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </section>
          </div>
</div>
@endsection
