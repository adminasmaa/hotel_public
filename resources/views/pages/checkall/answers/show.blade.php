<!DOCTYPE html>
<html lang="en" dir="rtl">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
          content="Cuba admin is super flexible, powerful, clean &amp; modern responsive bootstrap 5 admin template with unlimited possibilities.">
    <meta name="keywords"
          content="admin template, Cuba admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="pixelstrap">
    <link rel="icon" href="{{asset('assets/images/favicon.png')}}" type="image/x-icon">
    <link rel="shortcut icon" href="{{asset('assets/images/favicon.png')}}" type="image/x-icon">
    <title> الفنادق- @yield('title')</title>


   
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400&display=swap" rel="stylesheet">


    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/font-awesome.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/icofont.css')}}">

    <link rel=" stylesheet" type="text/css" href="{{asset('assets/css/vendors/themify.css')}}">


    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/flag-icon.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/feather-icon.css')}}">
 
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/scrollbar.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/prism.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/scrollbar.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/datatable-extension.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/bootstrap.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/style.css')}}">
    <link id="color" rel="stylesheet" href="{{asset('assets/css/color-1.css')}}" media="screen">

    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/responsive.css')}}">


    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/date-picker.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/timepicker.css')}}">

    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.min.css'>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>
  

    @yield('css')


</head>


<body class="rtl">
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
                                            <div class="card-header">
                                            
                                            </div>
                                        
                                            <div class="card-body">
                                        <div class="taskadd">
                                            <div class="dt-ext table-responsive">
                                                <table class=" table display  data-table-responsive " id="">
                                                    <thead>
                                                    <tr>
                                                        <th>الاسم</th>
                                                        <th>التاريخ</th>
                                                        <th>الوقت</th>
                                                      
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                     
                                                      
                                                     
                                                        <tr>
                                                          <td>{{$checkallAnswer->employee->user_name}}</td>
                                                          <td>{{Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $checkallAnswer->created_at)->format('Y-m-d')}}</td>
                                                          <td>{{Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $checkallAnswer->created_at)->format('H-i-s')}}</td>


                                                        </tr>
                                                     
                                                     

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
                                                <div class="taskadd">
                                                    <div class="dt-ext table-responsive">
                                                        <table class=" table display  data-table-responsive " id="">
                                                            <thead>
                                                            <tr>
                                                                <th>#</th>
                                                                <th>السؤال</th>
                                                                <th>نعم او لا</th>
                                                                <th>الصورة</th>
                                                                <th>الملاحظة</th>
                                                            
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            
                                                                @foreach($answers as $answer)
                                                                   @if(App\Models\Checkall\Checkall::find($answer->checkall_id))
                                                                        <tr>
                                                                        <td>{{$loop->index+1}}</td>
                                                                        <td>{{App\Models\Checkall\Checkall::find($answer->checkall_id)->question}}</td>
                                                                        <td>{{$answer->answer?'نعم':'لا'}}</td>
                                                                        <td><a href="{{asset('storage/'.$answer->image)}}">مشاهدة الصورة</a></td>
                                                                        <td>{{$answer->note}}</td>

                                                                        </tr>
                                                                    @endif
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
            </div>
    </div>



    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>

<script src="{{asset('assets/js/jquery-3.5.1.min.js')}}"></script>


<script src="{{asset('assets/js/bootstrap/bootstrap.bundle.min.js')}}"></script>

<script src="{{asset('assets/js/icons/feather-icon/feather.min.js')}}"></script>
<script src="{{asset('assets/js/icons/feather-icon/feather-icon.js')}}"></script>

<script src="{{asset('assets/js/scrollbar/simplebar.js')}}"></script>
<script src="{{asset('assets/js/scrollbar/custom.js')}}"></script>

<script src="{{asset('assets/js/config.js')}}"></script>

