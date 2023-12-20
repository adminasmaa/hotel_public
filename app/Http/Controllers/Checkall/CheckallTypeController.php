<?php

namespace App\Http\Controllers\Checkall;

use App\Http\Controllers\Controller;
use App\Http\Requests\Checkall\CheckallTypeRequest;
use App\Interface\Checkall\CheckallTypeRepositoryInterface;
use App\Models\Checkall\CheckallType;

class CheckallTypeController extends Controller
{
    private $checkallTypeRepository;

    public function __construct(CheckallTypeRepositoryInterface $checkallTypeRepository)
    {
        $this->checkallTypeRepository = $checkallTypeRepository;
    }

    public function index()
    {
        return $this->checkallTypeRepository->index();

    }
    public function store(CheckallTypeRequest $request)
    {

        return $this->checkallTypeRepository->store($request);
    }
    public function update(CheckallTypeRequest $request, CheckallType $checkallType)
    {

        return $this->checkallTypeRepository->update($request, $checkallType);
    }
    public function destroy(CheckallType $checkallType)
    {
        return $this->checkallTypeRepository->destroy($checkallType);
    }
}
