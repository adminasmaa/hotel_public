<?php


namespace App\Interface\hr;
use App\Http\Requests\hr\EmployeeStatusRequest;
use App\Models\hr\EmployeeStatus;


interface EmployeeStatusRepositoryInterface
{
    public function index();


    public function store(EmployeeStatusRequest $request);

    public function update(EmployeeStatusRequest $request,$id);

    public function destroy(EmployeeStatus $request,$id);

}
