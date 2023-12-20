<?php

namespace App\Interface\Checkall;

use App\Http\Requests\Checkall\CheckallRequest;
use App\Models\Checkall\Checkall;

interface CheckallRepositoryInterface
{
    public function index();
    public function create();

    public function store(CheckallRequest $request);
    public function edit(Checkall $checkall);

    public function update(CheckallRequest $request, Checkall $checkall);

    public function destroy(Checkall $checkall);

}
