<?php


namespace App\Interface\main;

use App\Http\Requests\main\CompanyRequest;
use App\Models\main\Company;



interface CompanyRepositoryInterface
{
   public function index();
   public function create();

    public function store(CompanyRequest $request);
    public function edit(Company $company);

    public function update(CompanyRequest $request,Company $company);

    public function destroy(Company $company);

}