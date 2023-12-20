<?php

namespace App\Http\Controllers\accounting\Bill;

use App\Http\Controllers\Controller;
use App\Http\Requests\accounting\Bill\BillsSubTypeRequest;
use App\Interface\accounting\Bill\BillSubTypeRepositoryInterface;
use App\Models\accounting\Bill\BillsSubType;
use App\Models\accounting\Bill\BillsType;
use Illuminate\Http\Request;

class BillsSubTypeController extends Controller
{
    private $billsSubType;

    public function __construct(BillSubTypeRepositoryInterface $billsSubType)
    {
        $this->billsSubType = $billsSubType;
    }

    public function index(){
        return $this->billsSubType->index();
    }
    public function store(BillsSubTypeRequest $request){
        return $this->billsSubType->store($request);
    }
    public function update(BillsSubTypeRequest $request,BillsSubType $billsSubType){

        return $this->billsSubType->update($request,$billsSubType);
    }
    public function destroy(BillsSubType $billsSubType){
        return $this->billsSubType->destroy( $billsSubType);
    }
    public function getSubTypes(BillsType $billsType){
        return $this->billsSubType->getSubTypes($billsType);
    }
}
