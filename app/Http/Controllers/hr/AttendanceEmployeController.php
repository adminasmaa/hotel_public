<?php

namespace App\Http\Controllers\hr;

use App\Http\Controllers\Controller;

use App\Http\Requests\hr\AttendanceEmployeRequest;
use App\Models\hr\attendance_employe;
use App\Interface\hr\AttendanceEmployeRepositoryInterface;
use Carbon\Carbon;

use App\Models\hr\Employee;
use Illuminate\Http\Request;

class AttendanceEmployeController extends Controller
{

    private $employe_attendanceRepository;

    public function __construct(AttendanceEmployeRepositoryInterface $employe_attendanceRepository)
    {

        $this->employe_attendanceRepository = $employe_attendanceRepository;
    }

    public function index()
    {
        //
        return $this->employe_attendanceRepository->index();

    }


    public function create()
    {


        return $this->employe_attendanceRepository->create();
    }


    public function store(AttendanceEmployeRequest $request)
    {
        //

        return $this->employe_attendanceRepository->store($request);

    }


    public function edit($attendance_employe)
    {
        //


        return $this->employe_attendanceRepository->edit($attendance_employe);

    }


    public function update(AttendanceEmployeRequest $request, $attendance_employe)
    {
        //

        return $this->employe_attendanceRepository->update($request, $attendance_employe);

    }


    public function destroy($attendance_employe)
    {
        //
        return $this->employe_attendanceRepository->destroy($attendance_employe);

    }

    //get all Employee attendence

    public function get_employe_attendance(Request $request, $id)

    {


        if ($request->monthe) {
            $monthe_attendence = explode('-', $request->monthe)[1];

            $employe_attendances = attendance_employe::where('employees_id', $id)->whereMonth('created_at', $monthe_attendence)->get();

        } else {
            $employe_attendances = attendance_employe::where('employees_id', $id)->whereMonth('created_at', Carbon::now()->month)->get();

        }
        foreach ($employe_attendances as $value) {
            if ($value->check_out_time) {
                $startTime = Carbon::parse($value->check_in_time);
                $endTime = Carbon::parse($value->check_out_time);
                $value->time = $startTime->diff($endTime)->format('%H:%I:%S');
            } else {
                $value->time = '';
            }

        }
        $month_name = Carbon::createFromDate(now()->month)->translatedFormat('F');


        return view('pages.hr.employe_attendance.show', compact('employe_attendances', 'id', 'month_name'));


    }


}
