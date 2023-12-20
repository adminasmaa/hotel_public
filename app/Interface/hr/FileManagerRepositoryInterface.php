<?php


namespace App\Interface\hr;

use App\Http\Requests\hr\FileManagerRequest;

interface FileManagerRepositoryInterface
{
    public function index($id);
    public function store(FileManagerRequest $request);
    public function destroy($id);

}
