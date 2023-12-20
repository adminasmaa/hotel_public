<?php

namespace App\Http\Controllers\hr;

use App\Http\Controllers\Controller;
use App\Http\Requests\hr\JobTitleRequest;
use App\Models\hr\JobTitle;
use App\Interface\hr\JobTitleRepositoryInterface;

class JobTitleController extends Controller
{
    private $jobTitleRepository;

    public function __construct(JobTitleRepositoryInterface $jobTitleRepository)
    {
        $this->jobTitleRepository = $jobTitleRepository;
    }

    public function index()
    {
        return $this->jobTitleRepository->index();

    }

    public function store(JobTitleRequest $request)
    {


        return $this->jobTitleRepository->store($request);;
    }

    public function update(JobTitleRequest $request, JobTitle $jobTitle)
    {

        return $this->jobTitleRepository->update($request, $jobTitle);
    }

    public function destroy(JobTitle $jobTitle)
    {
        return $this->jobTitleRepository->destroy($jobTitle);
    }
}
