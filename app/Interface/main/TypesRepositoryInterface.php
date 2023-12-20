<?php


namespace App\Interface\main;
use App\Http\Requests\main\TypesRequest;
use App\Models\main\Types;


interface TypesRepositoryInterface
{
   public function index();


    public function store(TypesRequest $request);

    public function update(TypesRequest $request,Types $type);

    public function destroy(Types $type);

}
