<?php


namespace App\Repository\hr;

use App\Helpers\Moving;
use App\Interface\hr\AwardDiscountRepositoryInterface;
use App\Models\hr\AwardDiscount;
use App\Models\hr\Employee;
use Carbon\Carbon;

class AwardDiscountRepository implements AwardDiscountRepositoryInterface
{
  

    public function index()
    {
        Moving::getMoving('عرض كل السلف والمكافأت'); 
        $awardDiscounts=AwardDiscount::getEmployee()->when(request()->has('type'),function($q){
             $q->where('type',request()->get('type'));
        })
        ->get();
        return view('pages.hr.awardDiscounts.index', compact('awardDiscounts'));
    }

    public function create()
    {
        $employees=Employee::branchChoose()->get();
        return view('pages.hr.awardDiscounts.create',compact('employees'));
    }

    public function store($request)
    {

        $data = $request->validated();
        $data['num_month']=$request->type=='discount'?intval($request->value/$request->discount_value):'';
        $data['userAdd']=auth()->user()->id;
        $date_of_hiring=Employee::findOrFail($request->employee_id)->date_of_hiring;
        if(!is_null('date_of_hiring')&& Carbon::parse($date_of_hiring)->diffInMonths() < 4){
            toastr()->warning('لا بد ان يكون مده التعين اكبر من 4 شهور');
            return redirect()->route('awardDiscounts.index');
        }
        AwardDiscount::create($data);
        Moving::getMoving('حفظ  سلفه او مكافأة جديد ');
        toastr()->success('تم حفظ بنجاح');
        return redirect()->route('awardDiscounts.index');
    }

    public function edit($awardDiscount)
    {
        $employees=Employee::branchChoose()->get();
        return view('pages.hr.awardDiscounts.edit',compact('awardDiscount','employees'));
    }

    public function update($request, $awardDiscount)
    {
        $data = $request->validated();
        $data['num_month']=$request->type=='discount'?intval($request->value/$request->discount_value):$awardDiscount->num_month;
        $date_of_hiring=Employee::findOrFail($request->employee_id)->date_of_hiring;
        if(!is_null('date_of_hiring')&& Carbon::parse($date_of_hiring)->diffInMonths() < 4){
            toastr()->warning('لا بد ان يكون مده التعين اكبر من 4 شهور');
            return redirect()->route('awardDiscounts.index');
        }
        $data['userEdit'] = auth()->user()->id;
        $awardDiscount->update($data);
        
        toastr()->success('تم تعديل بنجاح');
        Moving::getMoving('تعديل سلفه او مكافأة ');
        return redirect()->route('awardDiscounts.index');
    }

    public function destroy($awardDiscount)
    {
        $awardDiscount->delete();
        toastr()->success('تم الحذف بنجاح');
        Moving::getMoving('حذف سلفه او مكافأة ');
        return back();
    }
    public function show($awardDiscount)
    { 
        return view('pages.hr.awardDiscounts.show',compact('awardDiscount'));
    }
    public function changeStatus(AwardDiscount $awardDiscount){
        $awardDiscount->update([
            'status'=>request()->get('action')
        ]);
        toastr()->success('تم تحديد الحاله بنجاح');
        Moving::getMoving('تحديد حاله السلف او المكافأة');
        return back();
    }

}
