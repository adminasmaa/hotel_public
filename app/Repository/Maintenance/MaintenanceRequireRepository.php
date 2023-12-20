<?php


namespace App\Repository\Maintenance;

use App\Helpers\Moving;

use App\Interface\Maintenance\MaintenanceRequireRepositoryInterface;
use App\Models\Maintenance\MaintenanceRequire;

class MaintenanceRequireRepository implements MaintenanceRequireRepositoryInterface
{
    public function index(){
        Moving::getMoving('عرض كل اسماء نوع صيانات');
        $maintenanceRequires=MaintenanceRequire::all();
        return view('pages.maintanences.requires.index',compact('maintenanceRequires'));
    }
    public function store($request){
        $data=$request->validated();
        $data['userAdd']=auth()->user()->id;
        MaintenanceRequire::create($data);
        Moving::getMoving('حفظ نوع صيانه جديد');
        toastr()->success('تم حفظ بنجاح');
        return back();
    }
    public function update($request,$maintenanceRequire){
        $data=$request->validated();
        $data['userEdit']=auth()->user()->id;
        $maintenanceRequire->update($data);
        Moving::getMoving('تعديل نوع صيانه ');
        toastr()->success('تم تعديل بنجاح');
        return back();
    }
    public function destroy($maintenanceRequire){    
        $maintenanceRequire->delete();
        Moving::getMoving('حذف  نوع صيانه ');
        toastr()->success('تم الحذف بنجاح');
        return back();
    }
}
