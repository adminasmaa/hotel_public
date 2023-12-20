<?php

namespace App\Http\Controllers\filemanger;

use App\Http\Requests\filemanger\filesmanagerRequest;
use App\Interface\filemanger\filesmanagerRepositoryInterface;
use App\Models\filemanger\files_depts;
use App\Models\filemanger\files_types;
use App\Models\filemanger\filesmanger;
use App\Helpers\Moving;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;


class FilesmangerController extends Controller
{
    private $filesmanagerRepository;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(filesmanagerRepositoryInterface $filesmanagerRepository)
    {
        $this->filesmanagerRepository = $filesmanagerRepository;
    }

    public function index()
    {
        return $this->filesmanagerRepository->index();

    }

    public function create()
    {
        return $this->filesmanagerRepository->create();

    }

    public function store(filesmanagerRequest $request)
    {
        //

        return $this->filesmanagerRepository->store($request);


    }

    public function edit(filesmanger $filesmanger)
    {
        return $this->filesmanagerRepository->edit($filesmanger);

    }

    public function update(filesmanagerRequest $request, filesmanger $filesmanger)
    {
        //
        return $this->filesmanagerRepository->update($request, $filesmanger);

    }


    public function destroy(filesmanger $filesmanger)
    {
        return $this->filesmanagerRepository->destroy($filesmanger);

    }

    public function restore($filesmanger)
    {
        return $this->filesmanagerRepository->restore($filesmanger);

    }

    public function delete($filesmanger)
    {
        return $this->filesmanagerRepository->delete($filesmanger);

    }
}
