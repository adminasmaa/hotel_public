<?php


namespace App\Repository\apartment;

use App\Helpers\Moving;
use App\Interface\apartment\viewTypeRepositoryInterface;
use App\Models\Apartment\viewType;

class ViewTypeRepository implements viewTypeRepositoryInterface
{
    public function index(){
        Moving::getMoving('عرض كل اسماء نوع الاطلالات');
        $viewTypes=viewType::all();
        return view('pages.apartments.viewTypes.index',compact('viewTypes'));
    }
    public function store($request){
        $data=$request->validated();
        $data['userAdd']=auth()->user()->id;
        viewType::create($data);
        Moving::getMoving('حفظ نوع الاطلالة جديد');
        toastr()->success('تم حفظ بنجاح');
        return back();
    }
    public function update($request,$viewType){
        $data=$request->validated();
        $data['userEdit']=auth()->user()->id;
        $viewType->update($data);
        Moving::getMoving('تعديل نوع الاطلالة ');
        toastr()->success('تم تعديل بنجاح');
        return back();
    }
    public function destroy($viewType){    
        $viewType->delete();
        Moving::getMoving('حذف  نوع الاطلالة ');
        toastr()->success('تم الحذف بنجاح');
        return back();
    }


}
