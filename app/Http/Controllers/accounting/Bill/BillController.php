<?php

namespace App\Http\Controllers\accounting\Bill;

use App\Http\Controllers\Controller;
use App\Http\Requests\accounting\Bill\BillRequest;
use App\Interface\accounting\Bill\BillRepositoryInterface;
use App\Models\accounting\Bill\Bill;
use App\Models\accounting\Bill\BillsType;

class BillController extends Controller
{
    private $billRepository;

    public function __construct(BillRepositoryInterface $billRepository)
    {
        $this->billRepository = $billRepository;
    }
    public function index(){
        return $this->billRepository->index();    
      }
    public function create(){
        return $this->billRepository->create();
    }

    public function store(BillRequest $request){ 
        return $this->billRepository->store($request);;
     }

     public function edit(Bill $bill){
        return $this->billRepository->edit($bill);
          
    }

    public function update(BillRequest $request,Bill $bill){
        return $this->billRepository->update($request,$bill);
    }
    public function destroy(Bill $bill){
        return $this->billRepository->destroy($bill);
    }
    public function show(Bill $bill){
        return $this->billRepository->show($bill);
          
    }
    public function statistic(){
        return $this->billRepository->statistic();
          
    }
   
   
}
