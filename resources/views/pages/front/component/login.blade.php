<x-app>
    @push('css')
    <style>
    .iti {
        width: 100% !important;
    }
    </style>
    @endpush
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <ol>
                    <li><a href="https://saeeh.com/">الرئيسية</a></li>
                    <li>تسجيل دخول عميل</li>
                </ol>
            </div>

        </div>
    </section>
    <main id="main">
        <div class="viewjoin">

            <div class="container">
                <div class="row" style="margin:30px">
                    <div class="col-md-12">
                        @if($errors->any())
                        <h5 class="alert alert-danger text-center rtl">
                            <i class="fa fa-lock fa-fw fa-spin icn-xs"></i>خطأفى بيانات الادخال
                        </h5>
                        @endif
                        <h4 class="text-center">تسجيل دخول</h4>
                        <style>
                        .viewjoin .userjoin {

                            height: 90%;
                        }

                        .phone .btn,
                        .btn-lg {
                            padding: 5px;
                            margin-top: 10px;
                        }
                        </style>
                        <div class="phone userjoin" style="padding-top:55px;padding-bottom:55px">
                            <p>أدخل رقم الهاتف وكلمة المرور لإنشاء حساب أو تسجيل الدخول</p>
                            <h5>أدخل رقم جوالك</h5>
                            <form action="{{route('front.login')}}" enctype="multipart/form-data" method="post">
                                @csrf
                                <input type="tel" class="mobileNumber form-control" maxlength="20" id="lb_phone"
                                    value="" name="phone" title="">
                                <br><br>
                                <input class="mobileNumber" id="password" name="password" placeholder="كلمة المرور"
                                    type="password">

                                <div class="button-phone text-center">
                                    <button type="submit" class="btn btn-primary btn-lg">دخول</button>
                                </div>

                            </form>
                        </div>

                    </div>

                </div>
            </div>

        </div>
    </main>

    @push('scripts')
    <script>
    var phone_number = window.intlTelInput(document.querySelector("#lb_phone"), {
        separateDialCode: true,
        formatOnDisplay: true,
        preferredCountries: ["kw"],
        hiddenInput: "full",
        utilsScript: "{{asset('assets/front/vendor/intl-input/js/utils.js?1562189064761')}}"
    });

    $('.custom-image').on('click', function() {

        swal({

            title: '',

            text: 'عفواّ تم تقييم هذا الاعلان من قبل .',

            imageUrl: 'https://7agz.com/public/alert-icon-1562.png',

            imageWidth: 400,

            imageHeight: 200,

            imageAlt: 'Custom image',

            animation: false,

            confirmButtonText: 'إلغاء',

            padding: '2em'

        })

    });
    </script>

    @endpush
</x-app>