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
                                    <p class="text-muted mb-0">{{$client->name}}</p>
                                </div>
                            </div>
                             <hr>
                             @if($client->approve_id)
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">  اسم بالانجليزيه</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">{{$client->name_en}}</p>
                                </div>
                            </div>
                            <hr>
                           @endif
                             <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">رقم الهاتف</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">{{$client->phone}}</p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">الدوله</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">{{$client->country}}</p>
                                </div>
                            </div>
                            <hr>

                           @if($client->approve_id)
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">تحقيق الهويه الشخصيه</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">{{$client->approve->name}}</p>
                                </div>
                            </div>
                            <hr>
                           @endif
                           @if($client->num)
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0"> رقم التحقق</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">{{$client->num}}</p>
                                </div>
                            </div>
                            <hr>
                           @endif
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">الجنسيه</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">{{$client->nationality->name}}</p>
                                </div>
                            </div>
                             <hr>
                             <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">الحاله</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">{{$client->status->name}}</p>
                                </div>
                            </div>
                            <hr>
                            @if($client->status_reason)
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">سبب الحاله</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">{{$client->status_reason}}</p>
                                </div>
                            </div>
                            <hr>
                           @endif
                            @if($client->client_img_1)
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">صورة الاثبات 1</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <a target="_blank" href="{{asset('storage/'.$client->client_img_1)}}">
                                            <img src="{{asset('storage/'.$client->client_img_1)}}"
                                                alt="avatar" class="rounded-circle img-fluid" style="width: 50px;" alt='no image' title="الصورة الاثبات"></a>
                                    </div>
                                </div>

                                <hr>
                             @endif
                             @if($client->client_img_2)
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0"> صورة الاثبات </p>
                                    </div>
                                    <div class="col-sm-9">
                                    <a target="_blank" href="{{asset('storage/'.$client->client_img_2)}}">
                                        <img src="{{asset('storage/'.$client->client_img_2)}}"
                                            alt="avatar" class="rounded-circle img-fluid" style="width: 50px;" alt='no image' title="الصورة الاثبات"></a>

                                    </div>
                                </div>
                                <hr>
                             @endif
                             @if($client->contract_img)
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">  صورة عقد الزواج</p>
                                    </div>
                                    <div class="col-sm-9">
                                    <a target="_blank" href="{{asset('storage/'.$client->contract_img)}}">
                                            <img src="{{asset('storage/'.$client->contract_img)}}"
                                                alt="avatar" class="rounded-circle img-fluid" style="width: 50px;" alt='no image' title="الصورة الزواج"></a>

                                    </div>
                                </div>
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
