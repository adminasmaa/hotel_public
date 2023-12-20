<?php

namespace App\Interface\Checkall;

use App\Http\Requests\Checkall\CheckallTypeRequest;
use App\Models\Checkall\CheckallType;

interface CheckallTypeRepositoryInterface
{
    public function index();

    public function store(CheckallTypeRequest $request);

    public function update(CheckallTypeRequest $request, CheckallType $checkallType);

    public function destroy(CheckallType $checkallType);

}
