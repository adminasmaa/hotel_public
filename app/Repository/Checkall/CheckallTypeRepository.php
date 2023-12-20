<?php

namespace App\Repository\Checkall;

use App\Helpers\Moving;
use App\Interface\Checkall\CheckallTypeRepositoryInterface;
use App\Models\Checkall\CheckallType;

class CheckallTypeRepository implements CheckallTypeRepositoryInterface
{
    public function index()
    {
        Moving::getMoving('عرض كل انواع التفتيش');
        $checkallTypes = CheckallType::all();
        Moving::get_user_setting();

        return view('pages.checkall.checkallTypes.index', compact('checkallTypes'));
    }
    public function store($request)
    {

        $data = $request->validated();
        CheckallType::create($data);
        Moving::getMoving('حفظ نوع تفتيش جديد ');
        toastr()->success('تم حفظ بنجاح');
        Moving::getMoving('حفظ نوع تفتيش جديد ');

        return back();
    }
    public function update($request, $checkallType)
    {
        $data = $request->validated();
        $checkallType->update($data);
        Moving::getMoving('تعديل نوع تفتيش ');
        toastr()->success('تم تعديل بنجاح');
        Moving::getMoving('تعديل نوع تفتيش ');

        return back();
    }
    public function destroy(CheckallType $checkallType)
    {

        if(count($checkallType->checkall)>0){
            toastr()->message('يوجد تفتيش خاص هذا النوع يتم حذف عند الحذف  ');

        }
        $checkallType->delete();
        Moving::getMoving('حذف نوع تفتيش ');
        toastr()->success('تم الحذف بنجاح');
        Moving::getMoving('حذف نوع تفتيش ');

        return back();
    }

}
