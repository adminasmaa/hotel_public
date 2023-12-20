<?php


namespace App\Repository;

use App\Helpers\Moving;
use App\Http\Requests\GuaranteeRequest;
use App\Models\guarantee;
use App\Interface\GuaranteeRepositoryInterface;

class GuaranteeRepository implements GuaranteeRepositoryInterface
{
    public function index(){
        Moving::getMoving('عرض  مدة الكفالة ');
        $guarantees=  guarantee::all();

        return view('pages.guarantee.index',compact('guarantees'));
    }
    public function store($request){

        $data=$request->validated();

        $data['userAdd']=auth()->user()->id;
        guarantee::create($data);
        toastr()->success('تم اضافة بنجاح');
        Moving::getMoving('حفظ بلد جديد');

        return back();
    }
    public function update($request,$guarantee){
        $data=$request->all();
       $data['userEdit']=auth()->user()->id;

        $guarantee->update($data);
        toastr()->success('تم التعديل بنجاح');
        Moving::getMoving('تعديل البلد ');

        return back();
    }
    public function destroy(guarantee $guarantee){
        if($guarantee->count>0){
            toastr()->error('لا يمكن حذف هذا العنصر لوجود منتجات ف هذا العنصر');
            return back();
        }
        $guarantee->delete();
        toastr()->success('تم الحذف بنجاح');
        Moving::getMoving('حذف البلد ');

        return back();
    }

}
