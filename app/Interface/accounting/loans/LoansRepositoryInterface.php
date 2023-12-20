<?php


namespace App\Interface\accounting\loans;
use App\Http\Requests\accounting\loans\LoansRequest;
use App\Models\accounting\loans\Loans;
use Illuminate\Support\Facades\Request;


interface LoansRepositoryInterface
{
    public function index();

    public function create();
    public function store(LoansRequest $request);
    public function edit(Loans $loan);
    public function show($id,Request $request);
    public function change_status($id, Request $request);
    public function update(LoansRequest $request,Loans $loan );

    public function destroy(Loans $loan);

}
