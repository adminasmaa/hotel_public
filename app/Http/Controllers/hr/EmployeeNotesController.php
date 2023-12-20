<?php

namespace App\Http\Controllers\hr;

use Illuminate\Http\Request;
use App\Http\Requests\hr\EmployeeNotesRequest;
use App\Models\hr\EmployeeNotes;
use App\Interface\hr\EmployeeNotesRepositoryInterface;
use App\Http\Controllers\Controller;

class EmployeeNotesController extends Controller
{
    private $employeeNoteRepository;

    public function __construct(EmployeeNotesRepositoryInterface $employeeNoteRepository)
    {
        $this->employeeNoteRepository = $employeeNoteRepository;
    }

    public function index(){


        return $this->employeeNoteRepository->index();
    }
    public function create(){

        return $this->employeeNoteRepository->create();

    }
    public function store(EmployeeNotesRequest $request){
       return $this->employeeNoteRepository->store($request);
    }
    
    public function update(EmployeeNotesRequest $request,EmployeeNotes $EmployeeNote){
        return $this->employeeNoteRepository->update($request,$EmployeeNote);
    }
    public function show($branch){
      
        return $this->employeeNoteRepository->show($branch);
    }
    // public function _show($emp_id=null, $branch){
      
    //     return $this->employeeNoteRepository->_show($emp_id=null,$branch);
    // }
    public function destroy(EmployeeNotes $EmployeeNote){
        return $this->employeeNoteRepository->destroy($EmployeeNote);
    }
    public function restore($id){
        return $this->employeeNoteRepository->restore($id);
    }
}
