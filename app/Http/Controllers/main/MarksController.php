<?php

namespace App\Http\Controllers\main;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Http\Requests\main\MarksRequest;
use App\Models\main\Marks;
use App\Interface\main\MarksRepositoryInterface;

class MarksController extends Controller
{
    private $markRepository;

    public function __construct(MarksRepositoryInterface $markRepository)
    {
        $this->markRepository = $markRepository;
    }

    public function index(){
      return $this->markRepository->index();
    }
    public function create(){
        return $this->markRepository->create();

    }
    public function store(MarksRequest $request){
       return $this->markRepository->store($request);
    }
    public function edit(Marks $mark){
        return $this->markRepository->edit($mark);

    }
    public function update(MarksRequest $request,Marks $mark){
        return $this->markRepository->update($request,$mark);
    }
    public function destroy(Marks $mark){
        return $this->markRepository->destroy($mark);
    }

}
