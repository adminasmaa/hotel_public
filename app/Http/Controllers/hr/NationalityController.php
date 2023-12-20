<?php

namespace App\Http\Controllers\hr;

use App\Http\Requests\hr\NationalityRequest;
use App\Models\hr\Nationality;
use App\Interface\hr\NationalityRepositoryInterface;
use App\Http\Controllers\Controller;

class  NationalityController extends Controller
{


    private $nationalityRepository;

    public function __construct(NationalityRepositoryInterface $nationalityRepository)
    {
        $this->nationalityRepository = $nationalityRepository;
    }

    public function index(){
        return $this->nationalityRepository->index();

    }
    public function store(NationalityRequest $request){
        return $this->nationalityRepository->store($request);
    }
    public function update(NationalityRequest $request,Nationality $nationality){

        return $this->nationalityRepository->update($request,$nationality);
    }
    public function destroy(Nationality $nationality){
        return $this->nationalityRepository->destroy($nationality);
    }
}
