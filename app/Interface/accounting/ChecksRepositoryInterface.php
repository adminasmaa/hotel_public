<?php


namespace App\Interface\accounting;
use App\Http\Requests\accounting\ChecksRequest;
use App\Models\accounting\Checks;
use Illuminate\Http\Request;

interface ChecksRepositoryInterface
{
   public function index();
   public function create();

    public function store(ChecksRequest $request);
    public function edit(Checks $check);
    public function show($id);
    public function update(ChecksRequest $request,Checks $check);
    public function destroy(Checks $check);
    public function duplicate($id);
    public function cashed($id);

}