<?php


namespace App\Interface\hr;
use App\Http\Requests\hr\ProfessionRequest;
use App\Models\hr\Profession;


interface ProfessionRepositoryInterface
{
    public function index();


    public function store(ProfessionRequest $request);

    public function update(ProfessionRequest $request, Profession $profession);

    public function destroy(Profession $profession);

}
