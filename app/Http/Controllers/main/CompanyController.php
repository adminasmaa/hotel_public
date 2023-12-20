<?php

namespace App\Http\Controllers\main;
use App\Http\Controllers\Controller;

use App\Http\Requests\main\CompanyRequest;
use App\Interface\main\CompanyRepositoryInterface;
use App\Models\main\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller

{    private $companyRepository;

    public function __construct(CompanyRepositoryInterface $companyRepository)
    {
        $this->companyRepository = $companyRepository;
    }
    public function index(){
        return $this->companyRepository->index();
      }
    public function create(){
        return $this->companyRepository->create();
    }

    public function store(CompanyRequest $request){
        return $this->companyRepository->store($request);
     }

     public function edit(Company $company){
        return $this->companyRepository->edit($company);

    }

    public function update(CompanyRequest $request,Company $company){
        return $this->companyRepository->update($request,$company);
    }
    public function destroy(Company $company){
        return $this->companyRepository->destroy($company);
    }
}
