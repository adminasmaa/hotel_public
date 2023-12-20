<?php

namespace App\Http\Controllers\accounting\Bill;

use App\Http\Controllers\Controller;
use App\Http\Requests\accounting\Bill\BillsTypeRequest;
use App\Interface\accounting\Bill\BillTypeRepositoryInterface;
use App\Models\accounting\Bill\BillsType;
use Illuminate\Http\Request;

class BillsTypeController extends Controller
{
    private $billsType;

    public function __construct(BillTypeRepositoryInterface $billsType)
    {
        $this->billsType = $billsType;
    }

    public function index(){
        return $this->billsType->index();
    }
    public function store(BillsTypeRequest $request){
        return $this->billsType->store($request);
    }
    public function update(BillsTypeRequest $request,BillsType $billsType){

        return $this->billsType->update($request,$billsType);
    }
    public function destroy(BillsType $billsType){
        return $this->billsType->destroy( $billsType);
    }
}
