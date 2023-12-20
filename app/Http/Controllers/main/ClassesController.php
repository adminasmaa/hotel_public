<?php

namespace App\Http\Controllers\main;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Http\Requests\main\ClassesRequest;
use App\Models\main\Classes;
use App\Interface\main\ClassesRepositoryInterface;

class ClassesController extends Controller
{
    private $classRepository;

    public function __construct(ClassesRepositoryInterface $classRepository)
    {
        $this->classRepository = $classRepository;
    }

    public function index(){
      return $this->classRepository->index();    
    }
    public function create(){
        return $this->classRepository->create();
          
    }
    public function store(ClassesRequest $request){ 
       return $this->classRepository->store($request);;
    }
    public function edit(Classes $class){
        return $this->classRepository->edit($class);
          
    }
    public function update(ClassesRequest $request,Classes $class){
        return $this->classRepository->update($request,$class);
    }
    public function destroy(Classes $class){
        return $this->classRepository->destroy($class);
    }
}
