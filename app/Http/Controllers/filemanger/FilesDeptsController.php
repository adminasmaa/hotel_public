<?php

namespace App\Http\Controllers\filemanger;

use App\Interface\filemanger\files_deptsRepositoryInterface;
use App\Models\filemanger\files_depts;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\filemanger\files_deptsRequest;

class FilesDeptsController extends Controller
{   private $files_deptRepository;

    public function __construct(files_deptsRepositoryInterface $files_deptRepository)
    {
        $this->files_deptRepository = $files_deptRepository;
    }
    public function index()
    {
        //
        return $this->files_deptRepository->index();
    }


    public function store(files_deptsRequest $request)
    {
        //
        return $this->files_deptRepository->store($request);
    }


    public function update(Request $request, files_depts $filesDept)
    {
        //
        return $this->files_deptRepository->update($request,$filesDept);

    }


    public function destroy(files_depts $files_dept)
    {
        //
        return $this->files_deptRepository->destroy($files_dept);

    }
}
