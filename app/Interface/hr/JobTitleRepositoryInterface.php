<?php


namespace App\Interface\hr;
use App\Http\Requests\hr\JobTitleRequest;
use App\Models\hr\JobTitle;


interface JobTitleRepositoryInterface
{
    public function index();


    public function store(JobTitleRequest $request);

    public function update(JobTitleRequest $request,JobTitle $JobTitle);

    public function destroy(JobTitle $JobTitle);

}
