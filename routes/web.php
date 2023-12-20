<?php

use App\Http\Controllers\accounting\Bill\BillController;
use App\Http\Controllers\accounting\Bill\BillsSubTypeController;
use App\Http\Controllers\accounting\Bill\BillsTypeController;
use App\Http\Controllers\accounting\ChecksController;
use App\Http\Controllers\accounting\loans\LoanBranchesController;
use App\Http\Controllers\accounting\loans\LoansController;
use App\Http\Controllers\Ads\AdsController;
use App\Http\Controllers\apartment\ApartmentController;
use App\Http\Controllers\apartment\ApartTypeController;
use App\Http\Controllers\apartment\BedTypeController;
use App\Http\Controllers\apartment\ContentController;
use App\Http\Controllers\apartment\HomeContentController;
use App\Http\Controllers\apartment\PriceController;
use App\Http\Controllers\apartment\ViewTypeController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\Checkall\AnswerController;
use App\Http\Controllers\Checkall\CheckallController;
use App\Http\Controllers\Checkall\CheckallTypeController;
use App\Http\Controllers\main\ClassesController;
use App\Http\Controllers\clients\ClientsController;
use App\Http\Controllers\clients\ClientApproveController;
use App\Http\Controllers\clients\ClientStatusController;
use App\Http\Controllers\Commitment\CommitmentController;
use App\Http\Controllers\Commitment\CommitmentSectionController;
use App\Http\Controllers\main\CompanyController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactMessagController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\filemanger\FilesDeptsController;
use App\Http\Controllers\filemanger\FilesmangerController;
use App\Http\Controllers\filemanger\FilesTypesController;
use App\Http\Controllers\Front\FrontController;
use App\Http\Controllers\GuaranteeController;
use App\Http\Controllers\hr\AttendanceEmployeController;
use App\Http\Controllers\hr\AwardDiscountController;
use App\Http\Controllers\hr\BankController;
use App\Http\Controllers\hr\BranchController;
use App\Http\Controllers\hr\EmployeeController;
use App\Http\Controllers\hr\EmployeeNotesController;
use App\Http\Controllers\hr\EmployeeStatusController;
use App\Http\Controllers\hr\FileMangerController;
use App\Http\Controllers\hr\JobTitleController;
use App\Http\Controllers\hr\MessageController;
use App\Http\Controllers\hr\NationalityController;
use App\Http\Controllers\hr\ProfessionController;
use App\Http\Controllers\hr\ProfileController;
use App\Http\Controllers\hr\QualificationController;
use App\Http\Controllers\hr\ReportController;
use App\Http\Controllers\hr\StatisticController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\Maintenance\MaintenanceController;
use App\Http\Controllers\Maintenance\MaintenanceRequireController;
use App\Http\Controllers\main\MarksController;
use App\Http\Controllers\main\ProductController;
use App\Http\Controllers\rating\RatingController;
use App\Http\Controllers\rating\RatingQuestionsController;
use App\Http\Controllers\rating\RatingTypesController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\main\TypesController;
use App\Http\Controllers\MakepermissionController;
use App\Http\Middleware\EmployeePermission;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

Route::get('/linkstorage', function () {
    Artisan::call('storage:link');
});

