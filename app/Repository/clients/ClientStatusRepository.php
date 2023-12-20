<?php


namespace App\Repository\clients;
use App\Helpers\Moving;
use App\Interface\clients\ClientStatusRepositoryInterface;
use App\Models\clients\Client_statuses;

class ClientStatusRepository implements ClientStatusRepositoryInterface
{
    public function index(){
        Moving::getMoving('عرض كل حاله العملاء ');
        $clientStatuses=Client_statuses::all();
        return view('pages.clients.status.index',compact('clientStatuses'));
    }
    public function store($request){
        $data=$request->validated();
        $data['userAdd']=auth()->user()->id;
        Client_statuses::create($data);
        toastr()->success('تم حفظ بنجاح');
        Moving::getMoving('حفظ حاله جديد');

        return back();
    }
    public function update($request,$clientStatus){
        $data=$request->validated();
        $data['userEdit']=auth()->user()->id;


        Client_statuses::findOrFail($clientStatus)->update($data);
        toastr()->success('تم تعديل بنجاح');

        Moving::getMoving('تعديل حاله ');

        return back();
    }
    public function destroy($clientStatus){
        Client_statuses::findOrFail($clientStatus)->delete();
        toastr()->success('تم الحذف بنجاح');
        Moving::getMoving('حذف حاله ');
        return back();
    }

}
