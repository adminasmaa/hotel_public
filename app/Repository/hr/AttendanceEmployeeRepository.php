<?php


namespace App\Repository\hr;

use App\Helpers\Moving;
use App\Models\hr\attendance_employe;
use App\Models\hr\Employee;
use App\Interface\hr\AttendanceEmployeRepositoryInterface;
use Carbon\Carbon;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class AttendanceEmployeeRepository implements AttendanceEmployeRepositoryInterface
{
    protected $data;

    public function __construct()
    {


        $this->data['Employees'] = Employee::where('emp_state_id', '!=', 5)->get();


    }

    public function index()
    {
        $this->data['attendance_employes'] = attendance_employe::select('employees_id')->when(auth()->user()->branch_id != 1, function ($q) {
            $q->whereRelation('employee', 'branch_id', auth()->user()->branch_id);
        })->when(request()->has('branch'), function ($q) {
            $q->whereRelation('employee', 'branch_id', request()->get('branch'));
        })->whereMonth('created_at', Carbon::now()->month)->groupBy('employees_id')->get();
        Moving::getMoving('عرض كل  الاوقات');

        return view('pages.hr.employe_attendance.index', $this->data);
    }

    public function create()
    {
        return view('pages.hr.employe_attendance.create', $this->data);
    }

    public function store($request)
    {


        $employe_attendance = attendance_employe::where('employees_id', $request->employees_id)->whereNotNull('check_in_time')->latest('id')->first();
        $employe_attendance_last = attendance_employe::where('employees_id', $request->employees_id)->whereNotNull('check_in_time')->whereNotNull('check_out_time')->first();
        //dd($employe_attendance_last);
        $data = $request->all();

        if ($request->check_out_time) {
            if ($employe_attendance_last) {
                toastr()->error('لا يوجد تسجيل دخول لهذا الموظف لابد من تسجيل الدخول اولا');
                return redirect()->route('EmployeAttendance.index');


            } else {
                if ($employe_attendance) {
                    $data['check_out_time'] = $request->check_out_time;
                    $data['userEdit'] = auth()->user()->id;

                    $employe_attendance->update($data);
                    Moving::getMoving('تم تسجيل الخروج بنجاح');
                    toastr()->success('تم تسجيل الخروج بنجاح');
                    return redirect()->route('EmployeAttendance.index');
                } else {
                    toastr()->error('لا يوجد تسجيل دخول لهذا الموظف لابد من تسجيل الدخول اولا');
                    return redirect()->route('EmployeAttendance.index');
                }

            }


        }

        if ($employe_attendance && !$employe_attendance->check_out_time) {
            toastr()->error('يوجد وقت حضور  لهذا الموظف بدون تسجيل وقت انصراف لابد من تسجيل وقت الانصراف اولا');
            return redirect()->route('EmployeAttendance.index');

        } else {
            $data = $request->all();
            $data['attendance_image'] = Moving::upload($request, 'attendance_employes', 'attendance_image');
            $data['userAdd'] = auth()->user()->id;

            attendance_employe::create($data);
            Moving::getMoving('   تم تسجيل الدخول بنجاح');
            toastr()->success('تم حفظ بنجاح');
            return redirect()->route('EmployeAttendance.index');

        }

    }

    public function edit($attendance_employe)
    {
        $attendance_employe = attendance_employe::FindOrfail($attendance_employe);

        Moving::getMoving('تعديل الانصراف والحضور ');
        $this->data['attendance_employe'] = $attendance_employe;

        return view('pages.hr.employe_attendance.edit', $this->data);
    }

    public function update($request, $attendance_employe)
    {
        $attendance_employe = attendance_employe::FindOrfail($attendance_employe);
        $data = $request->all();

        if ($request->hasFile('attendance_image')) {
            $data['attendance_image'] = Moving::upload($request, 'attendance_employes', 'attendance_image');

        }


        $attendance_employe->update($data);

        if ($attendance_employe)
            toastr()->success('تم التعديل بنجاح');
        Moving::getMoving('تعديل وقت الحضور والانصراف ');

        return redirect()->route('EmployeAttendance.index');
    }

    public function destroy($attendance_employe)
    {

        $attendance_employe = attendance_employe::FindOrfail($attendance_employe);
        $attendance_employe->delete();
        Moving::getMoving('حذف وقت الحضور والانصراف ');

        toastr()->success('تم الحذف بنجاح');
        return back();
    }


}
