<?php


namespace App\Interface\hr;
use App\Http\Requests\hr\BankRequest;
use App\Models\hr\Bank;


interface StatisticRepositoryInterface
{
    public function index();
    public function employee_statistic();
    public function security();
    public function egypt_license();
    public function kuwait_license();
    public function uniform();
    public function living();
    public function bank();
}
