<?php


namespace App\Interface\hr;
use App\Http\Requests\hr\BankRequest;
use App\Models\hr\Bank;


interface BankRepositoryInterface
{
    public function index();


    public function store(BankRequest $request);

    public function update(BankRequest $request,Bank $bank);

    public function destroy(Bank $bank);

}
