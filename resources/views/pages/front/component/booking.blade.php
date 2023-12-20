<x-app>

    @push('css')
    <style type="text/css">
    .myweekend span.ui-state-default {
        color: red;
    }
    </style>
    @endpush


    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <ol>
                    <li><a href="https://saeeh.com/">الرئيسية</a></li>
                    <li>حجز {{$apartment->name}}</li>
                </ol>
            </div>

        </div>
    </section>

    <main id="main">

        <div class="viewjoin">



            <div class="container">

                <div class="row">

                    <div class="col-md-12">





                        <!-- ======= جزء التعديل ======= -->



                        <div class="phone userjoin ">



                            <div class="viewwasf">

                                <h3 class="mainTitle">اختر تاريخ الحجز</h3>

                            </div>



                            <div class="row">

                                <!--<h5 class="text-danger col-xs-6"><i class="icofont-square"></i> الايام الغير متاحه</h5>-->

                                <!--<h5 class="text-success col-xs-6"><i class="icofont-square"></i> الايام المتاحة</h5>-->

                            </div>

                            <hr>

                            <br>



                            <div class="row">



                                <div class="col-md-6 col-md-offset-3">
                                    <div class="item">


                                        @if($apartment->image)
                                        <a href=""> <img class="img-fluid"
                                                src="{{asset('storage/'.$apartment->image)}}"></a>
                                        @else
                                        <a href=""> <img class="img-fluid"
                                                src="https://saeeh.com/upload/8d75de354936343be319266dcfcd19da.jpeg"></a>
                                        @endif

                                    </div>



                                </div>





                                <div class="col-12 col-md-12 col-lg-12">

                                    <div class="viewsrot1">

                                        <form onsubmit="return validateFunction();"
                                            action="{{route('front.booking',$apartment->id)}}"
                                            enctype="multipart/form-data" method="post">
                                            @csrf
                                            <div class="row">

                                                <div class="col-md-12" style="text-align: center;
                                                      padding-bottom: 30px;">
                                                    <strong style="text-align: center;">تفاصيل الحجز</strong>

                                                    <span class="text-danger" style="display:none;">(ليله واحدة)</span>

                                                </div>
                                                <div class="col-xs-6">

                                                    <strong>تاريخ الوصول</strong>

                                                    <br>

                                                    <span>

                                                        <input class="form-control digits" type="text" id="reciept_date"
                                                            name="from" placeholder="">

                                                        <input class="form-control" id="month1" type="text"
                                                            style="display:none;">

                                                    </span>

                                                </div>

                                                <div class="col-xs-6">

                                                    <strong>تاريخ المغادرة</strong>

                                                    <br>

                                                    <span>

                                                        <input class="form-control digits " type="text"
                                                            id="datetime-local" name="to" placeholder="">



                                                    </span>
                                                </div>
                                                <input type="hidden" id="apart_id" name="apart_id"
                                                    value='{{$apartment->id}}'>
                                                <div class="col-xs-6" style="display: block;" id="counts">

                                                    <strong> عدد الايام</strong>

                                                    <br>

                                                    <span>

                                                        <input class="form-control" id="day_count" name="days"
                                                            placeholder=" " type="text" readonly="">

                                                    </span>

                                                </div>



                                                <div class="col-xs-6" style="display: block;" id="totals">

                                                    <strong> المبلغ الاجمالى</strong>

                                                    <br>

                                                    <span>

                                                        <input class="form-control" id="total_price" name="price"
                                                            placeholder="المبلغ بعد الخصم" type="text" readonly="">

                                                    </span>

                                                </div>







                                            </div>



                                            <div class="form-group">

                                                <div class="viewsrot">

                                                    <h3 class="mainTitle">إذا كان لديك استفسار من إدارة الفيلا</h3>

                                                    <textarea class="form-control" id="note" name="note" rows="9"
                                                        placeholder="إضف استفسارك"></textarea>

                                                </div>

                                            </div>









                                            <!-- ==nav-footer== -->



                                            <div class="button-phone text-center">

                                                <button type="submit" class="btn btn-primary btn-lg">تأكيد
                                                    الحجز</button>

                                            </div>

                                        </form>
                                    </div>



                                </div>

                            </div>

                        </div>



                        <!-- ======= جزء التعديل ======= -->









                    </div>



                </div>

            </div>



        </div>

    </main>
    <input type="text" id="txtDate" readonly="readonly" />
    @push('scripts')
 
    <script type="text/javascript">
    $(function() {
        var date = new Date();
        var today = new Date(date.getFullYear(), date.getMonth(), date.getDate());
        var datesForDisable = {!!json_encode($days) !!};
        var typePrice="{{$apartment->type}}";
        console.log(typePrice);
       // console.log(datesForDisable);
        $("#datetime-local").datepicker({
            autoclose: true,
            todayHighlight: true,
            dateFormat: "yy/mm/dd",
            changeMonth: true,

            changeYear: true,

            justMonth: true,

            minDate: today,

            yearRange: '2019:2029',


            datesDisabled: ['2023/06/04'],

            monthNames: ['يناير', 'فبراير', 'مارس', 'ابريل', 'مايو', 'يونيو',

                'يوليو', 'أغسطس', 'سبتمبر', 'أكتوبر', 'نوفمبر', 'ديسمبر'
            ],

            monthNamesShort: ['يناير', 'فبراير', 'مارس', 'ابريل', 'مايو', 'يونيو',

                'يوليو', 'أغسطس', 'سبتمبر', 'أكتوبر', 'نوفمبر', 'ديسمبر'
            ],

            dayNamesShort: ['الأحد', 'الأثنين', 'الثلائاء', 'الأربعاء', 'الخميس', 'الجمعة',
                'السبت'
            ], // For formatting

            dayNamesMin: ['الأحد', 'الأثنين', 'الثلائاء', 'الأربعاء', 'الخميس', 'الجمعة',
                'السبت'
            ], // Column headings for days starting at Sunday
            beforeShowDay:function disableDates(date) {
                            var string = jQuery.datepicker.formatDate('yy-mm-dd', date);
                            let isDefaultDisabled = false;
                            if (date.getDay() === 6 ||date.getDay() === 3) {
                                isDefaultDisabled = true;
                            }
                            if(typePrice=='day'){       
                                return [datesForDisable.indexOf(string) == -1];  
                            }
                            return [isDefaultDisabled && datesForDisable.indexOf(string) == -1];
                        },
            onSelect: function(dateText) {
                var reciept = $("#reciept_date").val();
                if (reciept == '') {
                    alert('يجب ادخل تاريخ الوصول اولا');
                    dateText.val('');
                } else {
                    $('#day_count').val((new Date(new Date(this.value) - new Date(reciept)) / (
                        1000 * 60 * 60 * 24)) + 1);
                    var id = $('#apart_id').val();
                    var url = "{{ route('front.price', ":id")}}";
                    url = url.replace(':id', id);

                    $.ajax({
                        url: url,
                        type: 'post',
                        dataType: 'json',
                        data: {
                            '_token': '{{ csrf_token() }}',
                            'apart_id': id,
                            'from': reciept,
                            'to': this.value,
                            'days': $('#day_count').val()
                        },
                        success: function(response) {
                            $('#total_price').val(response.data);
                            console.log(response.numDisabledDay);
                            $('#day_count').val($('#day_count').val()-response.numDisabledDay);
                        }
                    });
                }
            }

        });


        ////////////////////
        $("#reciept_date").datepicker({
            autoclose: true,
            todayHighlight: true,
            dateFormat: "yy/mm/dd",
            changeMonth: true,

            changeYear: true,

            justMonth: true,

            minDate: today,
            // datesDisabled: ['2023-06-04'],
            yearRange: '2019:2029',

            monthNames: ['يناير', 'فبراير', 'مارس', 'ابريل', 'مايو', 'يونيو',

                'يوليو', 'أغسطس', 'سبتمبر', 'أكتوبر', 'نوفمبر', 'ديسمبر'
            ],

            monthNamesShort: ['يناير', 'فبراير', 'مارس', 'ابريل', 'مايو', 'يونيو',

                'يوليو', 'أغسطس', 'سبتمبر', 'أكتوبر', 'نوفمبر', 'ديسمبر'
            ],

            dayNamesShort: ['الأحد', 'الأثنين', 'الثلائاء', 'الأربعاء', 'الخميس', 'الجمعة',
                'السبت'
            ], // For formatting

            dayNamesMin: ['الأحد', 'الأثنين', 'الثلائاء', 'الأربعاء', 'الخميس', 'الجمعة',
                'السبت'
            ], // Column headings for days starting at Sunday
            beforeShowDay: function disableDates(date) {
                var string = jQuery.datepicker.formatDate('yy-mm-dd', date);

                let isDefaultDisabled = false;
                if (date.getDay() === 0 || date.getDay() == 4) {
                    isDefaultDisabled = true;
                }
                if(typePrice=='day'){       
                     return [datesForDisable.indexOf(string) == -1];  
                  }

                return [isDefaultDisabled && datesForDisable.indexOf(string) == -1];
            },

            onSelect: function(dateText) {
                var date = new Date(this.value);
                date.setDate(date.getDate() + 1);
                $("#datetime-local").datepicker("option", "minDate", date);
                if (new Date(this.value).getDay() == 4) {
                    $("#datetime-local").datepicker("option", "beforeShowDay",
                        function disableDates(date) {
                            var string = jQuery.datepicker.formatDate('yy-mm-dd', date);
                            let isDefaultDisabled = false;
                            if (date.getDay() === 6) {
                                isDefaultDisabled = true;
                            }
                            if(typePrice=='day'){       
                                return [datesForDisable.indexOf(string) == -1];  
                            }
                            return [isDefaultDisabled && datesForDisable.indexOf(string) == -1];
                        })
                } else {
                    $("#datetime-local").datepicker("option", "beforeShowDay",   function disableDates(date) {
                            var string = jQuery.datepicker.formatDate('yy-mm-dd', date);
                            let isDefaultDisabled = false;
                            if (date.getDay() === 6 ||date.getDay() === 3) {
                                isDefaultDisabled = true;
                            }
                            if(typePrice=='day'){       
                                return [datesForDisable.indexOf(string) == -1];  
                            }
                            return [isDefaultDisabled && datesForDisable.indexOf(string) == -1];
                        })
                }

                if ($("#datetime-local").val() != '') {
                    $('#day_count').val((new Date(new Date($("#datetime-local").val()) - new Date(
                        this.value)) / (1000 * 60 * 60 * 24)) + 1);
                    var id = $('#apart_id').val();
                    var url = "{{ route('front.price', ":id") }}";
                    url = url.replace(':id', id);

                    $.ajax({
                        url: url,
                        type: 'post',
                        dataType: 'json',
                        data: {
                            '_token': '{{ csrf_token() }}',
                            'apart_id': id,
                            'from': this.value,
                            'to': $("#datetime-local").val(),
                            'days': $('#day_count').val()

                        },
                        success: function(response) {
                            $('#total_price').val(response.data);
                            console.log(response.numDisabledDay);
                            $('#day_count').val($('#day_count').val()-response.numDisabledDay);
                        }
                    });
                }
            }

        });


    });
    </script>
    @endpush
</x-app>