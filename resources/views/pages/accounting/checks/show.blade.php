<!DOCTYPE html>
<html lang="en" dir="rtl">
    @include('layouts.header')
    @section('title', 'الشيكات')
    <!-- @section('title')
      <title> Your Page Title Here  </title>
    @endsection
    <head>
        <title> {{"الشيكات"}}</title>
    </head> -->
    <body class="rtl" >
        <div class="container">
            <div class="row">
                <div class="card " id="class-content">

                    <div class="card-header">                           
                            @if($check->status != 'cashed') 
                              <a href="{{route('checks.cashed',array('id' => $check->id))}}"
                                class="btn btn-square btn-primary" style="margin:10px;" id ="test_btn">تم صرف الشيك</a>
                            @else
                                <button class="btn btn-square btn-primary"  disabled>تم صرف الشيك</button>
                            @endif
                            <a href="{{route('checks.duplicate',$check->id)}}" class="btn btn-square btn-danger"
                                style="margin:10px;"> تكرار الشيك</a>
                    </div>
                    <div class="card-header">
                        <a href="javascript:void(0);" onclick="printPageArea('printableArea')">طباعة</a>
                    </div>
                    <div class="dt-ext table-responsive"  id="printableArea">

                        <div class="card-header">
                            <div class="row">
                                <div class="col-md-12 d-flex">
                                    <div class="col-sm-9">
                                        <span for="" class="form-control">
                                            التاريخ:{{Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $check->due_date)->format('Y-m-d')}}</span>
                                    </div>
                                    <div class="col-sm-3" style="padding-right:50px;">
                                        <label for="" class="form-control">
                                            رقم الشيك : {{$check->check_no}}</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="col-sm-12">
                                        <label class="form-control">الشيك باسم: {{$check->with_name}}</label>
                                    </div>
                                    <div class="col-sm-12">
                                        <label class="form-control"> المبلغ: {{$check->amount}} دينار</label>
                                    </div>
                                    <div class="col-sm-12">
                                        <label for="" class="form-control"> القسم: {{$check->branch->name}}</label>
                                    </div>
                                    <div class="col-sm-12">
                                        <label for="" class="form-control"> النوع:
                                            {{$check->type?'مستحق':'مؤجلة'}}</label>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- footer start-->

        @include('layouts.footer')
        <script>
        function printPageArea(areaID){
            var printContent = document.getElementById(areaID).innerHTML;
            var originalContent = document.body.innerHTML;
            document.body.innerHTML = printContent;
            window.print();
            document.body.innerHTML = originalContent;
        }

        </script>
    </body>

</html>