<?php

namespace App\Http\Controllers\hr;

use App\Http\Controllers\Controller;
use App\Http\Requests\hr\AwardDiscountRequest;
use App\Interface\hr\AwardDiscountRepositoryInterface;
use App\Models\hr\AwardDiscount;
use Illuminate\Http\Request;

class AwardDiscountController extends Controller
{
    private $awardDiscountRepository;

    public function __construct(AwardDiscountRepositoryInterface $awardDiscountRepository)
    {
        $this->awardDiscountRepository = $awardDiscountRepository;
    }

    public function index(){


        return $this->awardDiscountRepository->index();
    }
    public function create(){

        return $this->awardDiscountRepository->create();

    }
    public function store(AwardDiscountRequest $request){
       return $this->awardDiscountRepository->store($request);
    }
    public function edit(AwardDiscount $awardDiscount){
        return $this->awardDiscountRepository->edit($awardDiscount);

    }
    public function update(AwardDiscountRequest $request,AwardDiscount $awardDiscount){

        return $this->awardDiscountRepository->update($request,$awardDiscount);
    }
    public function destroy(AwardDiscount $awardDiscount){
        return $this->awardDiscountRepository->destroy($awardDiscount);
    }
    
    public function show(AwardDiscount $awardDiscount){
        return $this->awardDiscountRepository->show($awardDiscount);

    }
    public function changeStatus(AwardDiscount $awardDiscount){
        return $this->awardDiscountRepository->changeStatus($awardDiscount);
    }
}
