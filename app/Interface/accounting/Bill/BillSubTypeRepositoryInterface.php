<?php


namespace App\Interface\accounting\Bill;

use App\Http\Requests\accounting\Bill\BillsSubTypeRequest;
use App\Models\accounting\Bill\BillsSubType;
use App\Models\accounting\Bill\BillsType;

interface BillSubTypeRepositoryInterface
{
    public function index();
    public function store(BillsSubTypeRequest $request);
    public function update(BillsSubTypeRequest $request,BillsSubType $billsSubType);
    public function destroy(BillsSubType $billsSubType);
    public function getSubTypes(BillsType $billsType);
    
}
