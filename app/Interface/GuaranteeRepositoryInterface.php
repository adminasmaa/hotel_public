<?php


namespace App\Interface;
use App\Http\Requests\GuaranteeRequest;
use App\Models\guarantee;


interface GuaranteeRepositoryInterface
{
    public function index();


    public function store(GuaranteeRequest $request);

    public function update(GuaranteeRequest $request,guarantee $guarantee);

    public function destroy(guarantee $guarantee);

}
