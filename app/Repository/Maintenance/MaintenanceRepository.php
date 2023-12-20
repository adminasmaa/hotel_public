<?php


namespace App\Repository\Maintenance;

use App\Helpers\Moving;
use App\Models\Apartment\Content;
use App\Interface\Maintenance\MaintenanceRepositoryInterface;
use App\Models\Apartment\Apartment;
use App\Models\Apartment\ApartType;
use App\Models\Apartment\HomeContent;
use App\Models\Maintenance\Maintenance;
use App\Models\Maintenance\MaintenanceRequire;

class MaintenanceRepository implements MaintenanceRepositoryInterface
{

    public function index(){
       
        Moving::getMoving('عرض كل اسماء صيانات');
        $maintenances=Maintenance::when(request()->has('expired'),function($q){
            $q->whereNotNull('expired_at');
        })->when(!request()->has('expired'),function($q){
            $q->whereNull('expired_at');
        })->get();
        return view('pages.maintanences.maintanences.index',compact('maintenances'));

    }

    public function create(){
        $types=ApartType::all();
        $homeContents=HomeContent::all();
        $requires=MaintenanceRequire::all();
        return view('pages.maintanences.maintanences.create',compact('homeContents','types','requires'));
    }

    public function store($request){
        $data=$request->validated();
        $data['userAdd']=auth()->user()->id;  
        Maintenance::create($data);
        Moving::getMoving('حفظ صيانه جديد');
        toastr()->success('تم حفظ بنجاح');
        return redirect()->route('maintenances.index');
    }

    public function edit($maintenance){
        $types=ApartType::all();
        $homeContents=HomeContent::all();
        $requires=MaintenanceRequire::all();
        return view('pages.maintanences.maintanences.edit',compact('maintenance','homeContents','types','requires'));
     }

    public function update($request,$maintenance){

        $data=$request->validated();
        $data['userEdit']=auth()->user()->id;   
        $maintenance->update($data);
        Moving::getMoving('تعديل صيانه ');
        toastr()->success('تم تعديل بنجاح');
        return redirect()->route('maintenances.index');
    }

    public function destroy($maintenance){  
       $maintenance->delete();
        toastr()->success('تم الحذف بنجاح');
        Moving::getMoving('حذف صيانه ');
        return back();
    }
    public function expired(Maintenance $maintenance){
        $maintenance->update([
            'expired_at'=>now()
        ]);
        toastr()->success('تم انجاز هذه الصيانه بنجاح');
        Moving::getMoving('انجاز صيانه ');
        return back();
    }
    
}
