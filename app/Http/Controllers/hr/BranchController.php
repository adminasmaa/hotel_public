<?php

namespace App\Http\Controllers\hr;
use App\Http\Requests\hr\BranchRequest;
use App\Models\hr\Branch;
use App\Http\Controllers\Controller;
use App\Interface\hr\BranchRepositoryInterface;


class BranchController extends Controller
{
    private $branchRepository;

    public function __construct(BranchRepositoryInterface $branchRepository)
    {
        $this->branchRepository = $branchRepository;
    }

    public function index(){
        return $this->branchRepository->index();

    }
    
    public function create(){
        return $this->branchRepository->create();
    }

    public function store(BranchRequest $request){


        return $this->branchRepository->store($request);;
    }
    public function edit(Branch $branch){
        return $this->branchRepository->edit($branch);

    }
    public function update(BranchRequest $request,Branch $branch){

        return $this->branchRepository->update($request,$branch);
    }
    public function destroy(Branch $branch){
        return $this->branchRepository->destroy($branch);
    }
    public function show(Branch $branch){
        return $this->branchRepository->show($branch);

    }
}
