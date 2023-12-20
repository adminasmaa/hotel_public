<?php


namespace App\Interface;
use App\Http\Requests\CountryRequest;
use App\Models\Country;


interface CountryRepositoryInterface
{
    public function index();


    public function store(CountryRequest $request);

    public function update(CountryRequest $request,Country $country);

    public function destroy(Country $country);

}
