<?php

namespace App\Http\Controllers\hr;

use App\Interface\hr\StatisticRepositoryInterface;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StatisticController extends Controller
{
    private $statisticRepository;

    public function __construct(StatisticRepositoryInterface $statisticRepository)
    {
        $this->statisticRepository = $statisticRepository;
    }
    public function index(){
        return $this->statisticRepository->index();
    }
    public function employee_statistic(){
        return $this->statisticRepository->employee_statistic();
    }
    public function security(){
        return $this->statisticRepository->security();
    }
    public function egypt_license(){
        return $this->statisticRepository->egypt_license();
    }
    public function kuwait_license(){
        return $this->statisticRepository->kuwait_license();
    }
    public function uniform(){
        return $this->statisticRepository->uniform();
    }
    public function living(){
        return $this->statisticRepository->living();
    }
    public function bank(){
        return $this->statisticRepository->bank();
    }

}
