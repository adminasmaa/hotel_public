<?php


namespace App\Interface\filemanger;
use App\Http\Requests\filemanger\files_typesRequest;
use App\Models\filemanger\files_types;


interface files_typesRepositoryInterface
{
    public function index();


    public function store(files_typesRequest $request);

    public function update(files_typesRequest $request,files_types $files_type);

    public function destroy(files_types $files_type);

}
