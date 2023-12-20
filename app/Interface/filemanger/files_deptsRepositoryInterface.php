<?php


namespace App\Interface\filemanger;
use App\Http\Requests\filemanger\files_deptsRequest;
use App\Models\filemanger\files_depts;


interface files_deptsRepositoryInterface
{
    public function index();


    public function store(files_deptsRequest $request);

    public function update(files_deptsRequest $request,files_depts $files_dept);

    public function destroy(files_depts $files_dept);

}
