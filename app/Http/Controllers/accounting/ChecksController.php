<?php

namespace App\Http\Controllers\accounting;

use App\Models\accounting\Checks;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\accounting\ChecksRequest;
use App\Interface\accounting\ChecksRepositoryInterface;

class ChecksController extends Controller
{
    private $checksRepository;

    public function __construct(ChecksRepositoryInterface $checksRepository)
    {
        $this->checksRepository = $checksRepository;
    }

    public function index(){
      return $this->checksRepository->index();    
    }
    public function create(){
        return $this->checksRepository->create();
          
    }
    public function store(ChecksRequest $request){ 
        
       return $this->checksRepository->store($request);
    }
    public function edit(Checks $check){
        return $this->checksRepository->edit($check);
          
    }
    public function update(ChecksRequest $request,Checks $check){
        return $this->checksRepository->update($request,$check);
    }
    public function show($id){
        return $this->checksRepository->show($id);
    }
    public function destroy(Checks $check){
        return $this->checksRepository->destroy($check);
    }
    public function duplicate($id)
    {
        return $this->checksRepository->duplicate($id);
    }
    public function cashed($id)
    {
        return $this->checksRepository->cashed($id);
    }
}
