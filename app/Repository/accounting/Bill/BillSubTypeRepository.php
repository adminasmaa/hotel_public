<?php


namespace App\Repository\accounting\Bill;

use App\Helpers\Moving;
use App\Interface\accounting\Bill\BillSubTypeRepositoryInterface;
use App\Models\accounting\Bill\BillsSubType;
use App\Models\accounting\Bill\BillsType;

class BillSubTypeRepository implements BillSubTypeRepositoryInterface
{
    public function index(){
        Moving::getMoving('عرض كل اسماء انواع الفرعى للفواتير');
        $billsSubTypes=BillsSubType::when(request()->has('type'),function($q){
             $q->where('type_id',request()->get('type'));
        })->get();
        return view('pages.accounting.bills.billSubTypes.index',compact('billsSubTypes'));
    }
    public function store($request){
        $data=$request->validated();
        $data['userAdd']=auth()->user()->id;
        BillsSubType::create($data);
        Moving::getMoving('حفظ نوع الفرعى للفاتورة جديد');
        toastr()->success('تم حفظ بنجاح');
        return back();
    }
    public function update($request,$billsSubType){
        $data=$request->validated();
        $data['userEdit']=auth()->user()->id;
        $billsSubType->update($data);
        Moving::getMoving('تعديل نوع الفرعى للفاتورة ');
        toastr()->success('تم تعديل بنجاح');
        return back();
    }
    public function destroy($billsSubType){    
        $billsSubType->delete();
        Moving::getMoving('حذف  نوع الفرعى للفاتورة ');
        toastr()->success('تم الحذف بنجاح');
        return back();
    }
    public function getSubTypes(BillsType $billsType){
        $subTypes=$billsType->subType;
        $name=$billsType->name;
        $sub=request()->has("sub")?request()->get("sub"):'';
    
        $html = view('pages.accounting.bills.billSubTypes.getSubType', compact('subTypes','name','sub'))->render();

        return response()->json([
            'data' => $html
        ]);
    }
}
