<?php


namespace App\Repository\rating;

use App\Helpers\Moving;

use App\Interface\rating\RatingTypesRepositoryInterface;
use App\Models\rating\Rating_types;
use App\Models\rating\RatingQuestions;
use App\Models\rating\Rating;
use App\Models\hr\Profession;
use App\Http\Requests\rating\RatingTypesRequest;
use Illuminate\Support\Facades\Validator;


class RatingTypesRepository implements RatingTypesRepositoryInterface
{
    protected $data;

    public function __construct()
    {
        $this->data['professions']= Profession::all();
      
    }

    public function index(){
         Moving::getMoving('عرض أنواع التقييم  ');
         $this->data['rating_types']=Rating_types::when(request()->has('profession'),function($q){
            $q->where('profession_id',request()->get('profession'));
        })->groupBy('profession_id')->get();

        return view('pages.rating.ratingTypes.index',$this->data);
    }

    public function create(){
        $_data =Rating_types::pluck('profession_id');
        $this->data['professions']= Profession::whereIn('id',$_data)->get();
        return view('pages.rating.ratingTypes.create',$this->data);
    }

    public function store(RatingTypesRequest $request){
        $data=$request->validated();
       // dd($request->profession_id);
        $data['userAdd']=auth()->user()->id;
        Rating_types::create($data);
        toastr()->success('تم حفظ بنجاح');
        Moving::getMoving('حفظ نوع جديد');

        return  redirect()->route('rating_types.index');
    }

    public function show($type){
        Moving::getMoving('عرض أنواع التقييم  ');
        $this->data['rating_types']=Rating_types::where('profession_id',$type)->get();
        $this->data['type'] = $type;
        return view('pages.rating.ratingTypes.show',$this->data);
     }
     public function print($type){

        return view('pages.rating.ratingTypes.show',compact('type'));
     }
    public function edit($type){
        $type = Rating_types::findorfail($type);
        $this->data['type']=$type;
        return view('pages.rating.ratingTypes.edit',$this->data);
     }

    public function update($request,$type){
        $data=$request->validated();
        $type = Rating_types::findorfail($type);
        $data['userEdit']=auth()->user()->id;
        $type->update($data);
        if(!$request->closing )
         {  toastr()->success('تم تعديل بنجاح');}
          Moving::getMoving('تعديل نوع ');

        return redirect()->route('rating_types.index');
    }
    public function destroy( $type){
        $type = Rating_types::findorfail($type);
        $type->delete();
        toastr()->success('تم الحذف بنجاح');
        Moving::getMoving('حذف نوع تقييم ');

        return redirect()->route('rating_types.index');
    }
}