Route::group(['namespace' => 'App\Http\Controllers'], function () {

    Route::middleware('auth:web')->group(function () {

        Route::get('/', [HomeController::class,'index'])->name('home.index');
        Route::get('/dashboard',  [HomeController::class,'index'])->middleware(['auth', 'verified'])->name('dashboard');

        Route::get('/logout', [LogoutController::class,'perform'])->name('logout.perform');

        Route::middleware([EmployeePermission::class])->group(function () {
            ///////////////////////////////////////setting  routes/////////////////////////////////
            Route::get('employees/setting', function () {
                return view('pages.setting.index');
            })->name('setting');

            Route::group(['prefix' => 'employees/setting'], function () {
                Route::Resource('qualifications', QualificationController::class);
                Route::Resource('jobTitles', JobTitleController::class);
                Route::Resource('employeestatuses', EmployeeStatusController::class);
                Route::Resource('professions', ProfessionController::class);
                Route::Resource('nationalities', NationalityController::class);
                Route::Resource('banks', BankController::class);
                //roles

            });
            Route::Resource('branches', BranchController::class);
            Route::resource('roles', RolesController::class);
            ///////////////////////////////////////end setting  routes/////////////////////////////////
            ////////////////////////////////////// main account routes///////////////////////
            Route::Resource('companies', CompanyController::class)->except('show');
            Route::Resource('classes', ClassesController::class)->except('show');
            Route::Resource('marks', MarksController::class);
            Route::Resource('products', ProductController::class)->except('show');
            Route::get('products/setting', function () {
                return view('pages.setting.index');
            })->name('products.setting');
            Route::group(['prefix' => 'products/setting'], function () {
                Route::resource('countries', CountryController::class);
                Route::resource('guarantees', GuaranteeController::class);
            });
            Route::Resource('classes/types', TypesController::class);
            Route::get('products/getclasstype/{id}', [TypesController::class, 'get_type_class'])->name('products.getclasstype');

            ////////////////////////////////////// end main account routes///////////////////////
            /// clients routes
            Route::Resource('clients', ClientsController::class)->except('show');
            Route::get('clients/setting', function () {

                // return redirect()->route('roles.index');

                return view('pages.setting.index');
            })->name('client.setting');
            Route::get('clients/show/{id}', [ClientsController::class, 'show'])->name('clients.show');
            Route::group(['prefix' => 'clients/setting'], function () {
                Route::Resource('approves', ClientApproveController::class);
                Route::Resource('clientStatuses', ClientStatusController::class);
                Route::Resource('cnationalities', NationalityController::class);

            });

            Route::get('/getdata/{id}', [ClientsController::class, 'getdata'])->name('clients.getdata');
            Route::post('/blackListClients/{id}', [ClientsController::class, 'store_black'])->name('clients.store_black');
            Route::get('/removeblackList/{id}', [ClientsController::class, 'remove_black'])->name('clients.remove_black');

            /// end clients routes

            ////////////////employee routes////////////////////////////////////////
            Route::Resource('employees', EmployeeController::class)->except('show');
            Route::get('employees/profile/{id?}', [ProfileController::class, 'edit'])->name('profile.edit');
            Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
            Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

            Route::group(['prefix' => 'employees'], function () {
                Route::get('reports/{id?}', [ReportController::class, 'index'])->name('reports.index');
                Route::post('/messages', [MessageController::class, 'store'])->name('messages.store');
                Route::get('/messages', [MessageController::class, 'index'])->name('messages.index');

                // EmployeAttendance routes
                Route::resource('EmployeAttendance', AttendanceEmployeController::class);
                Route::get('/ShowEmployeAttendance/{id?}', [AttendanceEmployeController::class, 'get_employe_attendance'] )->name('ShowEmployeAttendance');
                // end EmployeAttendance routes

                ///// statistic employee routes
                Route::get('statistic', [StatisticController::class, 'index'])->name('statistics.index');
                Route::get('statistic/security', [StatisticController::class, 'security'])->name('statistics.security');
                Route::get('statistic/egypt_license', [StatisticController::class, 'egypt_license'])->name('statistics.egypt_license');
                Route::get('statistic/kuwait_license', [StatisticController::class, 'kuwait_license'])->name('statistics.kuwait_license');
                Route::get('statistic/employee_statistic', [StatisticController::class, 'employee_statistic'])->name('statistics.employee_statistic');
                Route::get('statistic/uniform', [StatisticController::class, 'uniform'])->name('statistics.uniform');
                Route::get('statistic/living', [StatisticController::class, 'living'])->name('statistics.living');
                Route::get('statistic/bank', [StatisticController::class, 'bank'])->name('statistics.bank');
                ///////////////end statistic employee///////////////////////////
                ///////////////start file manager///////////////
                Route::get('fileManager/{id?}', [FileMangerController::class, 'index'])->name('filemanager.index');
                Route::post('fileManager', [FileMangerController::class, 'store'])->name('filemanager.store');
                Route::post('fileManager/{id}', [FileMangerController::class, 'destroy'])->name('filemanager.destroy');
                /////////////////end file manager/////////////
                //////////////////////////////// start of EmployeeNotes  ////////////////////////////////////

                Route::resource('EmployeeNotes', EmployeeNotesController::class)->except('show');
                Route::get('EmployeeNotes/show/{branch?}', [EmployeeNotesController::class, 'show'])->name('EmployeeNotes.show');
                Route::post('EmployeeNotes/restore/{id}', [EmployeeNotesController::class, 'restore'])->name('EmployeeNotes.restore');

                ////////////////////////////////////////////////AwardDiscount/////////////
                Route::resource('awardDiscounts', AwardDiscountController::class)->except('show');
                Route::get('awardDiscounts/show/{awardDiscount}', [AwardDiscountController::class, 'show'])->name('awardDiscounts.show');
                Route::post('awardDiscounts/status/{awardDiscount}', [AwardDiscountController::class, 'changeStatus'])->name('awardDiscounts.changeStatus');
            });

            ///////////////end employee///////////////////////////
            ///  starts of apartments routes
            Route::Resource('apartments', ApartmentController::class)->except('show');
            /// homeContents routes
            Route::get('apartments/setting', function () {
                return view('pages.setting.index');
            })->name('apartments.setting');
            Route::group(['prefix' => 'apartments/setting'], function () {
                Route::resource('bedTypes', BedTypeController::class);
                Route::resource('viewTypes', ViewTypeController::class);
                Route::resource('apartTypes', ApartTypeController::class)->middleware('auth:web');
                Route::post('apartTypes/getApart/{apartType}', [ApartTypeController::class, 'getApart'])->name('apartTypes.getapart');

                Route::Resource('homeContents', HomeContentController::class)->except('show');
                Route::view('homeContents/chooseContent', 'pages.apartments.homeContents.chooseContent')->name('homeContents.chooseContent');
                Route::post('homeContents/chooseContent', [HomeContentController::class, 'chooseContent'])->name('homeContents.chooseContent');
            });
            Route::group(['prefix' => 'apartments'], function () {
                Route::post('apartments/getValue/{id}', [ApartmentController::class, 'getValue'])->name('aparts.getValue');
                Route::Resource('prices', PriceController::class);

                Route::post('prices/discount', [PriceController::class, 'discount'])->name('prices.discount');
                ////////////////////////////contents routes/////////////
                Route::Resource('contents', ContentController::class);
                Route::delete('/remove/{apartment}/{content}', [ContentController::class, 'remove'])->name('contents.remove');

                Route::get('contents/image/{apartment}', [ApartmentController::class, 'contentImage'])->name('contents.image');
                Route::post('contents/image/{apartment}', [ApartmentController::class, 'saveContentImage'])->name('contents.image');
                Route::post('contents/save/image', [ApartmentController::class, 'saveImage'])->name('contents.save.image');
                Route::get('contents/deleteImage/{id}', [ApartmentController::class, 'deleteContentImage'])->name('contents.deleteImage');
                ///  end of apartments routes
            });

///////////////////////////maintenance/////////////////
            Route::get('apartments/maintenances/setting', function () {
                return view('pages.setting.index');
            })->name('maintenances.setting');
            Route::group(['prefix' => 'apartments/maintenances/setting'], function () {
                Route::resource('maintenanceRequires', MaintenanceRequireController::class);
            });
            Route::resource('apartments/maintenances', MaintenanceController::class);
            Route::post('apartments/maintenances/expired/{maintenance}', [MaintenanceController::class, 'expired'])->name('maintenances.expired');

            ////////////////checkall////////////////////

            Route::get('answers/addAnswer', [AnswerController::class, 'addAnswer'])->name('answers.addAnswer');

            Route::post('checkalls/answers/saveAnswer', [CheckallController::class, 'saveAnswer'])->name('checkall.answer.saveAnswer');

            Route::Resource('answers', AnswerController::class)->except('show');
            Route::group(['prefix' => 'answers'], function () {
                Route::Resource('checkallTypes', CheckallTypeController::class)->except('show');
                Route::Resource('checkallTypes/checkalls', CheckallController::class)->except('show');
                Route::get('/ShowAnswerStatistics',  [AnswerController::class, 'Get_Statistics_answer'])->name('ShowAnswerStatistics');
                Route::get('/ShowAnswerStatisticsEmp',  [AnswerController::class, 'Get_Statistics_answer_emp'])->name('ShowAnswerStatisticsEmp');
                Route::post('selectType', [AnswerController::class, 'selectType'])->name('answers.selectType');
                Route::get('get_v/{id?}', [AnswerController::class, 'answerForm'])->name('answers.get_v');
                Route::get('show/{id?}', [AnswerController::class, 'show'])->name('answers.show');
                Route::post('answer/saveimage', [AnswerController::class, 'saveimage'])->name('answers.answer.saveimage');

            });

            //////////////////////////// Rating ////////////
            Route::Resource('rating', RatingController::class)->except('show');
            Route::get('rating/show/{rating}', [RatingController::class, 'show'])->name('rating.show');
            Route::get('add_rate', [RatingController::class, 'add_rate'])->name('rating.add_rate');
            Route::get('rating/getEmployees/{id?}', [RatingController::class, 'getEmployees'])->name('rating.getEmployees');
            Route::get('rating/getTypes/{id?}', [RatingController::class, 'getTypes'])->name('rating.getTypes');
            Route::post('rating/remove_img/{id?}', [RatingController::class, 'remove_img'])->name('rating.remove_img');
            Route::post('rating/doupload',[RatingController::class, 'doupload'] )->name('rating.doupload');
            Route::get('showRatings/{id?}', [RatingController::class, 'showRatings'])->name('rating.showRatings');
            Route::group(['prefix' => 'rating'], function () {
                Route::Resource('rating_questions', RatingQuestionsController::class);
                Route::get('rating_questions/getTypes/{id?}', [RatingQuestionsController::class, 'getTypes'])->name('rating_questions.getTypes');
                Route::Resource('rating_types', RatingTypesController::class);
                Route::get('/ShowRatingStatistics', [RatingController::class, 'get_employe_attendance'] )->name('ShowRatingStatistics');
            });

            //Set_Role_permissions
            Route::get('/ShowRoles/{id?}', [MakepermissionController::class, 'index'])->name('ShowRoles');
            Route::get('/StoreRolesPermission/{id?}', [MakepermissionController::class, 'StorePermission'])->name('StoreRolesPermission');
            ///////////////////////////////////////setting/////////////////////////////////
            ///
            /// files_manger

            Route::Resource('filesmanger', FilesmangerController::class)->except('show');
            Route::get('filesmanger/restore/{id?}', [FilesmangerController::class, 'restore'])->name('filesmanger.restore');
            Route::get('filesmanger/delete/{id?}', [FilesmangerController::class, 'delete'])->name('filesmanger.delete');

            Route::get('filesmanger/setting', function () {
                return view('pages.setting.index');
            })->name('filesmanger.setting');
            Route::group(['prefix' => 'filesmanger/setting'], function () {
                Route::Resource('filesTypes', FilesTypesController::class);
                Route::Resource('filesDepts', FilesDeptsController::class);

                //filesmanger

            });

            // ghada Loans
            




            /////////////////////Commitment
            Route::Resource('commitments', CommitmentController::class)->except('show');
            /// homeContents routes
            Route::get('commitments/setting', function () {
                return view('pages.setting.index');
            })->name('commitments.setting');
            Route::group(['prefix' => 'commitments/setting'], function () {
                Route::resource('commitmentSections', CommitmentSectionController::class);
            });
            //////////////////group accounting

            Route::group(['prefix' => 'accounting'], function () {
                
                ///////////////bill
                Route::group(['prefix' => 'bills'], function () {

                    Route::get('/setting', function () {
                        return view('pages.setting.index');
                    })->name('bills.setting');
                    Route::group(['prefix' => '/setting'], function () {
                        Route::resource('billsTypes/billsSubTypes', BillsSubTypeController::class);
                        Route::post('billsSubTypes/getType/{billsType}', [BillsSubTypeController::class, 'getSubTypes'])->name('billsSubTypes.getType');
                        Route::resource('billsTypes', BillsTypeController::class);
                    });
                    Route::get('/statistic', [BillController::class, 'statistic'])->name('bills.statistic');
                });
                Route::Resource('bills', BillController::class);
                ////////////////////////////////// Checks star /////////////////////
   
                Route::group(['prefix' => 'checks'], function () { 
                    Route::get('checks/cashed/{id}', [ChecksController::class, 'cashed'])->name('checks.cashed');
                Route::get('checks/duplicate/{id}', [ChecksController::class, 'duplicate'])->name('checks.duplicate');
                });
                
                Route::Resource('checks', ChecksController::class);

                 //////////////////////loans

                Route::resource('loans', LoansController::class)->except('show');
                Route::group(['prefix' => 'loans'], function () {
                    Route::resource('loanbranches', LoanBranchesController::class);
                    Route::get('ShowDetails/{id?}',[LoansController::class, 'show'] )->name('ShowDetails');
                    Route::get('change_status/{id?}', [LoansController::class, 'change_status'])->name('change_status');

                    Route::get('setting', function () {
                        return view('pages.setting.index');
                    })->name('loans.setting');
                    Route::group(['prefix' => 'setting'], function () {
                        Route::resource('loanbranches', LoanBranchesController::class);

                    });


                });
                
            });
                
           
          

        });

        Route::Resource('ads', AdsController::class)->except('show');

        Route::get('ads/stat/{id?}', [AdsController::class, 'stat'])->name('ads.stat');

        //////////////////////////////// start of EmployeeNotes  ////////////////////////////////////

        //////////////////////////////// end of EmployeeNotes  ////////////////////////////////////
        //routes for message and profile employee

        ////////////////////////bookings//////////////////
        Route::Resource('bookings', BookingController::class)->except('create', 'show');

        // Route::get('bookings/{id}', [BookingController::class, 'create'])->name('bookings');

        Route::get('bookings/show/{booking}', [BookingController::class, 'show'])->name('bookings.show');
        Route::post('/bookings/changeStatus/{id}', [BookingController::class, 'changeStatus'])->name('bookings.changeStatus');
        Route::post('/bookings/changeCase/{id}', [BookingController::class, 'changeCase'])->name('bookings.changeCase');
        ///mr routes

        // end mr routes

        ////country routes

        /// Contact Route
        Route::Resource('contact', ContactMessagController::class);

    });

    ////////////////////////////front
    Route::view('/front/login', 'pages.front.component.login')->name('front.login')->middleware('guest:client');
    Route::post('/front/login', [FrontController::class, 'login'])->name('front.login');
    Route::get('/front/logout', [LogoutController::class, 'logout'])->name('front.logout')->middleware('auth:client');
    Route::get('/front', [FrontController::class, 'index'])->name('front.index');
    Route::get('/front/type', [FrontController::class, 'type'])->name('front.type');
    Route::get('/front/details/{apartment}', [FrontController::class, 'detail'])->name('front.detail');
    // Route::view('/contact', 'contact');
    Route::get('/front', [FrontController::class, 'index'])->name('front.index');
    Route::get('/front/type', [FrontController::class, 'type'])->name('front.type');
    Route::get('/front/details/{apartment}', [FrontController::class, 'detail'])->name('front.detail');
    Route::get('/front/booking/{apartment}', [FrontController::class, 'booking'])->name('front.booking')->middleware('auth:client');
    Route::post('/front/booking/{apartment}', [FrontController::class, 'makebooking'])->name('front.booking');

    Route::post('/front/price/{apartment}', [FrontController::class, 'price'])->name('front.price');



    // Route::view('/contact', 'contact');

    Route::view('/calendar', 'pages.test.waslata.create');
    // Route::view('/contact', 'contact');

});

require __DIR__ . '/auth.php';
