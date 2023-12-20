<?php


namespace App\Repository\hr;

use App\Helpers\Moving;
use App\Http\Requests\hr\BankRequest;
use App\Models\hr\Bank;
use App\Interface\hr\BankRepositoryInterface;

class BankRepository implements BankRepositoryInterface
{
    public function index(){
        Moving::getMoving('عرض كل اسماء البنوك');
        $banks=Bank::all();
        Moving:: get_user_setting();

        return view('pages.hr.banks.index',compact('banks'));
    }
    public function store($request){
        $data=$request->validated();
        $data['userAdd']=auth()->user()->id;
        Bank::create($data);
        Moving::getMoving('حفظ بنك جديد');

        toastr()->success('تم حفظ بنجاح');
        return back();
    }
    public function update($request,$bank){
        $data=$request->validated();
        $data['userEdit']=auth()->user()->id;
        $bank->update($data);
        Moving::getMoving('تعديل بنك ');

        toastr()->success('تم تعديل بنجاح');
        return back();
    }
    public function destroy(Bank $bank){
        if($bank->count>0){
            toastr()->error('لا يمكن حذف هذا العنصر لوجود موظفين ف هذا العنصر');
            return back();
        }
        $bank->delete();
        toastr()->success('تم الحذف بنجاح');
        Moving::getMoving('حذف بنك ');

        return back();
    }

}
