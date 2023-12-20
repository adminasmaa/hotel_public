<?php


namespace App\Interface\hr;
use App\Http\Requests\hr\QualificationRequest;
use App\Models\hr\Qualification;


interface QualificationRepositoryInterface
{
    public function index();


    public function store(QualificationRequest $request);

    public function update(QualificationRequest $request,Qualification $qualification);

    public function destroy(Qualification $qualification);

}
