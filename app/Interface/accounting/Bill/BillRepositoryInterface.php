<?php


namespace App\Interface\accounting\Bill;

use App\Http\Requests\accounting\Bill\BillRequest;
use App\Models\accounting\Bill\Bill;

interface BillRepositoryInterface
{
    public function index();
    public function create();
    public function store(BillRequest $request);
    public function edit(Bill $bill);
    public function update(BillRequest $request,Bill $bill);
    public function destroy(Bill $bill);
    public function show(Bill $bill);
    public function statistic();


}