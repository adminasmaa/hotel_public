<?php


namespace App\Interface\accounting\loans;
use App\Http\Requests\accounting\loans\LoanBranchesRequest;
use App\Models\accounting\loans\LoanBranches;


interface LoanBranchesRepositoryInterface
{
    public function index();


    public function store(LoanBranchesRequest $request);

    public function update(LoanBranchesRequest $request,LoanBranches $loanbranch );

    public function destroy(LoanBranches $loanbranch);

}
