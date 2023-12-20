<?php

namespace App\Http\Controllers\accounting\loans;
use App\Http\Requests\accounting\loans\LoanBranchesRequest;
use App\Models\accounting\loans\LoanBranches;
use App\Interface\accounting\loans\LoanBranchesRepositoryInterface;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class LoanBranchesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    private $loanBrancheRepository;

    public function __construct(LoanBranchesRepositoryInterface $loanBrancheRepository)
    {
        $this->loanBrancheRepository = $loanBrancheRepository;
    }


    public function index()
    {
        //
        return $this->loanBrancheRepository->index();

    }


    public function store(LoanBranchesRequest $request)
    {
        //
        return $this->loanBrancheRepository->store($request);


    }


    public function update(LoanBranchesRequest $request, LoanBranches $loanbranch)
    {
        //

        return $this->loanBrancheRepository->update($request, $loanbranch);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\LoanBranches $loanBranches
     * @return \Illuminate\Http\Response
     */
    public function destroy(LoanBranches $loanbranch)
    {
        //
        return $this->loanBrancheRepository->destroy($loanbranch);
    }
}
