<?php


namespace App\Interface\Commitment;


use App\Http\Requests\Commitment\CommitmentRequest;
use App\Models\Commitment\Commitment;
use Illuminate\Http\Request;

interface CommitmentRepositoryInterface
{
   public function index();
   public function create();

    public function store(CommitmentRequest $request);
    public function edit(Commitment $commitment);

    public function update(CommitmentRequest $request,Commitment $commitment);
    public function destroy(Commitment $commitment);

}