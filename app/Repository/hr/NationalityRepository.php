<?php


namespace App\Repository\hr;
use App\Helpers\Moving;
use App\Http\Requests\hr\NationalityRequest;
use App\Models\hr\Nationality;
use App\Interface\hr\NationalityRepositoryInterface;

class NationalityRepository implements NationalityRepositoryInterface
{
    public function index(){
        Moving::getMoving('عرض كل الجنسيه ');
        $nationalities=Nationality::all();
        return view('pages.hr.nationalities.index',compact('nationalities'));
    }
    public function store($request){
        $data=$request->validated();
        $data['userAdd']=auth()->user()->id;
        Nationality::create($data);
        toastr()->success('تم حفظ بنجاح');
        Moving::getMoving('حفظ الجنسيه جديد');

        return back();
    }
    public function update($request,$nationality){
        $data=$request->validated();
        $data['userEdit']=auth()->user()->id;
        $nationality->update($data);
        toastr()->success('تم تعديل بنجاح');
        Moving::getMoving('تعديل الجنسيه ');

        return back();
    }
    public function destroy(Nationality $nationality){
        if($nationality->count>0){
            toastr()->error('لا يمكن حذف هذا العنصر لوجود موظفين ف هذا العنصر');
            return back();
        }
        $nationality->delete();
        Moving::getMoving('حذف الجنسيه');

        toastr()->success('تم الحذف بنجاح');
        return back();
    }

}
