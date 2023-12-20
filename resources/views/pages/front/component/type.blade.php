<x-app>
  
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <ol>
                    <li><a href="https://saeeh.com/">الرئيسية</a></li>
                    <li>نتائج البحث</li>
                </ol>
            </div>

        </div>
    </section>
    <section class="progressbar">
        <button id="search_btn" class="btn btn-warning" style="float: right;     padding-left: 50px;
                            padding-right: 50px;margin: 6px 6px;" type="button">بحث
            جديد</button>


        <div class="container" id="search_div" style="display:none;">
            <div class="searchbox-1 text-right">
                <div class="form-container">
                    <form class="form-horizontal" action="https://saeeh.com/index/search_result" method="post">
                        <div class="form-row align-items-center">
                            <div class="col-sm-3 my-1">
                                <select class="form-control input-lg" name="city">
                                    <option value="none" selected="">المدينة...</option>

                                    <option value="all">الكل</option>

                                    <option value="1">
                                        مراكش</option>
                                </select>
                            </div>
                            <div class="col-sm-3 my-1">
                                <select name="type_id" id="type_id" class="form-control input-lg">
                                    <option value="all">الفئة ...</option>
                                    <option value="1">قصر</option>
                                    <option value="2">فيلا</option>
                                    <option value="3">شقة</option>
                                    <option value="4">استديو</option>
                                    <option value="5">سويت</option>
                                    <option value="7">غرفة</option>
                                    <option value="29">دوبلكس </option>
                                </select>
                            </div>

                            <div class="col-sm-3 my-1" id="frooms">

                                <select name="rooms_count" id="rooms_count" class="form-control input-lg">
                                    <option value="none" selected="">عدد الغرف...</option>

                                    <option id="mrooms" value="all">الكل</option>

                                    <option value="1">1</option>

                                    <option value="2">2</option>

                                    <option value="3">3</option>

                                    <option value="4">4</option>

                                    <option value="5">5</option>

                                    <option value="6">6</option>

                                    <option value="7">7</option>

                                    <option value="8">8</option>
                                </select>

                            </div>


                            <div class="col-sm-3 my-1">
                                <button type="submit" class="btn btn-primary">بحث</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>

        </div>
    </section>
    <main id="main">
        <div class="container">
            <div class="row">

                <div class="col-md-4" id="filter_div" style="display:none;">

                    <div class="accordion-search">
                        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                            <form action="https://saeeh.com/index/search_result?type_v=1" method="post">
                                <input type="text" value="1" name="type_v" hidden="">








                                <div class="panel panel-default">
                                    <div class="panel-heading" role="tab" id="heading-3">
                                        <h4 class="panel-title">
                                            <a role="button" data-toggle="collapse" data-parent="#accordion"
                                                href="#collapse-3" aria-expanded="true" aria-controls="collapse-3">
                                                <i class="fa fa-money"></i> نظام التأجير
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapse-3" class="panel-collapse collapse in show" role="tabpanel"
                                        aria-labelledby="heading-3">
                                        <div class="panel-body">

                                            <div class="check">
                                                <div class="row">




                                                    <div class="col-xs-6">
                                                        <div class="form-check">
                                                            <input class="sys_prices form-check-input " type="checkbox"
                                                                name="filter_d[sys_price]" value="1">
                                                            <label class="form-check-label">
                                                                يومى </label>
                                                        </div>
                                                    </div>

                                                    <div class="col-xs-6">
                                                        <div class="form-check">
                                                            <input class="sys_prices form-check-input " type="checkbox"
                                                                name="filter_d[sys_price]" value="2">
                                                            <label class="form-check-label">
                                                                اسبوعى </label>
                                                        </div>
                                                    </div>

                                                    <div class="col-xs-6">
                                                        <div class="form-check">
                                                            <input class="sys_prices form-check-input " type="checkbox"
                                                                name="filter_d[sys_price]" value="3">
                                                            <label class="form-check-label">
                                                                الاثنان معا </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>


                                <div class="panel panel-default">
                                    <div class="panel-heading" role="tab" id="heading-3">
                                        <h4 class="panel-title">
                                            <a role="button" data-toggle="collapse" data-parent="#accordion"
                                                href="#collapse-24" aria-expanded="true" aria-controls="collapse-2">
                                                <i class="fa fa-bed"></i> عدد الغرف
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapse-24" class="panel-collapse collapse in show " role="tabpanel"
                                        aria-labelledby="heading-3">
                                        <div class="panel-body">

                                            <div class="check">
                                                <div class="row">









                                                    <div class="col-xs-6">
                                                        <div class="form-check">
                                                            <input class="form-check-input rooms_list" type="checkbox"
                                                                value="9" id="rooms_9" name="rooms_filter[]">
                                                            <label class="form-check-label">
                                                                9 فأكثر
                                                            </label>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>








                                <div class="panel panel-default">
                                    <div class="panel-heading" role="tab" id="heading-3">
                                        <h4 class="panel-title">
                                            <a role="button" data-toggle="collapse" data-parent="#accordion"
                                                href="#collapse-3" aria-expanded="true" aria-controls="collapse-3">
                                                <i class="fa fa-home"></i> غرف اخرى
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapse-3" class="panel-collapse collapse in show" role="tabpanel"
                                        aria-labelledby="heading-3">
                                        <div class="panel-body">

                                            <div class="check">
                                                <div class="row">



                                                    <div class="col-xs-6">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox"
                                                                name="filter_d[service_room]" value="1">
                                                            <label class="form-check-label">
                                                                غرفة خادمة </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-6">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox"
                                                                name="filter_d[driver_room]" value="1">
                                                            <label class="form-check-label">
                                                                غرفة سائق </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-6">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox"
                                                                name="filter_d[guard_room]" value="1">
                                                            <label class="form-check-label">
                                                                غرفة حارس </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-6">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox"
                                                                name="filter_d[cook_room]" value="1">
                                                            <label class="form-check-label">
                                                                غرفة طعام </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-6">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox"
                                                                name="filter_d[clean_room]" value="1">
                                                            <label class="form-check-label">
                                                                غرفة غسيل </label>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>






                                <div class="panel panel-default">
                                    <div class="panel-heading" role="tab" id="heading-3">
                                        <h4 class="panel-title">
                                            <a role="button" data-toggle="collapse" data-parent="#accordion"
                                                href="#collapse-111" aria-expanded="true" aria-controls="collapse-111">
                                                <i class="fa fa-home"></i> مواقف السيارات
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapse-111" class="panel-collapse collapse in show" role="tabpanel"
                                        aria-labelledby="heading-3">
                                        <div class="panel-body">

                                            <div class="check">
                                                <div class="row">


                                                    <div class="col-xs-12">
                                                        <div class="form-check">
                                                            <input class="maqqf_say form-check-input" type="checkbox"
                                                                name="filter_d[maqqf_say]" value="amam">
                                                            <label class="form-check-label">
                                                                مواقف خاصة بالامام
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-12">
                                                        <div class="form-check">
                                                            <input class="maqqf_say form-check-input" type="checkbox"
                                                                name="filter_d[maqqf_say]" value="dahil">
                                                            <label class="form-check-label">
                                                                مواقف خاصة بداخل
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-12">
                                                        <div class="form-check">
                                                            <input class="maqqf_say form-check-input" type="checkbox"
                                                                name="filter_d[maqqf_say]" value="sardab">
                                                            <label class="form-check-label">
                                                                مواقف خاصة بالسرداب
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-12">
                                                        <div class="form-check">
                                                            <input class="maqqf_say form-check-input" type="checkbox"
                                                                name="filter_d[maqqf_say]" value="place">
                                                            <label class="form-check-label">
                                                                متوفر مواقف للمكان
                                                            </label>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>


                                <div class="panel panel-default">
                                    <div class="panel-heading" role="tab" id="heading-3">
                                        <h4 class="panel-title">
                                            <a role="button" data-toggle="collapse" data-parent="#accordion"
                                                href="#collapse-121" aria-expanded="true" aria-controls="collapse-121">
                                                <i class="fa fa-home"></i> عدد الأدوار
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapse-121" class="panel-collapse collapse in show" role="tabpanel"
                                        aria-labelledby="heading-3">
                                        <div class="panel-body">

                                            <div class="check">
                                                <div class="row">


                                                    <div class="col-xs-12">
                                                        <div class="form-check">
                                                            <input class="dawr form-check-input" type="checkbox"
                                                                name="filter_d[dawr]" value="1">
                                                            <label class="form-check-label">
                                                                دور
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-12">
                                                        <div class="form-check">
                                                            <input class="dawr form-check-input" type="checkbox"
                                                                name="filter_d[dawr]" value="2">
                                                            <label class="form-check-label">
                                                                دورين
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-12">
                                                        <div class="form-check">
                                                            <input class="dawr form-check-input" type="checkbox"
                                                                name="filter_d[dawr]" value="3">
                                                            <label class="form-check-label">
                                                                ثلاث أدوار
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-12">
                                                        <div class="form-check">
                                                            <input class="dawr form-check-input" type="checkbox"
                                                                name="filter_d[dawr]" value="11">
                                                            <label class="form-check-label">
                                                                شقة دور أول
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-12">
                                                        <div class="form-check">
                                                            <input class="dawr form-check-input" type="checkbox"
                                                                name="filter_d[dawr]" value="12">
                                                            <label class="form-check-label">
                                                                شقة دور ثانى
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-12">
                                                        <div class="form-check">
                                                            <input class="dawr form-check-input" type="checkbox"
                                                                name="filter_d[dawr]" value="13">
                                                            <label class="form-check-label">
                                                                شقة دور ثالث
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-12">
                                                        <div class="form-check">
                                                            <input class="dawr form-check-input" type="checkbox"
                                                                name="filter_d[dawr]" value="14">
                                                            <label class="form-check-label">
                                                                شقة دور رابع
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>










                                <div class="panel panel-default">
                                    <div class="panel-heading" role="tab" id="heading-3">
                                        <h4 class="panel-title">
                                            <a role="button" data-toggle="collapse" data-parent="#accordion"
                                                href="#collapse-7" aria-expanded="true" aria-controls="collapse-3">
                                                <i class="fa fa-shower"></i> المسبح
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapse-7" class="panel-collapse collapse in show" role="tabpanel"
                                        aria-labelledby="heading-3">
                                        <div class="panel-body">

                                            <div class="check">
                                                <div class="row">



                                                    <div class="col-xs-12">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox"
                                                                name="filter_d[no_swim]" value="1">
                                                            <label class="form-check-label">
                                                                مسبح مشترك </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-12">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox"
                                                                name="filter_d[inner_swim_barrier]" value="1">
                                                            <label class="form-check-label">
                                                                مسبح خاص مغطي </label>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>




                                <div class="panel panel-default">
                                    <div class="panel-heading" role="tab" id="heading-3">
                                        <h4 class="panel-title">
                                            <a role="button" data-toggle="collapse" data-parent="#accordion"
                                                href="#collapse-57" aria-expanded="true" aria-controls="collapse-9">
                                                <i class="fa fa-bath"></i> مرافق الحمام
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapse-57" class="panel-collapse collapse in show" role="tabpanel"
                                        aria-labelledby="heading-3">
                                        <div class="panel-body">

                                            <div class="check">
                                                <div class="row">



                                                    <div class="col-xs-6">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox"
                                                                name="filter_d[soap]" value="1">
                                                            <label class="form-check-label">
                                                                صابون </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-6">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox"
                                                                name="filter_d[towels]" value="1">
                                                            <label class="form-check-label">
                                                                مناشف </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-6">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox"
                                                                name="filter_d[rob]" value="1">
                                                            <label class="form-check-label">
                                                                روب </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-6">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox"
                                                                name="filter_d[jakuzii]" value="1">
                                                            <label class="form-check-label">
                                                                جاكوزى </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-6">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox"
                                                                name="filter_d[shambo]" value="1">
                                                            <label class="form-check-label">
                                                                شامبو </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-6">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox"
                                                                name="filter_d[bath_tub]" value="1">
                                                            <label class="form-check-label">
                                                                حوض استحمام </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-6">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox"
                                                                name="filter_d[mandil]" value="1">
                                                            <label class="form-check-label">
                                                                مناديل </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-6">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox"
                                                                name="filter_d[sauna]" value="1">
                                                            <label class="form-check-label">
                                                                سونا </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-6">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox"
                                                                name="filter_d[hamam_mughrab]" value="1">
                                                            <label class="form-check-label">
                                                                حمام مغربى </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-6">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox"
                                                                name="filter_d[hair_dryer]" value="1">
                                                            <label class="form-check-label">
                                                                استشوار </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-6">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox"
                                                                name="filter_d[slibr]" value="1">
                                                            <label class="form-check-label">
                                                                سليبر </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-6">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox"
                                                                name="filter_d[toothbrush]" value="1">
                                                            <label class="form-check-label">
                                                                فرشاة اسنان </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-6">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox"
                                                                name="filter_d[sihwar]" value="1">
                                                            <label class="form-check-label">
                                                                مجفف شعر </label>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <div class="panel panel-default" style="display:none;">
                                    <div class="panel-heading" role="tab" id="heading-3">
                                        <h4 class="panel-title">
                                            <a role="button" data-toggle="collapse" data-parent="#accordion"
                                                href="#collapse-10" aria-expanded="true" aria-controls="collapse-10">
                                                <i class="fa fa-server"></i> خدمات مجانية
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapse-10" class="panel-collapse collapse in show" role="tabpanel"
                                        aria-labelledby="heading-3">
                                        <div class="panel-body">

                                            <div class="check">
                                                <div class="row">



                                                    <div class="col-xs-6">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox"
                                                                name="filter_d[breakfast]" value="1">
                                                            <label class="form-check-label">
                                                                وجبة افطار </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-6">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox"
                                                                name="filter_d[shwa_req]" value="1">
                                                            <label class="form-check-label">
                                                                معدات شواء </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-6">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox"
                                                                name="filter_d[wifi]" value="1">
                                                            <label class="form-check-label">
                                                                رواتر واي فاى </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-6">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox"
                                                                name="filter_d[coffe]" value="1">
                                                            <label class="form-check-label">
                                                                قهوة وشاى </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-6">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox"
                                                                name="filter_d[hatab]" value="1">
                                                            <label class="form-check-label">
                                                                حطب </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-6">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox"
                                                                name="filter_d[heater]" value="1">
                                                            <label class="form-check-label">
                                                                دفاية غاز </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-6">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox"
                                                                name="filter_d[ele_heater]" value="1">
                                                            <label class="form-check-label">
                                                                دفايه كهرباء </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-6">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox"
                                                                name="filter_d[fahm]" value="1">
                                                            <label class="form-check-label">
                                                                فحم </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-6">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox"
                                                                name="filter_d[biks_easier]" value="1">
                                                            <label class="form-check-label">
                                                                بكس عصير </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-6">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox"
                                                                name="filter_d[kurt_maa]" value="1">
                                                            <label class="form-check-label">
                                                                كرتون ماء </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-6">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox"
                                                                name="filter_d[tanzif]" value="1">
                                                            <label class="form-check-label">
                                                                خدمة تنظيف </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-6">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox"
                                                                name="filter_d[more_bed]" value="1">
                                                            <label class="form-check-label">
                                                                سراير إضافية </label>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>


                                <div class="panel panel-default">
                                    <div class="panel-heading" role="tab" id="heading-3">
                                        <h4 class="panel-title">
                                            <a role="button" data-toggle="collapse" data-parent="#accordion"
                                                href="#collapse-11" aria-expanded="true" aria-controls="collapse-11">
                                                <i class="fa fa-money"></i> مرافق الغسيل والكوى
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapse-11" class="panel-collapse collapse in show" role="tabpanel"
                                        aria-labelledby="heading-3">
                                        <div class="panel-body">

                                            <div class="check">
                                                <div class="row">



                                                    <div class="col-xs-6">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox"
                                                                name="filter_d[washer]" value="1">
                                                            <label class="form-check-label">
                                                                غسالة </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-6">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox"
                                                                name="filter_d[stream_iron]" value="1">
                                                            <label class="form-check-label">
                                                                كواية بخار </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-6">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox"
                                                                name="filter_d[stand_iron]" value="1">
                                                            <label class="form-check-label">
                                                                كواية عادية </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-6">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox"
                                                                name="filter_d[iron_table]" value="1">
                                                            <label class="form-check-label">
                                                                طاولة كواية </label>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>


                                <div class="panel panel-default">
                                    <div class="panel-heading" role="tab" id="heading-3">
                                        <h4 class="panel-title">
                                            <a role="button" data-toggle="collapse" data-parent="#accordion"
                                                href="#collapse-12" aria-expanded="true" aria-controls="collapse-12">
                                                <i class="fa fa-cutlery"></i>مرافق المطبخ
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapse-12" class="panel-collapse collapse in show" role="tabpanel"
                                        aria-labelledby="heading-3">
                                        <div class="panel-body">

                                            <div class="check">
                                                <div class="row">



                                                    <div class="col-xs-6">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox"
                                                                name="filter_d[oven]" value="1">
                                                            <label class="form-check-label">
                                                                فرن </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-6">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox"
                                                                name="filter_d[microwave]" value="1">
                                                            <label class="form-check-label">
                                                                ميكرويف </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-6">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox"
                                                                name="filter_d[coffe_machine]" value="1">
                                                            <label class="form-check-label">
                                                                مكينة قهوة </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-6">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox"
                                                                name="filter_d[water_filings]" value="1">
                                                            <label class="form-check-label">
                                                                برادة ماء </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-6">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox"
                                                                name="filter_d[dishwasher]" value="1">
                                                            <label class="form-check-label">
                                                                غسالة أطباق </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-6">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox"
                                                                name="filter_d[kettle]" value="1">
                                                            <label class="form-check-label">
                                                                غلاية </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-6">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox"
                                                                name="filter_d[cooking_utensils]" value="1">
                                                            <label class="form-check-label">
                                                                أوانى طبخ </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-6">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox"
                                                                name="filter_d[cook_table]" value="1">
                                                            <label class="form-check-label">
                                                                طاولة طعام </label>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>


                                <div class="panel panel-default">
                                    <div class="panel-heading" role="tab" id="heading-3">
                                        <h4 class="panel-title">
                                            <a role="button" data-toggle="collapse" data-parent="#accordion"
                                                href="#collapse-99" aria-expanded="true" aria-controls="collapse-13">
                                                <i class="fa fa-user"></i>طاقم العمل
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapse-99" class="panel-collapse collapse in show" role="tabpanel"
                                        aria-labelledby="heading-3">
                                        <div class="panel-body">

                                            <div class="check">
                                                <div class="row">



                                                    <div class="col-xs-6">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox"
                                                                name="filter_d[cooker]" value="1">
                                                            <label class="form-check-label">
                                                                طباخ </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-6">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox"
                                                                name="filter_d[guard]" value="1">
                                                            <label class="form-check-label">
                                                                حارس </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-6">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox"
                                                                name="filter_d[sayarfis]" value="1">
                                                            <label class="form-check-label">
                                                                سيرفيس </label>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>


                                <div class="panel panel-default" style="display:none;">
                                    <div class="panel-heading" role="tab" id="heading-3">
                                        <h4 class="panel-title">
                                            <a role="button" data-toggle="collapse" data-parent="#accordion"
                                                href="#collapse-0" aria-expanded="true" aria-controls="collapse-125">
                                                <i class="fa fa-envira"></i>نوع التكييف
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapse-0" class="panel-collapse collapse in show" role="tabpanel"
                                        aria-labelledby="heading-3">
                                        <div class="panel-body">

                                            <div class="check">
                                                <div class="row">



                                                    <div class="col-xs-6">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox"
                                                                name="filter_d[centered]" value="1">
                                                            <label class="form-check-label">
                                                                مركزى(بارد - حار) </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-6">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox"
                                                                name="filter_d[cold_centered]" value="1">
                                                            <label class="form-check-label">
                                                                مركزى بارد </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-6">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox"
                                                                name="filter_d[coal_units]" value="1">
                                                            <label class="form-check-label">
                                                                وحدات تكييف </label>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <div class="clearfix text-center">

                                    <button type="submit" class="btn btn-warning">عرض النتائج</button>

                                </div>

                            </form>


                            <br><br>













                        </div>
                    </div>

                </div>

                <div class="col-md-8">
                    <div>
                        <button class="btn btn-primary" id="sort_btn" style="float: right;margin: 6px 6px;    padding-left: 50px;
                            padding-right: 50px;" type="button">ترتيب</button>

                        <button class="btn btn-primary" style="float: left;     padding-left: 50px;display: none;
                            padding-right: 50px;margin: 6px 6px;" type="button" onclick="filter_text()">فلتر</button>
                    </div>


                    <div class="cat-filter" id="sort_div" style="display:none;margin: 50px 0 0 0;text-align: center;">
                        <a class="btn btn-primary  btn-sm  actives "
                            href="https://saeeh.com/index/search_result/1/all?type_v=qasr">الكل</a>
                        <a class="btn btn-primary  btn-sm  "
                            href="https://saeeh.com/index/search_result/1/more_seen?type_v=qasr">الأعلي مشاهدة</a>

                        <a class="btn btn-primary  btn-sm "
                            href="https://saeeh.com/index/search_result/1/less_price?type_v=qasr"
                            style="display:none;">الأقل سعر</a>
                        <a class="btn btn-primary  btn-sm  "
                            href="https://saeeh.com/index/search_result/1/more_price?type_v=qasr"
                            style="display:none;">الأعلي سعر</a>
                        <a class="btn btn-primary  btn-sm  "
                            href="https://saeeh.com/index/search_result/1/more_evaluate?type_v=qasr">الأعلى تقييم</a>
                    </div>

                    <div class="cat-search" style="    margin: 50px 0 20px 0;">

                        <div class="row">
                            @foreach($aparts as $apart)
                            <div class="col-md-12">
                                <div class="all-box">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="icon-view">

                                                <i class="icofont-eye-alt"></i>&nbsp; &nbsp;{{$apart->view}}
                                            </div>
                                            <div class="icon-ads" style="display:none;">
                                                إعلان
                                            </div>


                                            <div class="carousel-post owl-carousel owl-theme owl-rtl owl-loaded">




                                                <div class="owl-stage-outer">
                                                    <div class="owl-stage"
                                                        style="transform: translate3d(0px, 0px, 0px); transition: all 0s ease 0s; width: 266px;">
                                                        <div class="owl-item active"
                                                            style="width: 236px; margin-left: 30px;">
                                                            <div class="item">
                                                                @if($apart->image)
                                                                <a href="{{route('front.detail',$apart->id)}}"> <img
                                                                        class="img-fluid"
                                                                        src="{{asset('storage/'.$apart->image)}}"></a>
                                                                @else
                                                                <a href="{{route('front.detail',$apart->id)}}"> <img
                                                                        class="img-fluid"
                                                                        src="https://saeeh.com/upload/8d75de354936343be319266dcfcd19da.jpeg"></a>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- <div class="owl-controls">
                                                    <div class="owl-nav">
                                                        <div class="owl-prev" style="display: none;"><i
                                                                class="bx bxs-chevron-right"></i></div>
                                                        <div class="owl-next" style="display: none;"><i
                                                                class="bx bxs-chevron-left"></i></div>
                                                    </div>
                                                    <div class="owl-dots" style="">
                                                        <div class="owl-dot active"><span></span></div>
                                                    </div>
                                                </div> -->
                                            </div>
                                        </div>
                                        <div class="col-md-7">
                                            <div class="bord-left">
                                                <div class="row">
                                                    <div class="col-md-6 col-xs-6">
                                                        <div class="details">
                                                            <ul class="list-unstyled">
                                                                <li><strong> ( {{$apart->floor}}
                                                                        ){{$apart->name}}</strong></li>

                                                                <li style="display:none;"><a
                                                                        href="https://saeeh.com/aqar/details/139"> </a>
                                                                </li>
                                                                <li> <strong>
                                                                        {{$apart->types->name}}



                                                                    </strong>
                                                                </li>






                                                                <style>
                                                                .checked {
                                                                    color: orange;
                                                                }
                                                                </style>





                                                            </ul>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6 col-xs-6 ">
                                                        <div class="details">
                                                            <ul class="list-unstyled">






                                                            </ul>
                                                            <div class="button-search">
                                                                <a class="btn btn-primary"
                                                                    href="{{route('front.detail',$apart->id)}}"
                                                                    target="_blank"> تفاصيل</a>



                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="details">
                                                        <ul class="list-unstyled">

                                                            <li class="d-flex">


                                                                <span style="  font-size: 15px; "> السعر:</span>
                                                                <strong>
                                                                    @if($apart->type=='day')
                                                                    {{json_decode($apart->day_p)[0]->day.' د.ك لليوم العادى' }}
                                                                    </br>
                                                                    {{json_decode($apart->day_p)[0]->week . ' د.ك لليوم للعطله' }}

                                                                    @elseif($apart->type=='week')
                                                                    {{json_decode($apart->week_p)[0]->price.' د.ك بدايه الاسبوع' }}
                                                                    </br>
                                                                    {{json_decode($apart->week_p)[1]->price .'  د.ك نهايه الاسبوع'  }}
                                                                    </br>
                                                                    {{json_decode($apart->week_p)[2]->price .' د.ك الاسبوع كامل'  }}
                                                                    @endif
                                                                </strong>

                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>


                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>

                    </div>

                </div>

            </div>
        </div>
    </main>

    @push('scripts')
    <script>
    $(document).ready(function() {
        $('#search_btn').on('click', function() {
            $('#search_div').toggle();
        })
        $('#sort_btn').on('click', function() {
            $('#sort_div').toggle();
        })


    });
    </script>
    @endpush
</x-app>