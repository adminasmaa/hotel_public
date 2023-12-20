<?php

namespace App\Http\Controllers\hr;

use App\Http\Requests\hr\ProfessionRequest;
use App\Models\hr\Profession;
use App\Interface\hr\ProfessionRepositoryInterface;
use App\Http\Controllers\Controller;

class ProfessionController extends Controller
{


    private $professionRepository;

    public function __construct(ProfessionRepositoryInterface $professionRepository)
    {
        $this->professionRepository = $professionRepository;
    }

    public function index()
    {
        return $this->professionRepository->index();

    }

    public function store(ProfessionRequest $request)
    {


        return $this->professionRepository->store($request);
    }

    public function update(ProfessionRequest $request, Profession $profession)
    {

        return $this->professionRepository->update($request, $profession);
    }

    public function destroy(Profession $profession)
    {
        return $this->professionRepository->destroy($profession);
    }
}
