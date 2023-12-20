<?php

namespace App\Http\Controllers\rating;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Http\Requests\rating\RatingTypesRequest;
use App\Models\rating\Rating_types;
use App\Interface\rating\RatingTypesRepositoryInterface;

class RatingTypesController extends Controller
{
    private $typesRepository;

    public function __construct(RatingTypesRepositoryInterface $typesRepository)
    {
        $this->typesRepository = $typesRepository;
    }

    public function index(){
      return $this->typesRepository->index();    
    }
    public function create(){
        return $this->typesRepository->create();
          
    }
    public function show($type){
        return $this->typesRepository->show($type);          
    }
    public function store(RatingTypesRequest $request){ 
       return $this->typesRepository->store($request);;
    }
    public function edit( $type){
        return $this->typesRepository->edit($type);
          
    }
    public function update(RatingTypesRequest $request, $type){
        return $this->typesRepository->update($request,$type);
    }
    public function destroy( $type){
        return $this->typesRepository->destroy($type);
    }
   
}
