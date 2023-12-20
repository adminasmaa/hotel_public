<?php

namespace App\Http\Controllers\hr;

use App\Http\Controllers\Controller;
use App\Http\Requests\hr\BankRequest;
use App\Models\hr\Bank;
use App\Interface\hr\BankRepositoryInterface;

class BankController extends Controller
{


    private $bankRepository;

    public function __construct(BankRepositoryInterface $bankRepository)
    {
        $this->bankRepository = $bankRepository;
    }

    public function index()
    {

        return $this->bankRepository->index();

    }

    public function store(BankRequest $request)
    {


        return $this->bankRepository->store($request);
    }

    public function update(BankRequest $request, Bank $bank)
    {

        return $this->bankRepository->update($request, $bank);
    }

    public function destroy(Bank $bank)
    {
        return $this->bankRepository->destroy($bank);
    }
}
