<?php


namespace App\Interface\apartment;

use App\Http\Requests\apartment\ApartTypeRequest;
use App\Http\Requests\apartment\ContentImageRequest;
use App\Models\Apartment\Apartment;
use App\Models\Apartment\ApartType;
use Illuminate\Http\Request;

interface ApartTypeRepositoryInterface
{
   public function index();
   public function create();

    public function store(ApartTypeRequest $request);
    public function edit(ApartType $apartType);

    public function update(ApartTypeRequest $request,ApartType $apartType);

    public function destroy(ApartType $apartType);
    public function getApart(ApartType $apartType,Request $request);
}