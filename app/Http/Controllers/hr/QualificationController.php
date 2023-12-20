<?php

namespace App\Http\Controllers\hr;

use Illuminate\Http\Request;
use App\Http\Requests\hr\QualificationRequest;
use App\Models\hr\Qualification;
use App\Interface\hr\QualificationRepositoryInterface;
use App\Http\Controllers\Controller;


class QualificationController extends Controller
{


    private $qualificationRepository;

    public function __construct(QualificationRepositoryInterface $qualificationRepository)
    {
        $this->qualificationRepository = $qualificationRepository;
    }

    public function index(){
        return $this->qualificationRepository->index();

    }
    public function store(QualificationRequest $request){


        return $this->qualificationRepository->store($request);
    }
    public function update(QualificationRequest $request,Qualification $qualification){

        return $this->qualificationRepository->update($request,$qualification);
    }
    public function destroy(Qualification $qualification){
        return $this->qualificationRepository->destroy($qualification);
    }
}
