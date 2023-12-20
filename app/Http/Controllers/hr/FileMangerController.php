<?php

namespace App\Http\Controllers\hr;

use App\Http\Controllers\Controller;
use App\Http\Requests\hr\FileManagerRequest;
use App\Interface\hr\FileManagerRepositoryInterface;
use Illuminate\Http\Request;

class FileMangerController extends Controller
{
    private $fileManagerRepository;

    public function __construct(FileManagerRepositoryInterface $fileManagerRepository)
    {
        $this->fileManagerRepository = $fileManagerRepository;
    }
    public function index($id)
    {
        return $this->fileManagerRepository->index($id);

    }
    public function store(FileManagerRequest $request)
    {
        return $this->fileManagerRepository->store($request);

    }
    public function destroy($id)
    {
        return $this->fileManagerRepository->destroy($id);

    }
}
