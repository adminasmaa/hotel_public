@extends('layouts.admin')
@section('title', 'الحجوزات')
@section('css')
<link rel="stylesheet" href="https://7agz.com/Mktba/themes/7agz-2021/assets/vendor/intl-input2/css/intlTelInput.css">

@endsection
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



                                    <div class="card-body">
                                        <ul class="nav nav-pills" id="pills-tab" role="tablist">

                                            <li class="nav-item"><a class="nav-link active" id="pills-home-tab1"
                                                    data-bs-toggle="pill" href="#pills-home1" role="tab"
                                                    aria-controls="pills-home" aria-selected="true">حجز جديد
                                                    <div class="media"></div>
                                                </a></li>
                                            <li class="nav-item"><a class="nav-link" id="pills-home-tab2"
                                                    data-bs-toggle="pill" href="#pills-home2" role="tab"
                                                    aria-controls="pills-home" aria-selected="true">الحجوزات 
                                                    <div class="media"></div>
                                                </a></li>
                                                <li class="nav-item"><a class="nav-link" id="pills-home-tab3"
                                                    data-bs-toggle="pill" href="#pills-home3" role="tab"
                                                    aria-controls="pills-home" aria-selected="true">الحجوزات الموجله
                                                    <div class="media"></div>
                                                </a></li>
                                                <li class="nav-item"><a class="nav-link" id="pills-home-tab4"
                                                    data-bs-toggle="pill" href="#pills-home4" role="tab"
                                                    aria-controls="pills-home" aria-selected="true">الحجوزات الملغيه
                                                    <div class="media"></div>
                                                </a></li>
                                                <li class="nav-item"><a class="nav-link" id="pills-home-tab5"
                                                    data-bs-toggle="pill" href="#pills-home5" role="tab"
                                                    aria-controls="pills-home" aria-selected="true">الحجوزات المدفوعه
                                                    <div class="media"></div>
                                                </a></li>
                                                <li class="nav-item"><a class="nav-link" id="pills-home-tab6"
                                                    data-bs-toggle="pill" href="#pills-home6" role="tab"
                                                    aria-controls="pills-home" aria-selected="true">الحجوزات منتهى الوقت
                                                    <div class="media"></div>
                                                </a></li>
                                                

                                        </ul>
                                        <div class="tab-content  mt-5" id="pills-tabContent">



                                            <div class="tab-pane fade show active" id="pills-home1" role="tabpanel"
                                                aria-labelledby="pills-home-tab1">

                                                @include('pages.bookings.create')
                                            </div>
                                            <div class="tab-pane fade" id="pills-home2" role="tabpanel"
                                                aria-labelledby="pills-home-tab2">

                                                @include('pages.bookings.allBooking')
                                            </div>
                                            <div class="tab-pane fade" id="pills-home3" role="tabpanel"
                                                aria-labelledby="pills-home-tab3">

                                                @include('pages.bookings.activeBooking')
                                            </div>
                                            <div class="tab-pane fade" id="pills-home4" role="tabpanel"
                                                aria-labelledby="pills-home-tab4">

                                                @include('pages.bookings.cancelBooking')
                                            </div>
                                            <div class="tab-pane fade" id="pills-home5" role="tabpanel"
                                                aria-labelledby="pills-home-tab5">
                                                @include('pages.bookings.paidBooking')
                                            </div>
                                            <div class="tab-pane fade" id="pills-home6" role="tabpanel"
                                                aria-labelledby="pills-home-tab6">
                                                @include('pages.bookings.expireBooking')
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
</div>

@endsection
@section('scripts')
<script src="https://7agz.com/Mktba/themes/7agz-2021/assets/vendor/intl-input2/js/intlTelInput.js"></script>

<script>
$(document).ready(function() {

    var phone_number = window.intlTelInput(document.querySelector("#lb_phone"), {
        separateDialCode: true,
        formatOnDisplay: true,
        preferredCountries:["kw"],
        hiddenInput: "full",
        utilsScript: "{{asset('assets/js/utils.js')}}"
    });
    if($('.chooseWay option:selected').val()!=''){
        $('.way').each(function() {
            $(this).show();
        })
        $('.num_val').html($('.chooseWay option:selected').text());
        
    };

    $("body").on( "change", ".chooseWay", function(){
        $('.way').each(function() {
            $(this).show();
        })
   
        
        $('.num_val').html($('.chooseWay option:selected').text());
    });
    var radioval=$("input[type=radio][name='choosebooking']:checked").val();
    if(radioval=='new' || radioval=='exist'){
        $('.chooose').val(radioval);
        $('.'+radioval).show();
    }
    $('input[type=radio][name=choosebooking]').change(function() {
        $('.chooose').val($(this).val());
        if ($(this).val() == 'new') {
            $('.new').show();
            $('.exist').hide();
        } else {
            $('.exist').show();
            $('.new').hide();
        }
    });
   
    $("body").on( "change", ".chooseWayexist", function(){
        $('.wayexist').each(function() {
            $(this).hide();
        })
        $('.' + $(this).val()).show();
    });
  
    $('.chooseClient').change(function() {
        var id= $(this).val();
        var url = "{{ route('clients.getdata', ":id") }}";
           url = url.replace(':id', id);
        $.ajax({
            url:url,
            type: 'get',
            dataType: 'json',
            success: function(response) {
                $(".employee").html(response.data);
          
            }
        });
    });


    // $('.m').click(function() {
    //     var id= $(this).data('id');

    //     var url = "{{ route('bookings.changeCase', ":id") }}";
    //        url = url.replace(':id', id);
    //     $.ajax({
    //         url:url,
    //         type: 'post',
    //         dataType: 'json',
    //         data: {"_token": "{{ csrf_token() }}"},
    //         success: function(response) {
    //             alert($('.m').html(response.data));          
    //         }
    //     });
    // });


        var id= $('.chooseClient').val();
        var num='',
        approve_id='';
        if(id !=''){
           
            @if ($errors->has('approve_id'))
            approve_id='{{$errors->first('approve_id')}}';
            @endif
            @if ($errors->has('num'))
            num='{{$errors->first('num')}}';
            @endif
      
        var url = "{{ route('clients.getdata', ":id") }}";
           url = url.replace(':id', id);
        $.ajax({
            url:url,
            type: 'get',
            dataType: 'json',
            data: {num:num,approve_id:approve_id},
            success: function(response) {
                $(".employee").html(response.data);
         
            }
        });
    }
  
});
</script>
@endsection