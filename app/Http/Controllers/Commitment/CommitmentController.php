<?php

namespace App\Http\Controllers\Commitment;

use App\Http\Controllers\Controller;
use App\Http\Requests\Commitment\CommitmentRequest;
use App\Interface\Commitment\CommitmentRepositoryInterface;
use App\Models\Commitment\Commitment;
use Illuminate\Http\Request;

class CommitmentController extends Controller
{
    private $commitmentRepository;

    public function __construct(CommitmentRepositoryInterface $commitmentRepository)
    {
        $this->commitmentRepository = $commitmentRepository;
    }
    public function index(){
        return $this->commitmentRepository->index();    
      }
    public function create(){
        return $this->commitmentRepository->create();
    }

    public function store(CommitmentRequest $request){ 
        return $this->commitmentRepository->store($request);;
     }

     public function edit(Commitment $commitment){
        return $this->commitmentRepository->edit($commitment);
          
    }

    public function update(CommitmentRequest $request,Commitment $commitment){
        return $this->commitmentRepository->update($request,$commitment);
    }
    public function destroy(Commitment $commitment){
        return $this->commitmentRepository->destroy($commitment);
    }
}
