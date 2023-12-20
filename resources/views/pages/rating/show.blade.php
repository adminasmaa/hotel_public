<!DOCTYPE html>
<html lang="en" dir="rtl">
    @include('layouts.header')

    <body class="rtl">
        <div class="container">
            <div class="row">
                <div class="col-sm-12" id="class-content">

                    <div class="card-header">

                    </div>
                    <div class="card-body">
                            <table class="table table-bordered" id="">
                                <thead>
                                    <tr>
                                        <th>الاسم</th>
                                        <th>التاريخ</th>
                                        <th>الوقت</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{$rating->admin->ar_name}}</td>
                                        <td>{{Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $rating->created_at)->format('Y-m-d')}}
                                        </td>
                                        <td>{{Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $rating->created_at)->format('H:i')}}
                                        </td>
                                    </tr>
                                </tbody>
                                <tfoot>

                                </tfoot>
                            </table>
                    </div>
                </div>
                <p style="text-align:center; font-size:large;"> تقييم {{$rating->prof->name}}</p>
                <p style="text-align:center; font-size:large;"> {{$rating->emp->ar_name}}</p>
            </div>


            <div class="row">
                <div class="col-sm-12" id="class-content">
                    <div class="email-right-aside bookmark-tabcontent">
                        <div class="card email-body radius-left">
                            <div class="ps-0">
                                <div class="tab-content">
                                    <div class="tab-pane fade active show" id="banks" role="tabpanel"
                                        aria-labelledby="banks-tab">
                                        <div class="card mb-0">
                                            <div class="card-header">

                                            </div>

                                            <div class="card-body">

                                                <div class="dt-ext table-responsive">
                                                    <table class=" table display  data-table-responsive " id="">
                                                        <thead>
                                                            <tr>
                                                                <th>#</th>
                                                                <th>السؤال</th>
                                                                <th>نعم او لا</th>
                                                                <th>الصورة</th>
                                                                <th>الملاحظة</th>
                                                                <th>التقييم</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>


                                                            @foreach(json_decode($rating->answers) as $r)

                                                            <tr>
                                                                <td>{{$loop->index+1}}</td>
                                                                <td>{{App\Models\rating\RatingQuestions::find($r->rating_question_id)->text}}
                                                                </td>
                                                                <!-- <td>{{optional($r->rating_question_id)->text}}</td> -->
                                                                <td>{{$r->answer?'نعم':'لا'}}</td>
                                                                <td>
                                                                    @if(!is_null($img->image_name))
                                                                      <a href="{{asset('storage/'.$img->image_name)}}"
                                                                        target="_blank">مشاهدة الصورة</a>
                                                                     @endif
                                                                </td>
                                                                <td>{{$r->note}}</td>
                                                                <td>{{$r->rating}}</td>

                                                            </tr>
                                                            @endforeach

                                                        </tbody>
                                                        <tfoot>


                                                        </tfoot>
                                                    </table>

                                                </div>

                                            </div>
                                            <span style="text-align:center; font-size:large;"> متوسط التقييمات
                                                {{$rating->rating_avg}}</span>
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div> <!-- end of card-body -->

                    </div>
                </div>
            </div>



            <!-- footer start-->

            @include('layouts.footer')
    </body>

</html>
