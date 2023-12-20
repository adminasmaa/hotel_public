<?php

namespace App\Http\Controllers\apartment;
use App\Http\Controllers\Controller;
use App\Http\Requests\apartment\bedTypeRequest;
use App\Interface\apartment\bedTypeRepositoryInterface;
use App\Models\Apartment\bedType;

use Illuminate\Http\Request;

class BedTypeController extends Controller
{
    private $bedTypeRepository;

    public function __construct(bedTypeRepositoryInterface $bedTypeRepository)
    {
        $this->bedTypeRepository = $bedTypeRepository;
    }

    public function index(){
        return $this->bedTypeRepository->index();

    }
    public function store(bedTypeRequest $request){


        return $this->bedTypeRepository->store($request);
    }
    public function update(bedTypeRequest $request,bedType $bedType){

        return $this->bedTypeRepository->update($request,$bedType);
    }
    public function destroy(bedType $bedType){
        return $this->bedTypeRepository->destroy( $bedType);
    }
}
