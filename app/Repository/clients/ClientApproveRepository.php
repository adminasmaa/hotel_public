<?php


namespace App\Repository\clients;
use App\Helpers\Moving;
use App\Interface\clients\ClientApproveRepositoryInterface;
use App\Models\clients\ClientApprove;

class ClientApproveRepository implements ClientApproveRepositoryInterface
{
    public function index(){
        Moving::getMoving('عرض كل اسماء اثبات');
        $clientApprove=ClientApprove::all();
        return view('pages.clients.approve.index',compact('clientApprove'));
    }
    public function store($request){
        $data=$request->validated();
        $data['userAdd']=auth()->user()->id;
        ClientApprove::create($data);
        toastr()->success('تم حفظ بنجاح');
        Moving::getMoving('حفظ اثبات جديد');

        return back();
    }
    public function update($request,$clientApprove){
        $data=$request->validated();
        $data['userEdit']=auth()->user()->id;
        ClientApprove::findOrFail($clientApprove)->update($data);
        toastr()->success('تم تعديل بنجاح');
        Moving::getMoving('تعديل اثبات ');

        return back();
    }
    public function destroy($clientApprove){
        ClientApprove::findOrFail($clientApprove)->delete();
        toastr()->success('تم الحذف بنجاح');
        Moving::getMoving('حذف اثبات ');
        return back();
    }

}
