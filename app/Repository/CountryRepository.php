<?php


namespace App\Repository;

use App\Helpers\Moving;
use App\Http\Requests\CountryRequest;
use App\Models\Country;
use App\Interface\CountryRepositoryInterface;

class CountryRepository implements CountryRepositoryInterface
{
    public function index(){
        Moving::getMoving('عرض كل اسماء البلد');
        $countries=  Country::all();
        return view('pages.country.index',compact('countries'));
    }
    public function store($request){
        $data=$request->validated();
        $data['userAdd']=auth()->user()->id;
        Country::create($data);
        toastr()->success('تم اضافة بنجاح');
        Moving::getMoving('حفظ بلد جديد');

        return back();
    }
    public function update($request,$country){
        $data=$request->all();
       $data['userEdit']=auth()->user()->id;

        $country->update($data);
        toastr()->success('تم التعديل بنجاح');
        Moving::getMoving('تعديل البلد ');

        return back();
    }
    public function destroy(Country $country){
        if($country->count>0){
            toastr()->error('لا يمكن حذف هذا العنصر لوجود منتجات ف هذا العنصر');
            return back();
        }
        $country->delete();
        toastr()->success('تم الحذف بنجاح');
        Moving::getMoving('حذف البلد ');

        return back();
    }

}
