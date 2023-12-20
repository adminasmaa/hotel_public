<?php


namespace App\Interface\hr;

use App\Http\Requests\hr\AwardDiscountRequest;
use App\Models\hr\AwardDiscount;

interface AwardDiscountRepositoryInterface
{
   public function index();
   public function create();

    public function store(AwardDiscountRequest $request);
    public function edit(AwardDiscount $awardDiscount);

    public function update(AwardDiscountRequest $request,AwardDiscount $awardDiscount);

    public function destroy(AwardDiscount $awardDiscount);
    public function show(AwardDiscount $awardDiscount);
    public function changeStatus(AwardDiscount $awardDiscount);
}