<script src="{{asset('assets/js/sidebar-menu.js')}}"></script>
<script src="{{asset('assets/js/datatable/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/js/datatable/datatable-extension/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('assets/js/datatable/datatable-extension/jszip.min.js')}}"></script>
<script src="{{asset('assets/js/datatable/datatable-extension/buttons.colVis.min.js')}}"></script>
<script src="{{asset('assets/js/datatable/datatable-extension/pdfmake.min.js')}}"></script>
<script src="{{asset('assets/js/datatable/datatable-extension/vfs_fonts.js')}}"></script>
<script src="{{asset('assets/js/datatable/datatable-extension/dataTables.autoFill.min.js')}}"></script>
<script src="{{asset('assets/js/datatable/datatable-extension/dataTables.select.min.js')}}"></script>
<script src="{{asset('assets/js/datatable/datatable-extension/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets/js/datatable/datatable-extension/buttons.html5.min.js')}}"></script>
<script src="{{asset('assets/js/datatable/datatable-extension/buttons.print.min.js')}}"></script>
<script src="{{asset('assets/js/datatable/datatable-extension/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets/js/datatable/datatable-extension/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('assets/js/datatable/datatable-extension/responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets/js/datatable/datatable-extension/dataTables.keyTable.min.js')}}"></script>
<script src="{{asset('assets/js/datatable/datatable-extension/dataTables.colReorder.min.js')}}"></script>
<script src="{{asset('assets/js/datatable/datatable-extension/dataTables.rowReorder.min.js')}}"></script>
<script src="{{asset('assets/js/datatable/datatable-extension/dataTables.scroller.min.js')}}"></script>
<script src="{{asset('assets/js/datatable/datatable-extension/custom.js')}}"></script>
<script src="{{asset('assets/js/tooltip-init.js')}}"></script>
<script src="{{asset('assets/js/form-wizard/form-wizard.js')}}"></script>

<script src="{{asset('assets/js/datepicker/date-picker/datepicker.js')}}"></script>
    <script src="{{asset('assets/js/datepicker/date-picker/datepicker.en.js')}}"></script>
    <script src="{{asset('assets/js/datepicker/date-picker/datepicker.custom.js')}}"></script>
    <script src="{{asset('assets/js/sidebar-menu.js')}}"></script>
    <script src="{{asset('assets/js/time-picker/highlight.min.js')}}"></script>
    <script src="{{asset('assets/js/tooltip-init.js')}}"></script>


<script src="{{asset('assets/js/script.js')}}"></script>

<script type="https://cdn.bootcdn.net/ajax/libs/fontawesome-iconpicker/3.2.0/js/fontawesome-iconpicker.js"></script>
<script type="https://cdn.bootcdn.net/ajax/libs/fontawesome-iconpicker/3.2.0/js/fontawesome-iconpicker.min.js"></script>



<script>


    let table = $('.data-table-responsive').DataTable({
        dom: 'Bfrtip',
        responsive: true,
        buttons: [

            {
                extend: 'print',
                text: 'طباعة',
                extend: 'print',

                customize: function (win) {
                    $(win.document.body)
                        .css('direction', 'rtl');


                },

                exportOptions: {
                    columns: [0, 1, 2],
                    header: false,


                }

            }


        ],


        language: {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Arabic.json"

        },


    })

    function 
    
    
    (table) {
        if (table.responsive.hasHidden()) {
            let rows = table.rows().data();
            $.each(rows, function (index, rowId) {
                var data = rows.data();
                if (data[0][0] == 1){

                    table.column(0).visible(false);

                }else{
                    table.column(0).visible(true);

                }



            })

        }else {

            table.columns([0]).visible(true);
        }

        table.draw();
    }
    table.on( 'responsive-resize', function ( e, datatable, columns ) {

        e.stopPropagation();

        show_hide_column(datatable);





    })



    $('.export-button_class').DataTable({
        dom: 'Bfrtip',
        responsive: true,


        buttons: [

            {
                extend: 'print',
                text: 'طباعة',
                extend: 'print',
                customize: function (win) {
                    $(win.document.body)
                        .css('direction', 'rtl');


                },

                exportOptions: {
                    columns: [0, 1],
                    header: false,


                }
            }


        ],

        language: {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Arabic.json"

        },

    })


</script>
<script type="text/javascript">
      window.onload = function() { window.print(); }
 </script>

@yield('scripts')
<!-- Plugin used-->
</body>

</html>
