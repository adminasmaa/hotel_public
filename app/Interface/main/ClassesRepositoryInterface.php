<?php


namespace App\Interface\main;
use App\Http\Requests\main\ClassesRequest;
use App\Models\main\Classes;


interface ClassesRepositoryInterface
{
   public function index();
   public function create();

    public function store(ClassesRequest $request);
    public function edit(Classes $class);

    public function update(ClassesRequest $request,Classes $class);

    public function destroy(Classes $employeeStatus);

}