<?php


namespace App\Interface\apartment;

use App\Http\Requests\apartment\bedTypeRequest;
use App\Models\Apartment\bedType;

interface bedTypeRepositoryInterface
{
    public function index();


    public function store(bedTypeRequest $request);

    public function update(bedTypeRequest $request,bedType $bedType);

    public function destroy(bedType $bedType);

}
