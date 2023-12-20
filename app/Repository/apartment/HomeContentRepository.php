<?php


namespace App\Repository\apartment;

use App\Helpers\Moving;
use App\Http\Requests\apartment\HomeContentRequest;
use App\Models\Apartment\HomeContent;
use App\Interface\apartment\HomeContentRepositoryInterface;
use App\Models\hr\Branch;
use Illuminate\Support\Facades\Storage;

class HomeContentRepository implements HomeContentRepositoryInterface
{
    public function index(){
        
        Moving::getMoving('عرض كل اسماء محتويات الشقه');
        $homeContents=(request()->has('branch')&&count(Branch::withoutGlobalScope('branch')->findOrFail(request()->get('branch'))->content)>0)?Branch::withoutGlobalScope('branch')->findOrFail(request()->get('branch'))->content:HomeContent::all();
       
        Moving:: get_user_setting();

        return view('pages.apartments.homeContents.index',compact('homeContents'));
    }
    public function store($request){
        $data=$request->validated();
        $data['userAdd']=auth()->user()->id;
        HomeContent::create($data);
        Moving::getMoving('حفظ محتويات الشقه جديد');
        toastr()->success('تم حفظ بنجاح');
        Moving::getMoving('حفظ محتويات الشقه جديد');

        return back();
    }
    public function update($request,$homeContent){
        $data=$request->validated();
        $data['userEdit']=auth()->user()->id;
        $homeContent->update($data);
        Moving::getMoving('تعديل محتويات الشقه ');
        toastr()->success('تم تعديل بنجاح');
        return back();
    }
    public function destroy(HomeContent $homeContent){    
        $homeContent->delete();
        Moving::getMoving('حذف محتويات الشقه ');
        toastr()->success('تم الحذف بنجاح');
        Moving::getMoving('حذف محتويات الشقه ');
        return back();
    }
    public function chooseContent($request){
        $branch=auth()->user()->branch;
        $branch->content()->sync($request->content_id);
        toastr()->success('تم اختيار مرافق بنجاح');
        Moving::getMoving('اختيار مرافق');
        return back();
    }


}
