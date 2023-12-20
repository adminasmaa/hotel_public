<?php

namespace App\Http\Controllers\accounting\loans;

use App\Http\Requests\accounting\loans\LoansRequest;
use App\Models\accounting\loans\Loans;
use App\Interface\accounting\loans\LoansRepositoryInterface;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoansController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     *
     */
    private $loanRepository;
    public function __construct(LoansRepositoryInterface $loanRepository)
    {
        $this->loanRepository = $loanRepository;
    }

    public function index()
    {
        //
        return $this->loanRepository->index();

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
         return $this->loanRepository->create();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LoansRequest $request)
    {
        //
        return $this->loanRepository->store($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Loans  $loans
     * @return \Illuminate\Http\Response
     */


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Loans  $loans
     * @return \Illuminate\Http\Response
     */
    public function edit(Loans $loan)
    {
        //

        return $this->loanRepository->edit($loan);
    }

    public function show($id,Request $request)
    {
        //

        return $this->loanRepository->show($id,$request);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Loans  $loans
     * @return \Illuminate\Http\Response
     */
    public function update(LoansRequest $request, Loans $loan)
    {
        //
        return $this->loanRepository->update($request, $loan);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Loans  $loans
     * @return \Illuminate\Http\Response
     */
    public function destroy(Loans $loan)
    {
        //
        return $this->loanRepository->destroy($loan);

    }
    public function change_status( $id ,Request $request)
    {
        //
        return $this->loanRepository->change_status($id,$request);

    }
}
