<?php

namespace App\Providers;

use App\Helpers\Moving;
use App\Interface\accounting\Bill\BillRepositoryInterface;
use App\Interface\accounting\Bill\BillSubTypeRepositoryInterface;
use App\Interface\accounting\Bill\BillTypeRepositoryInterface;
use App\Interface\accounting\loans\LoanBranchesRepositoryInterface;
use App\Interface\accounting\loans\LoansRepositoryInterface;
use App\Interface\Ads\AdsRepositoryInterface;
use App\Interface\apartment\ApartmentRepositoryInterface;
use App\Interface\apartment\ApartTypeRepositoryInterface;
use App\Interface\apartment\bedTypeRepositoryInterface;
use App\Interface\apartment\ContentRepositoryInterface;
use App\Interface\apartment\HomeContentRepositoryInterface;
use App\Interface\apartment\PriceRepositoryInterface;
use App\Interface\apartment\viewTypeRepositoryInterface;
use App\Interface\BookingRepositoryInterface;
use App\Interface\Checkall\AnswerRepositoryInterface;
use App\Interface\Checkall\CheckallRepositoryInterface;
use App\Interface\Checkall\CheckallTypeRepositoryInterface;
use App\Interface\accounting\ChecksRepositoryInterface;
use App\Interface\main\ClassesRepositoryInterface;
use App\Interface\clients\ClientsRepositoryInterface;
use App\Interface\clients\ClientApproveRepositoryInterface;
use App\Interface\clients\ClientStatusRepositoryInterface;
use App\Interface\Commitment\CommitmentRepositoryInterface;
use App\Interface\Commitment\CommitmentSectionRepositoryInterface;
use App\Interface\main\CompanyRepositoryInterface;
use App\Interface\ContactMessagRepositoryInterface;
use App\Interface\CountryRepositoryInterface;
use App\Interface\filemanger\filesmanagerRepositoryInterface;
use App\Interface\filemanger\files_deptsRepositoryInterface;
use App\Interface\filemanger\files_typesRepositoryInterface;
use App\Interface\GuaranteeRepositoryInterface;
use App\Interface\hr\AttendanceEmployeRepositoryInterface;
use App\Interface\hr\AwardDiscountRepositoryInterface;
use App\Interface\hr\BankRepositoryInterface;
use App\Interface\hr\BranchRepositoryInterface;
use App\Interface\hr\EmployeeNotesRepositoryInterface;
use App\Interface\hr\EmployeeRepositoryInterface;
use App\Interface\hr\EmployeeStatusRepositoryInterface;
use App\Interface\hr\FileManagerRepositoryInterface;
use App\Interface\hr\JobTitleRepositoryInterface;
use App\Interface\hr\MessageRepositoryInterface;
use App\Interface\hr\NationalityRepositoryInterface;
use App\Interface\hr\ProfessionRepositoryInterface;
use App\Interface\hr\QualificationRepositoryInterface;
use App\Interface\hr\StatisticRepositoryInterface;
use App\Interface\Maintenance\MaintenanceRepositoryInterface;
use App\Interface\Maintenance\MaintenanceRequireRepositoryInterface;
use App\Interface\main\MarksRepositoryInterface;
use App\Interface\main\ProductRepositoryInterface;
use App\Interface\rating\RatingQuestionsRepositoryInterface;
use App\Interface\rating\RatingRepositoryInterface;
use App\Interface\rating\RatingTypesRepositoryInterface;
use App\Interface\RoleRepositoryInterface;
use App\Interface\main\TypesRepositoryInterface;
use App\Models\Role;
use App\Repository\accounting\loans\LoanBranchesRepository;
use App\Repository\accounting\loans\LoansRepository;
use App\Repository\Ads\AdsRepository;
use App\Repository\apartment\ApartmentRepository;
use App\Repository\apartment\ApartTypeRepository;
use App\Repository\apartment\BedTypeRepository;
use App\Repository\apartment\ContentRepository;
use App\Repository\apartment\HomeContentRepository;
use App\Repository\apartment\PriceRepository;
use App\Repository\apartment\ViewTypeRepository;
use App\Repository\accounting\Bill\BillRepository;
use App\Repository\accounting\Bill\BillSubTypeRepository;
use App\Repository\accounting\Bill\BillTypeRepository;
use App\Repository\BookingRepository;
use App\Repository\Checkall\AnswerRepository;
use App\Repository\Checkall\CheckallRepository;
use App\Repository\Checkall\CheckallTypeRepository;
use App\Repository\accounting\ChecksRepository;
use App\Repository\main\ClassesRepository;
use App\Repository\clients\ClientsRepository;
use App\Repository\clients\ClientApproveRepository;
use App\Repository\clients\ClientStatusRepository;
use App\Repository\Commitment\CommitmentRepository;
use App\Repository\Commitment\CommitmentSectionRepository;
use App\Repository\main\CompanyRepository;
use App\Repository\ContactMessagRepository;
use App\Repository\CountryRepository;
use App\Repository\filemanger\filesmanagerRepository;
use App\Repository\filemanger\files_deptsRepository;
use App\Repository\filemanger\files_typesRepository;
use App\Repository\GuaranteeRepository;
use App\Repository\hr\AttendanceEmployeeRepository;
use App\Repository\hr\AwardDiscountRepository;
use App\Repository\hr\BankRepository;
use App\Repository\hr\BranchRepository;
use App\Repository\hr\EmployeeNotesRepository;
use App\Repository\hr\EmployeeRepository;
use App\Repository\hr\EmployeeStatusRepository;
use App\Repository\hr\FileManagerRepository;
use App\Repository\hr\JobTitleRepository;
use App\Repository\hr\MessageRepository;
use App\Repository\hr\NationalityRepository;
use App\Repository\hr\ProfessionRepository;
use App\Repository\hr\QualificationRepository;
use App\Repository\hr\StatisticRepository;
use App\Repository\Maintenance\MaintenanceRepository;
use App\Repository\Maintenance\MaintenanceRequireRepository;
use App\Repository\main\MarksRepository;
use App\Repository\main\ProductRepository;
use App\Repository\rating\RatingQuestionsRepository;
use App\Repository\rating\RatingRepository;
use App\Repository\rating\RatingTypesRepository;
use App\Repository\RoleRepository;
use App\Repository\main\TypesRepository;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

        $this->app->bind(AdsRepositoryInterface::class, AdsRepository::class);
        $this->app->bind(QualificationRepositoryInterface::class, QualificationRepository::class);
        $this->app->bind(JobTitleRepositoryInterface::class, JobTitleRepository::class);
        $this->app->bind(EmployeeStatusRepositoryInterface::class, EmployeeStatusRepository::class);
        $this->app->bind(EmployeeRepositoryInterface::class, EmployeeRepository::class);
        $this->app->bind(BranchRepositoryInterface::class, BranchRepository::class);
        $this->app->bind(NationalityRepositoryInterface::class, NationalityRepository::class);
        $this->app->bind(ProfessionRepositoryInterface::class, ProfessionRepository::class);
        $this->app->bind(BankRepositoryInterface::class, BankRepository::class);
        $this->app->bind(RoleRepositoryInterface::class, RoleRepository::class);
        $this->app->bind(ClassesRepositoryInterface::class, ClassesRepository::class);
        $this->app->bind(MarksRepositoryInterface::class, MarksRepository::class);
        $this->app->bind(CompanyRepositoryInterface::class, CompanyRepository::class);
        $this->app->bind(MessageRepositoryInterface::class, MessageRepository::class);
        $this->app->bind(ClientsRepositoryInterface::class, ClientsRepository::class);
        $this->app->bind(ProductRepositoryInterface::class, ProductRepository::class);
        $this->app->bind(StatisticRepositoryInterface::class, StatisticRepository::class);
        $this->app->bind(AttendanceEmployeRepositoryInterface::class, AttendanceEmployeeRepository::class);
        $this->app->bind(HomeContentRepositoryInterface::class, HomeContentRepository::class);
        $this->app->bind(ContentRepositoryInterface::class, ContentRepository::class);
        $this->app->bind(ApartmentRepositoryInterface::class, ApartmentRepository::class);
        $this->app->bind(CheckallTypeRepositoryInterface::class, CheckallTypeRepository::class);
        $this->app->bind(CheckallRepositoryInterface::class, CheckallRepository::class);
        $this->app->bind(RatingRepositoryInterface::class, RatingRepository::class);
        $this->app->bind(RatingQuestionsRepositoryInterface::class, RatingQuestionsRepository::class);
        $this->app->bind(RatingTypesRepositoryInterface::class, RatingTypesRepository::class);
        $this->app->bind(FileManagerRepositoryInterface::class, FileManagerRepository::class);
        $this->app->bind(AnswerRepositoryInterface::class, AnswerRepository::class);
        $this->app->bind(BookingRepositoryInterface::class, BookingRepository::class);
        $this->app->bind(TypesRepositoryInterface::class, TypesRepository::class);
        $this->app->bind(ClientApproveRepositoryInterface::class, ClientApproveRepository::class);
        $this->app->bind(ClientStatusRepositoryInterface::class, ClientStatusRepository::class);
        $this->app->bind(CountryRepositoryInterface::class, CountryRepository::class);
        $this->app->bind(PriceRepositoryInterface::class, PriceRepository::class);
        $this->app->bind(GuaranteeRepositoryInterface::class, GuaranteeRepository::class);
        $this->app->bind(EmployeeNotesRepositoryInterface::class, EmployeeNotesRepository::class);
        $this->app->bind(bedTypeRepositoryInterface::class, BedTypeRepository::class);
        $this->app->bind(viewTypeRepositoryInterface::class, ViewTypeRepository::class);
        $this->app->bind(ApartTypeRepositoryInterface::class, ApartTypeRepository::class);
        $this->app->bind(ContactMessagRepositoryInterface::class, ContactMessagRepository::class);
        $this->app->bind(MaintenanceRequireRepositoryInterface::class, MaintenanceRequireRepository::class);
        $this->app->bind(MaintenanceRepositoryInterface::class, MaintenanceRepository::class);
        $this->app->bind(files_deptsRepositoryInterface::class, files_deptsRepository::class);
        $this->app->bind(files_typesRepositoryInterface::class, files_typesRepository::class);
        $this->app->bind(filesmanagerRepositoryInterface::class, filesmanagerRepository::class);
        $this->app->bind(AwardDiscountRepositoryInterface::class, AwardDiscountRepository::class);
        $this->app->bind(CommitmentSectionRepositoryInterface::class, CommitmentSectionRepository::class);
        $this->app->bind(CommitmentRepositoryInterface::class, CommitmentRepository::class);
        $this->app->bind(LoanBranchesRepositoryInterface::class, LoanBranchesRepository::class);
        $this->app->bind(LoansRepositoryInterface::class, LoansRepository::class);
        $this->app->bind(ChecksRepositoryInterface::class, ChecksRepository::class);
        $this->app->bind(BillRepositoryInterface::class, BillRepository::class);
        $this->app->bind(BillSubTypeRepositoryInterface::class, BillSubTypeRepository::class);
        $this->app->bind(BillTypeRepositoryInterface::class, BillTypeRepository::class);

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::if('role', function ($role) {

            if (Session::get('branch')) {
                $array_branch = Role::where('roles.type', 3)
                    ->where(function ($query) {
                        $query->where("roles.link_route", 'not like', '%create%')
                            ->Where("roles.link_route", 'not like', '%setting%');
                    })->pluck('roles.link_route')->toArray();
                $el = true;
                foreach (['edit', 'index', 'store', 'update', 'show', 'destory', 'create', 'setting'] as $key => $value) {
                    if (str_contains($role, $value)) {
                        $el = false;
                    }
                }

                if (in_array($role, $array_branch) || $el) {

                    return true;
                } else {
                    return false;

                }

            } elseif (in_array($role, Moving::get_all_permissions())) {
                return true;
            }
            return false;

        });
    }
}
