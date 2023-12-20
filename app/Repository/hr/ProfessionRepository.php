<?php


namespace App\Repository\hr;

use App\Helpers\Moving;
use App\Http\Requests\hr\ProfessionRequest;
use App\Models\hr\Profession;
use App\Interface\hr\ProfessionRepositoryInterface;

class ProfessionRepository implements ProfessionRepositoryInterface
{
    public function index(){
        Moving::getMoving('عرض كل اسماء المهنه');
        $professions=Profession::all();
        return view('pages.hr.professions.index',compact('professions'));
    }
    public function store($request){
        $data=$request->validated();
        $data['userAdd']=auth()->user()->id;
        Profession::create($data);
        toastr()->success('تم حفظ بنجاح');
        Moving::getMoving('حفظ المهنه جديد');

        return back();
    }
    public function update($request,$profession){
        $data=$request->validated();
        $data['userEdit']=auth()->user()->id;

        $profession->update($data);
        toastr()->success('تم تعديل بنجاح');
        Moving::getMoving('تعديل المهنه ');

        return back();
    }
    public function destroy(Profession $profession){
        if($profession->count>0){
            toastr()->error('لا يمكن حذف هذا العنصر لوجود موظفين ف هذا العنصر');
            return back();
        }
        $profession->delete();
        toastr()->success('تم الحذف بنجاح');
        Moving::getMoving('حذف المهنه ');

        return back();
    }

}
