<x-app>

    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <ol>
                    <li><a href="{{route('front.index')}}">الرئيسية</a></li>
                    <li>تفاصيل {{$apartment->types->name}} </li>
                </ol>
            </div>

        </div>
    </section>
    <main id="main">

        <div class="container">

            <div class="page-sections">






                <div class="row">








                </div>


            </div>
            <div class="row">

                <div class="viewdata col-md-12" style="background:white !important">



                    <div class="tab-1">

                        <div class="row">



                            <div class="ad-detels">

                                <div class="col-md-12 col-xs-12">


                                    <p class="head-no"> {{$apartment->name}}</p>

                                    <h1 class="headTitle">
                                        {{$apartment->types->name}}
                                    </h1>

                                </div>







                                <div class="col-md-12 col-xs-12">

                                    <div class="list-unstyled">

                                        <li> <i class="icofont-numbered"></i> الدور : <strong>{{$apartment->floor}}
                                            </strong>
                                        </li>


















                                        <li>


                                        </li>

                                    </div>

                                </div>







                            </div>



                            <br>

                            <hr>

















                            <div style="clear: both;"></div>
                        </div>





                        <div class="row">

                            <div class="col-md-12">

                                <table class="table table-bordered text-center" style="width: 100%;">

                                    <tbody>

                                        <tr class="bg-warning">

                                            <td colspan="3" style="text-align: center"><strong> السعر </strong></td>

                                        </tr>

                                        <tr>

                                            <td><strong class="text-danger">@if($apartment->type=='day')
                                                    {{json_decode($apartment->day_p)[0]->day.' د.ك لليوم العادى' }}
                                                    </br>
                                                    {{json_decode($apartment->day_p)[0]->week . ' د.ك لليوم للعطله' }}

                                                    @elseif($apartment->type=='week')
                                                    {{json_decode($apartment->week_p)[0]->price.' د.ك بدايه الاسبوع' }}
                                                    </br>
                                                    {{json_decode($apartment->week_p)[1]->price .'  د.ك نهايه الاسبوع'  }}
                                                    </br>
                                                    {{json_decode($apartment->week_p)[2]->price .' د.ك الاسبوع كامل'  }}
                                                    @endif</strong></td>

                                        </tr>



                                    </tbody>

                                </table>

                            </div>

                        </div>


                        <div class="row viewUnitTopBlocks">



                            <div class="col-md-4 col-xs-4">




                                <!-- ==nav-footer== -->

                                <div class="nav-footer">

                                    <div class="bottom-btn  text-center">
                                        @guest('client')
                                        <a href="{{route('front.login')}}" class="btn b-block btn-success">

                                            تسجيل الدخول </a>
                                        @endguest
                                        @auth('client')
                                        <a href="{{route('front.booking',$apartment->id)}}"
                                            class="btn b-block btn-success">

                                            حجز الدوبلكس </a>

                                        @endauth


                                    </div>

                                </div>



                                <!-- ==nav-footer== -->





                            </div>

                        </div>

                        <div class="row viewUnitTopBlocks">





                            <div class="col-12 col-md-12 col-lg-12">



                                <div class="viewwasf">

                                    <h3 class="mainTitle">الوصف</h3>

                                    <div class="viewUnitSystemDesc">



                                        <div class="wasef">
                                            {!!$apartment->desc!!}

                                        </div>



                                    </div>

                                </div>


                            </div>







                        </div>













                    </div>

                    <div class="tab-2">

                        <div class="tab" role="tabpanel">







                            <!-- Nav tabs -->

                            <ul class="nav nav-tabs" role="tablist">

                                <li role="presentation"><a href="#Section1" aria-controls="home" class="active show"
                                        role="tab" data-toggle="tab"> المواصفات</a></li>

                                <!-- <li role="presentation"><a href="#Section2" aria-controls="profile" role="tab"
                                        data-toggle="tab"> التقييمات</a></li>

                                <li role="presentation"><a href="#Section3" aria-controls="messages" role="tab"
                                        data-toggle="tab"> الخريطة</a></li>

                                <li role="presentation"><a href="#Section4" aria-controls="shroot" role="tab"
                                        data-toggle="tab"> الشروط</a></li> -->



                            </ul>

                            <!-- Tab panes -->

                            <div class="tab-content tabs" style="    margin-bottom: 50px;">



                                <div role="tabpanel" class="tab-pane fade show active" id="Section1">



                                    <div class="accordion-page">

                                        <div class="panel-group" id="accordion" role="tablist"
                                            aria-multiselectable="true">


                                            @foreach($apartment->homeContentsWithContent as $item)
                                            <div class="panel panel-default ">

                                                <div class="panel-heading" role="tab" id="heading-{{$item->id}}">

                                                    <h4 class="panel-title">

                                                        <a role="button" data-toggle="collapse" data-parent="#accordion"
                                                            href="#collapse-{{$item->id}}" aria-expanded="true"
                                                            aria-controls="collapse-{{$item->id}}">

                                                            <!-- <img src="https://saeeh.com/assets/frontend/img/8.png"> -->
                                                            {{$item->name}}



                                                        </a>

                                                    </h4>

                                                </div>

                                                <div id="collapse-{{$item->id}}" class="panel-collapse collapse show"
                                                    role="tabpanel" aria-labelledby="heading-{{$item->id}}">

                                                    <div class="panel-body">

                                                        <ul>
                                                            @foreach($item->content as $value)
                                                            <li>{{$value->name['ar']}}</li>
                                                            @endforeach





                                                        </ul>

                                                    </div>

                                                </div>

                                            </div>
                                            @endforeach

                                            <div class="panel panel-default">

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











    </main>
</x-app>