<?php


namespace App\Interface\hr;
use App\Http\Requests\hr\EmployeeNotesRequest;
use App\Models\hr\EmployeeNotes;


interface EmployeeNotesRepositoryInterface
{
   public function index();
   public function create();

    public function store(EmployeeNotesRequest $request);

    public function update(EmployeeNotesRequest $request,EmployeeNotes $EmployeeNote);
    public function show($branch);
    // public function _show($emp_id, $branch);
    public function destroy(EmployeeNotes $EmployeeNote);
    public function restore($id);

}
