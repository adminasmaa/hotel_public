<?php


namespace App\Interface\main;
use App\Http\Requests\main\MarksRequest;
use App\Models\main\Marks;


interface MarksRepositoryInterface
{
   public function index();
   public function create();

    public function store(MarksRequest $request);
    public function edit(Marks $mark);

    public function update(MarksRequest $request,Marks $mark);

    public function destroy(Marks $employeeStatus);

}