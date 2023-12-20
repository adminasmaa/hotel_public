<?php


namespace App\Repository\apartment;

use App\Helpers\Moving;
use App\Interface\apartment\bedTypeRepositoryInterface;
use App\Models\Apartment\bedType;

class BedTypeRepository implements bedTypeRepositoryInterface
{
    public function index(){
        Moving::getMoving('عرض كل اسماء نوع سراير');
        $bedTypes=bedType::all();
        return view('pages.apartments.bedTypes.index',compact('bedTypes'));
    }
    public function store($request){
        $data=$request->validated();
        $data['userAdd']=auth()->user()->id;
        bedType::create($data);
        Moving::getMoving('حفظ نوع سرير جديد');
        toastr()->success('تم حفظ بنجاح');
        return back();
    }
    public function update($request,$bedType){
        $data=$request->validated();
        $data['userEdit']=auth()->user()->id;
        $bedType->update($data);
        Moving::getMoving('تعديل نوع سرير ');
        toastr()->success('تم تعديل بنجاح');
        return back();
    }
    public function destroy($bedType){    
        $bedType->delete();
        Moving::getMoving('حذف  نوع سرير ');
        toastr()->success('تم الحذف بنجاح');
        return back();
    }


}
