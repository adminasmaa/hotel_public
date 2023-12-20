<?php


namespace App\Repository\hr;

use App\Helpers\Moving;
use App\Http\Requests\hr\QualificationRequest;
use App\Models\hr\Qualification;
use App\Interface\hr\QualificationRepositoryInterface;

class QualificationRepository implements QualificationRepositoryInterface
{
    public function index(){
        Moving::getMoving('عرض كل اسماء الموهل');
        $qualifications=  Qualification::all();
        return view('pages.hr.qualifications.index',compact('qualifications'));
    }
    public function store($request){
        $data=$request->validated();
        $data['userAdd']=auth()->user()->id;
        Qualification::create($data);
        toastr()->success('تم اضافة بنجاح');
        Moving::getMoving('حفظ الموهل جديد');

        return back();
    }
    public function update($request,$qualification){
        $data=$request->validated();
        $data['userEdit']=auth()->user()->id;

        $qualification->update($data);
        toastr()->success('تم التعديل بنجاح');
        Moving::getMoving('تعديل الموهل ');

        return back();
    }
    public function destroy(Qualification $qualification){
        if($qualification->count>0){
            toastr()->error('لا يمكن حذف هذا العنصر لوجود موظفين ف هذا العنصر');
            return back();
        }
        $qualification->delete();
        toastr()->success('تم الحذف بنجاح');
        Moving::getMoving('حذف الموهل ');

        return back();
    }

}
