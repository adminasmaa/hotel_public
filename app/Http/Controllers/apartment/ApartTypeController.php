<?php

namespace App\Http\Controllers\apartment;
use App\Http\Controllers\Controller;

use App\Http\Requests\apartment\ApartmentRequest;
use App\Http\Requests\apartment\ApartTypeRequest;
use App\Interface\apartment\ApartTypeRepositoryInterface;
use App\Models\Apartment\Apartment;
use App\Models\Apartment\ApartType;
use Illuminate\Http\Request;

class ApartTypeController extends Controller
{        
    private $apartTypeRepository;

    public function __construct(ApartTypeRepositoryInterface $apartTypeRepository)
    {
        $this->apartTypeRepository = $apartTypeRepository;
    }
    public function index(){
        return $this->apartTypeRepository->index();    
      }
    public function create(){
        return $this->apartTypeRepository->create();
    }

    public function store(ApartTypeRequest $request){ 
        return $this->apartTypeRepository->store($request);;
     }

     public function edit(ApartType $apartType){
        return $this->apartTypeRepository->edit($apartType);
          
    }

    public function update(ApartTypeRequest $request,ApartType $apartType){
        return $this->apartTypeRepository->update($request,$apartType);
    }

    public function destroy(ApartType $apartType){
        return $this->apartTypeRepository->destroy($apartType);
    }  
    public function getApart(ApartType $apartType,Request $request){
        return $this->apartTypeRepository->getApart($apartType,$request);
        
    }    
}
