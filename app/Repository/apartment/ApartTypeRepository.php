<?php


namespace App\Repository\apartment;

use App\Helpers\Moving;
use App\Interface\apartment\ApartTypeRepositoryInterface;
use App\Models\Apartment\Content;
use App\Models\Apartment\Apartment;
use App\Models\Apartment\ApartType;
use App\Models\Apartment\bedType;
use App\Models\Apartment\HomeContent;
use App\Models\Apartment\viewType;
use App\Models\hr\Branch;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class ApartTypeRepository implements ApartTypeRepositoryInterface
{

    protected $data;

    public function __construct()
    {
        $this->data['homeContents']=HomeContent::all();
        $this->data['bedTypes']=bedType::all();
        $this->data['viewTypes']=viewType::all();
        $this->data['branches'] = Branch::withoutGlobalScope('branch')->get();
    }

    public function index(){
        $apartTypes=ApartType::when(auth()->user()->branch_id!=1,function($q){
            $q->where('branch_id',auth()->user()->branch_id);
          })->when(request()->has('branch'),function($q){
             $q->where('branch_id', request()->get('branch'));
          })->get();
        Moving::getMoving('عرض كل اسماء انواع الشقق');
        return view('pages.apartments.types.index',compact('apartTypes'));
    }

    public function create(){
        return view('pages.apartments.types.create',$this->data);
    }

    public function store($request){
        $data = Arr::except($request->validated(), 'content_id');
        $data['userAdd']=auth()->user()->id;
        $apartType=ApartType::create($data);
        $apartType->homeContents()->attach($request->content_id);
        Moving::getMoving('حفظ نوع شقه جديد جديد');
        toastr()->success('تم حفظ بنجاح');
        return redirect()->route('apartTypes.index');
    }

    public function edit($apartType){
        $this->data['apartType']=$apartType;
        $this->data['values']=DB::table('content_types')->where('type_id',$apartType->id)->pluck('content_id')->toArray();
        return view('pages.apartments.types.edit',$this->data);
     }

    public function update($request,$apartType){

        $data = Arr::except($request->validated(), 'content_id');
        $data['userAdd']=auth()->user()->id;
        $apartType->update($data);
        $apartType->homeContents()->sync($request->content_id);
        Moving::getMoving('تعديل نوع شقه ');
        toastr()->success('تم تعديل بنجاح');
        return redirect()->route('apartTypes.index');
    }

    public function destroy($apartType){      
       $apartType->delete();
        toastr()->success('تم الحذف بنجاح');
        Moving::getMoving('حذف نوع شقه ');
        return back();
    }
    public function getApart(ApartType $apartType,$request){
        $aparts=$apartType->apart;
        $apartVal=$request->apartVal??'';

        $html = view('pages.apartments.types.getapart', compact('aparts','apartVal'))->render();

        return response()->json([
            'data' => $html
        ]);
    }
}
