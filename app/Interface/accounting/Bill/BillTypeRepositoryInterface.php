<?php


namespace App\Interface\accounting\Bill;

use App\Http\Requests\accounting\Bill\BillsTypeRequest;
use App\Models\accounting\Bill\BillsType;

interface BillTypeRepositoryInterface
{
    public function index();
    public function store(BillsTypeRequest $request);
    public function update(BillsTypeRequest $request,BillsType $billsType);
    public function destroy(BillsType $billsType);
    
}
