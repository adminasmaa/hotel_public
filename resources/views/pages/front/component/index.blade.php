<x-app>

    <!-- ======= Hero Section ======= -->
    <section id="hero">
        <!-- ==search-bar== -->
        <div class="search-bar text-center">
            <div class="container">
                <div class="all-bar">


                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab"
                                data-toggle="tab"><i class="fa fa-home fa-fw"></i> فلل و شقق</a></li>
                        <li role="presentation"><a href="#car" class="baccolor" aria-controls="profile" role="tab"
                                data-toggle="tab"><i class="fa fa-car fa-fw"></i> تأجير سيارات</a></li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">

                        <div role="tabpanel" class="tab-pane active" id="home">


                            <form>
                                <div class="form-row align-items-center">
                                    <div class="col-sm-3 my-1">
                                        <select class="form-control input-lg">
                                            <option value="none" selected="">نوع العقار...</option>
                                            <option>فيلا</option>
                                            <option>شقة</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-3 my-1">
                                        <div class="input-group">
                                            <input class="form-control input-lg" id="exampleInputName2"
                                                placeholder="ساعة الوصول" type="text">
                                        </div>
                                    </div>
                                    <div class="col-sm-3 my-1">
                                        <div class="input-group">
                                            <input class="form-control input-lg" id="exampleInputName2"
                                                placeholder="ساعة المغادرة" type="text">
                                        </div>
                                    </div>
                                    <div class="col-sm-2 my-1">
                                        <select class="form-control input-lg">
                                            <option value="none" selected="">عدد الغرف...</option>
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-1 my-1">
                                        <button type="submit" class="btn btn-primary">بحث</button>
                                    </div>
                                </div>
                            </form>





                        </div>


                        <div role="tabpanel" class="tab-pane baccolor" id="car">


                            <form>
                                <div class="form-row align-items-center">

                                    <div class="col-sm-3 my-1">
                                        <select class="form-control input-lg">
                                            <option value="none" selected="">المدينة...</option>
                                            <option>مصر</option>
                                            <option>الكويت</option>
                                            <option>السعودية</option>
                                        </select>
                                    </div>

                                    <div class="col-sm-3 my-1">
                                        <select class="form-control input-lg">
                                            <option value="none" selected=""> الماركة...</option>
                                            <option>مرسيدس</option>
                                            <option>هيونداي</option>
                                            <option>كيا</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-3 my-1">
                                        <select class="form-control input-lg">
                                            <option value="none" selected="">الفئة...</option>
                                            <option>1</option>
                                            <option>1</option>
                                            <option>1</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-2 my-1">
                                        <select class="form-control input-lg">
                                            <option value="none" selected="">السنه ...</option>
                                            <option>2019</option>
                                            <option>2019</option>
                                            <option>2019</option>
                                        </select>
                                    </div>

                                    <div class="col-auto my-1">
                                        <button type="submit" class="btn btn-primary">بحث</button>
                                    </div>
                                </div>
                            </form>




                        </div>

                    </div>


                </div>
            </div>
        </div>
        <!-- ==search-bar== -->


    </section><!-- End Hero -->

    <main id="main">
        <!-- ======= product-grid ======= -->
        <div class="product-grid-all">
            <div class="container">
                <div class="row">

                    <div class="col-md-3 col-xs-6">
                        <div class="box">
                            <img src="{{asset('assets/front/img/product/01.jpg')}}">
                            <div class="box-content">
                                <h3 class="title">مطاعم</h3>
                            </div>
                            <ul class="icon">
                                <li><a href="#"><i class="fa fa-eye"></i> 20</a></li>
                                <li><a href="#"><i class="fa fa-star"></i> 5</a></li>
                            </ul>
                        </div>
                    </div>


                    <div class="col-md-3 col-xs-6">
                        <div class="box">
                            <img src="{{asset('assets/front/img/product/02.jpg')}}">
                            <div class="box-content">
                                <h3 class="title">أماكن سياحية</h3>
                            </div>
                            <ul class="icon">
                                <li><a href="#"><i class="fa fa-eye"></i> 20</a></li>
                                <li><a href="#"><i class="fa fa-star"></i> 5</a></li>
                            </ul>
                        </div>
                    </div>


                    <div class="col-md-3 col-xs-6">
                        <div class="box">
                            <img src="{{asset('assets/front/img/product/04.jpg')}}">
                            <div class="box-content">
                                <h3 class="title">حمامات مغربية</h3>
                            </div>
                            <ul class="icon">
                                <li><a href="#"><i class="fa fa-eye"></i> 20</a></li>
                                <li><a href="#"><i class="fa fa-star"></i> 5</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-md-3 col-xs-6">
                        <div class="box">
                            <img src="{{asset('assets/front/img/product/05.jpg')}}">
                            <div class="box-content">
                                <h3 class="title">مسابح </h3>
                            </div>
                            <ul class="icon">
                                <li><a href="#"><i class="fa fa-eye"></i> 20</a></li>
                                <li><a href="#"><i class="fa fa-star"></i> 5</a></li>
                            </ul>
                        </div>
                    </div>


                    <div class="col-md-3 col-xs-6">
                        <div class="box">
                            <img src="{{asset('assets/front/img/product/06.jpg')}}">
                            <div class="box-content">
                                <h3 class="title">كافيهات </h3>
                            </div>
                            <ul class="icon">
                                <li><a href="#"><i class="fa fa-eye"></i> 20</a></li>
                                <li><a href="#"><i class="fa fa-star"></i> 5</a></li>
                            </ul>
                        </div>
                    </div>



                    <div class="col-md-3 col-xs-6">
                        <div class="box">
                            <img src="{{asset('assets/front/img/product/022.jpg')}}">
                            <div class="box-content">
                                <h3 class="title">مقاهي </h3>
                            </div>
                            <ul class="icon">
                                <li><a href="#"><i class="fa fa-eye"></i> 20</a></li>
                                <li><a href="#"><i class="fa fa-star"></i> 5</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-md-3 col-xs-6">
                        <div class="box">
                            <img src="{{asset('assets/front/img/product/07.jpg')}}">
                            <div class="box-content">
                                <h3 class="title">مقناص </h3>
                            </div>
                            <ul class="icon">
                                <li><a href="#"><i class="fa fa-eye"></i> 20</a></li>
                                <li><a href="#"><i class="fa fa-star"></i> 5</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-md-3 col-xs-6">
                        <div class="box">
                            <img src="{{asset('assets/front/img/product/08.jpg')}}">
                            <div class="box-content">
                                <h3 class="title">مستشفيات </h3>
                            </div>
                            <ul class="icon">
                                <li><a href="#"><i class="fa fa-eye"></i> 20</a></li>
                                <li><a href="#"><i class="fa fa-star"></i> 5</a></li>
                            </ul>
                        </div>
                    </div>


                    <div class="col-md-3 col-xs-6">
                        <div class="box">
                            <img src="{{asset('assets/front/img/product/09.jpg')}}">
                            <div class="box-content">
                                <h3 class="title">صيدليات </h3>
                            </div>
                            <ul class="icon">
                                <li><a href="#"><i class="fa fa-eye"></i> 20</a></li>
                                <li><a href="#"><i class="fa fa-star"></i> 5</a></li>
                            </ul>
                        </div>
                    </div>


                    <div class="col-md-3 col-xs-6">
                        <div class="box">
                            <img src="{{asset('assets/front/img/product/010.jpg')}}">
                            <div class="box-content">
                                <h3 class="title">مرشد سياحي </h3>
                            </div>
                            <ul class="icon">
                                <li><a href="#"><i class="fa fa-eye"></i> 20</a></li>
                                <li><a href="#"><i class="fa fa-star"></i> 5</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-md-3 col-xs-6">
                        <div class="box">
                            <img src="{{asset('assets/front/img/product/011.jpeg')}}">
                            <div class="box-content">
                                <h3 class="title">خدمات توصيل </h3>
                            </div>
                            <ul class="icon">
                                <li><a href="#"><i class="fa fa-eye"></i> 20</a></li>
                                <li><a href="#"><i class="fa fa-star"></i> 5</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-md-3 col-xs-6">
                        <div class="box">
                            <img src="{{asset('assets/front/img/product/012.jpg')}}">
                            <div class="box-content">
                                <h3 class="title">سيارات أجرة </h3>
                            </div>
                            <ul class="icon">
                                <li><a href="#"><i class="fa fa-eye"></i> 20</a></li>
                                <li><a href="#"><i class="fa fa-star"></i> 5</a></li>
                            </ul>
                        </div>
                    </div>


                    <div class="col-md-3 col-xs-6">
                        <div class="box">
                            <img src="{{asset('assets/front/img/product/013.jpg')}}">
                            <div class="box-content">
                                <h3 class="title">أفضل طيران </h3>
                            </div>
                            <ul class="icon">
                                <li><a href="#"><i class="fa fa-eye"></i> 20</a></li>
                                <li><a href="#"><i class="fa fa-star"></i> 5</a></li>
                            </ul>
                        </div>
                    </div>



                    <div class="col-md-3 col-xs-6">
                        <div class="box">
                            <img src="{{asset('assets/front/img/product/014.jpg')}}">
                            <div class="box-content">
                                <h3 class="title">مكاتب حجز طيران</h3>
                            </div>
                            <ul class="icon">
                                <li><a href="#"><i class="fa fa-eye"></i> 20</a></li>
                                <li><a href="#"><i class="fa fa-star"></i> 5</a></li>
                            </ul>
                        </div>
                    </div>


                    <div class="col-md-3 col-xs-6">
                        <div class="box">
                            <img src="{{asset('assets/front/img/product/020.jpg')}}">
                            <div class="box-content">
                                <h3 class="title">مكاتب حولات</h3>
                            </div>
                            <ul class="icon">
                                <li><a href="#"><i class="fa fa-eye"></i> 20</a></li>
                                <li><a href="#"><i class="fa fa-star"></i> 5</a></li>
                            </ul>
                        </div>
                    </div>


                    <div class="col-md-3 col-xs-6">
                        <div class="box">
                            <img src="{{asset('assets/front/img/product/015.jpg')}}">
                            <div class="box-content">
                                <h3 class="title"> خدمات مجانية </h3>
                            </div>
                            <ul class="icon">
                                <li><a href="#"><i class="fa fa-eye"></i> 20</a></li>
                                <li><a href="#"><i class="fa fa-star"></i> 5</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-md-3 col-xs-6">
                        <div class="box">
                            <img src="{{asset('assets/front/img/product/016.jpg')}}">
                            <div class="box-content">
                                <h3 class="title"> تسوق </h3>
                            </div>
                            <ul class="icon">
                                <li><a href="#"><i class="fa fa-eye"></i> 20</a></li>
                                <li><a href="#"><i class="fa fa-star"></i> 5</a></li>
                            </ul>
                        </div>
                    </div>


                    <div class="col-md-3 col-xs-6">
                        <div class="box">
                            <img src="{{asset('assets/front/img/product/017.jpg')}}">
                            <div class="box-content">
                                <h3 class="title"> صالون حلاقة </h3>
                            </div>
                            <ul class="icon">
                                <li><a href="#"><i class="fa fa-eye"></i> 20</a></li>
                                <li><a href="#"><i class="fa fa-star"></i> 5</a></li>
                            </ul>
                        </div>
                    </div>


                    <div class="col-md-3 col-xs-6">
                        <div class="box">
                            <img src="{{asset('assets/front/img/product/018.jpg')}}">
                            <div class="box-content">
                                <h3 class="title"> مغسلة ملابس </h3>
                            </div>
                            <ul class="icon">
                                <li><a href="#"><i class="fa fa-eye"></i> 20</a></li>
                                <li><a href="#"><i class="fa fa-star"></i> 5</a></li>
                            </ul>
                        </div>
                    </div>


                    <div class="col-md-3 col-xs-6">
                        <div class="box">
                            <img src="{{asset('assets/front/img/product/019.jpg')}}">
                            <div class="box-content">
                                <h3 class="title"> مواد غذائية </h3>
                            </div>
                            <ul class="icon">
                                <li><a href="#"><i class="fa fa-eye"></i> 20</a></li>
                                <li><a href="#"><i class="fa fa-star"></i> 5</a></li>
                            </ul>
                        </div>
                    </div>


                    <div class="col-md-3 col-xs-6">
                        <div class="box">
                            <img src="{{asset('assets/front/img/product/020.jpg')}}">
                            <div class="box-content">
                                <h3 class="title"> تحويلات عملات </h3>
                            </div>
                            <ul class="icon">
                                <li><a href="#"><i class="fa fa-eye"></i> 20</a></li>
                                <li><a href="#"><i class="fa fa-star"></i> 5</a></li>
                            </ul>
                        </div>
                    </div>


                    <div class="col-md-3 col-xs-6">
                        <div class="box">
                            <img src="{{asset('assets/front/img/product/023.jpg')}}">
                            <div class="box-content">
                                <h3 class="title"> وكلائنا بالخليج </h3>
                            </div>
                            <ul class="icon">
                                <li><a href="#"><i class="fa fa-eye"></i> 20</a></li>
                                <li><a href="#"><i class="fa fa-star"></i> 5</a></li>
                            </ul>
                        </div>
                    </div>





                </div>
            </div>
        </div>
        <!-- End product-grid Section -->






        <!-- ======= we-provide Section ======= -->
        <div class="we-provide">
            <div class="container">
                <h3 class="maintitle"> ماذا نوفر لك ؟</h3>
                <div class="maincontent">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="box">
                                <div class="icon">
                                    <img class="" src="{{asset('assets/front/img/ic1.png')}}">
                                </div>
                                <strong> حجز مؤكد ومضمون </strong>
                                <p>حجزك مضمون بنسبة ١٠٠٪</p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="box">
                                <div class="icon">
                                    <img class="" src="{{asset('assets/front/img/ic3.png')}}">
                                </div>
                                <strong> خدمة عملاء </strong>
                                <p>ندعمك على مدار الاسبوع</p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="box">
                                <div class="icon">
                                    <img class="" src="{{asset('assets/front/img/ic4.png')}}">
                                </div>
                                <strong> تقييمات موثوقة </strong>
                                <p>تقييمات وتعليقات مصدقة</p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="box">
                                <div class="icon">
                                    <img class="" src="{{asset('assets/front/img/ic5.png')}}">
                                </div>
                                <strong> بحث متقدم وذكى </strong>
                                <p>كل انواع البحث بين يديك</p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- End we-provide Section -->



        <!-- ======= app Section ======= -->
        <div class="app">
            <div class="container">
                <h3 class="maintitle"> حمل التطبيق الان</h3>
                <div class="maincontent">
                    <div class="row">
                        <div class="col-md-6">
                            <p>متوفر على الـ app store و الـ andriod</p>
                            <div class="row">
                                <div class="col-md-6">
                                    <a href="#"><img src="{{asset('assets/front/img/googleplay.png')}}"
                                            class="img-fluid"></a>
                                </div>
                                <div class="col-md-6">
                                    <a href="#"><img src="{{asset('assets/front/img/appstore.png')}}"
                                            class="img-fluid"></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <img class="img-fluid mob" src="{{asset('assets/front/img/Component61–1.png')}}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End app Section -->



    </main><!-- End #main -->
</x-app>