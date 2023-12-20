<?php


namespace App\Interface\filemanger;

use App\Http\Requests\filemanger\filesmanagerRequest;
use App\Models\filemanger\filesmanger;
use App\Repository\filemanger\filesmanagerRepository;

interface filesmanagerRepositoryInterface
{
    public function index();
    public function create();

    public function store(filesmanagerRepository $request);
    public function edit(filesmanger $filesmanger);
    public function update(filesmanagerRequest $request,filesmanger $filesmanger);

    public function destroy(filesmanger $filesmanger);
    public function restore($filesmanger);
    public function delete($filesmanger);

}
