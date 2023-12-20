<?php


namespace App\Interface\apartment;

use App\Http\Requests\apartment\viewTypeRequest;
use App\Models\Apartment\viewType;

interface viewTypeRepositoryInterface
{
    public function index();


    public function store(viewTypeRequest $request);

    public function update(viewTypeRequest $request,viewType $viewType);

    public function destroy(viewType $viewType);

}
