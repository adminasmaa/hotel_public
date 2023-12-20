<?php


namespace App\Repository\accounting\Bill;

use App\Helpers\Moving;
use App\Interface\accounting\Bill\BillTypeRepositoryInterface;
use App\Models\accounting\Bill\BillsType;

class BillTypeRepository implements BillTypeRepositoryInterface
{
    public function index(){
        Moving::getMoving('عرض كل اسماء انواع الفواتير');
        $billsTypes=BillsType::get();
        return view('pages.accounting.bills.billTypes.index',compact('billsTypes'));
    }
    public function store($request){
        $data=$request->validated();
        $data['userAdd']=auth()->user()->id;
        BillsType::create($data);
        Moving::getMoving('حفظ نوع الفاتورة جديد');
        toastr()->success('تم حفظ بنجاح');
        return back();
    }
    public function update($request,$billsType){
        $data=$request->validated();
        $data['userEdit']=auth()->user()->id;
        $billsType->update($data);
        Moving::getMoving('تعديل نوع الفاتورة ');
        toastr()->success('تم تعديل بنجاح');
        return back();
    }
    public function destroy($billsType){    
        $billsType->delete();
        Moving::getMoving('حذف  نوع الفاتورة ');
        toastr()->success('تم الحذف بنجاح');
        return back();
    }
}
