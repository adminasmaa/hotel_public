@extends('layouts.admin')
@section('title', ' عرض ' .$name)
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
                                    <p class="mb-0">المبلغ</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">{{$bill->value}}</p>
                                </div>
                            </div>
                             <hr>
                            
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">  التاريخ </p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">{{$bill->date}}</p>
                                </div>
                            </div>
                            <hr>
                          
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">الفرع</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">{{$bill->branch->name}}</p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0"> النوع</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">{{$bill->type->name}}</p>
                                </div>
                            </div>
                            <hr>

                           @if($bill->subtype)
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">نوع {{$bill->type->name}}</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">{{$bill->subtype->name}}</p>
                                </div>
                            </div>
                            <hr>
                           @endif
                           @if($bill->desc)
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">الوصف </p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">{{$bill->desc}}</p>
                                </div>
                            </div>
                            <hr>
                           @endif
                    
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </section>
          </div>
</div>
@endsection
