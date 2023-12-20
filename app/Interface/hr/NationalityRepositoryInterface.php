<?php


namespace App\Interface\hr;
use App\Http\Requests\hr\NationalityRequest;
use App\Models\hr\Nationality;


interface NationalityRepositoryInterface
{
    public function index();


    public function store(NationalityRequest $request);

    public function update(NationalityRequest $request,Nationality $nationality);

    public function destroy(Nationality $nationality);

}
