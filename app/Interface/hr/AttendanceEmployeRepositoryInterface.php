<?php


namespace App\Interface\hr;
use App\Http\Requests\hr\AttendanceEmployeRequest;
use App\Models\hr\attendance_employe;
use Illuminate\Http\Request;


interface AttendanceEmployeRepositoryInterface
{
   public function index();
   public function create();

    public function store(AttendanceEmployeRequest $request);
    public function edit($attendance_employe);

    public function update(AttendanceEmployeRequest $request,$attendance_employe);

    public function destroy($attendance_employe);

}
