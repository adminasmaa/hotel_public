<?php


namespace App\Interface\rating;
use App\Http\Requests\rating\RatingTypesRequest;
use App\Models\rating\Rating_types;


interface RatingTypesRepositoryInterface
{
   public function index();
   public function create();

    public function store(RatingTypesRequest $request);
    public function edit( $type);
    public function show( $type);
    public function update( $request, $type);
    public function destroy( $type);

}