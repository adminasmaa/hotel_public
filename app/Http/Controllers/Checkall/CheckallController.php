<?php

namespace App\Http\Controllers\Checkall;

use App\Http\Controllers\Controller;
use App\Http\Requests\Checkall\CheckallRequest;
use App\Interface\Checkall\CheckallRepositoryInterface;
use App\Models\Checkall\Checkall;

class CheckallController extends Controller
{
    private $checkallRepository;

    public function __construct(CheckallRepositoryInterface $checkallRepository)
    {
        $this->checkallRepository = $checkallRepository;
    }
    public function index()
    {
        return $this->checkallRepository->index();
    }
    public function create()
    {
        return $this->checkallRepository->create();
    }

    public function store(CheckallRequest $request)
    {
        return $this->checkallRepository->store($request);
    }

    public function edit(Checkall $checkall)
    {
        return $this->checkallRepository->edit($checkall);

    }

    public function update(CheckallRequest $request, Checkall $checkall)
    {

        return $this->checkallRepository->update($request, $checkall);
    }
    public function destroy(Checkall $checkall)
    {
        return $this->checkallRepository->destroy($checkall);
    }

}
