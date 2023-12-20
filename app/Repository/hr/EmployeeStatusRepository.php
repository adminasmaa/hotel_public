<?php


namespace App\Repository\hr;

use App\Helpers\Moving;
use App\Models\hr\EmployeeStatus;
use App\Interface\hr\EmployeeStatusRepositoryInterface;

class EmployeeStatusRepository implements EmployeeStatusRepositoryInterface
{
    public function index(){
        Moving::getMoving('عرض كل اسماء حاله الموظف');
        $employeeStatuss=EmployeeStatus::all();
        return view('pages.hr.employeeStatuses.index',compact('employeeStatuss'));
    }
    public function store($request){
        $data=$request->validated();
        $data['userAdd']=auth()->user()->id;
        EmployeeStatus::create($data);
        toastr()->success('تم حفظ بنجاح');
        Moving::getMoving('حفظ حاله الموظف جديد');

        return back();
    }
    public function update($request, $id){
        $data=$request->validated();
        $employeeStatus=EmployeeStatus::findOrFail($id);
        $data['userEdit']=auth()->user()->id;
        $employeeStatus->update($data);
        toastr()->success('تم تعديل بنجاح');
        Moving::getMoving('تعديل حاله الموظف ');

        return back();
    }
    public function destroy(EmployeeStatus $request,$id){
        $employeeStatus=EmployeeStatus::findOrFail($id);
        if($employeeStatus->count>0){
            toastr()->error('لا يمكن حذف هذا العنصر لوجود موظفين ف هذا العنصر');
            return back();
        }
        $employeeStatus->delete();
        toastr()->success('تم الحذف بنجاح');
        Moving::getMoving('حذف حاله الموظف ');

        return back();
    }

}
