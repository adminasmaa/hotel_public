<?php

namespace App\Http\Controllers\filemanger;

use App\Interface\filemanger\files_typesRepositoryInterface;
use App\Models\filemanger\files_types;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\filemanger\files_typesRequest;

class FilesTypesController extends Controller
{
    private $files_typeRepository;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     *  public function __construct(files_deptsRepositoryInterface $files_deptRepository)
     * {
     * $this->files_deptRepository = $files_deptRepository;
     * }
     */
    public function __construct(files_typesRepositoryInterface $files_typeRepository)
    {
        $this->files_typeRepository = $files_typeRepository;
    }

    public function index()
    {
        //
        return $this->files_typeRepository->index();

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(files_typesRequest $request)
    {
        //
        return $this->files_typeRepository->store($request);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\files_types $files_types
     * @return \Illuminate\Http\Response
     */


    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\files_types $files_types
     * @return \Illuminate\Http\Response
     */


    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\files_types $files_types
     * @return \Illuminate\Http\Response
     */
    public function update(files_typesRequest $request, files_types $filesType)
    {


        return $this->files_typeRepository->update($request, $filesType);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\files_types $files_types
     * @return \Illuminate\Http\Response
     */
    public function destroy(files_types $filesType)
    {
        //


        return $this->files_typeRepository->destroy($filesType);

    }
}
