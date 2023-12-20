<?php


namespace App\Interface\apartment;

use App\Http\Requests\apartment\PriceRequest;
use App\Models\Apartment\Price;
use Illuminate\Http\Request;

interface PriceRepositoryInterface
{
   public function index();
   public function create();

    public function store(PriceRequest $request);
    public function edit(Price $price);

    public function update(PriceRequest $request,Price $price);

    public function destroy(Price $price);
    public function discount(Request $request);
   

}