<?php


namespace App\Interface\hr;
use App\Http\Requests\hr\BranchRequest;
use App\Models\hr\Branch;


interface BranchRepositoryInterface
{
    public function index();
    public function create();
    public function store(BranchRequest $request);
    public function edit(Branch $branch);
    public function update(BranchRequest $request,Branch $branch);
    public function show(Branch $branch);
    public function destroy(Branch $branch);

}
