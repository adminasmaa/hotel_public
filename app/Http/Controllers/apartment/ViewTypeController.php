<?php

namespace App\Http\Controllers\apartment;
use App\Http\Controllers\Controller;
use App\Http\Requests\apartment\viewTypeRequest;
use App\Interface\apartment\viewTypeRepositoryInterface;
use App\Models\Apartment\viewType;

use Illuminate\Http\Request;

class ViewTypeController extends Controller
{
    private $viewTypeRepository;

    public function __construct(viewTypeRepositoryInterface $viewTypeRepository)
    {
        $this->viewTypeRepository = $viewTypeRepository;
    }

    public function index(){
        return $this->viewTypeRepository->index();

    }
    public function store(viewTypeRequest $request){


        return $this->viewTypeRepository->store($request);
    }
    public function update(viewTypeRequest $request,viewType $viewType){

        return $this->viewTypeRepository->update($request,$viewType);
    }
    public function destroy(viewType $viewType){
        return $this->viewTypeRepository->destroy( $viewType);
    }
}
