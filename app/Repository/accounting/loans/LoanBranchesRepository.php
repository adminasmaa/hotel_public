<?php


namespace App\Repository\accounting\loans;
use App\Helpers\Moving;
use App\Http\Requests\accounting\loans\LoanBranchesRequest;
use App\Interface\accounting\loans\LoanBranchesRepositoryInterface;
use App\Models\accounting\loans\LoanBranches;

class LoanBranchesRepository implements LoanBranchesRepositoryInterface
{
    public function index(){
        Moving::getMoving('عرض  فروع الديون  ');
        $loanBranches=  LoanBranches::all();

        return view('pages.accounting.loans.loans_branches.index',compact('loanBranches'));
    }
    public function store($request){

        $data=$request->validated();
        $data['userAdd']=auth()->user()->id;
        LoanBranches::create($data);
        toastr()->success('تم اضافة بنجاح');
        Moving::getMoving('حفظ فرع  جديد');
        return back();
    }
    public function update($request,$loanbranch){

        $data=$request->all();


       $data['userEdit']=auth()->user()->id;

        $loanbranch->update($data);
        toastr()->success('تم التعديل بنجاح');
        Moving::getMoving('تعديل فرع ');

        return back();
    }
    public function destroy(LoanBranches $loanbranch){

        if($loanbranch->count>0){
            toastr()->error('لا يمكن حذف هذا العنصر لوجود  ديون فى هذا العنصر');
            return back();
        }
        $loanbranch->delete();
        toastr()->success('تم الحذف بنجاح');
        Moving::getMoving('حذف فرع ');

        return back();
    }

}
