<?php


namespace App\Interface\Commitment;

use App\Http\Requests\Commitment\CommitmentSectionRequest;
use App\Models\Commitment\CommitmentSection;

interface CommitmentSectionRepositoryInterface
{
    public function index();
    public function store(CommitmentSectionRequest $request);
    public function update(CommitmentSectionRequest $request,CommitmentSection $commitmentSection);
    public function destroy(CommitmentSection $commitmentSection);
    
}
