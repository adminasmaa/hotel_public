<?php


namespace App\Repository\rating;

use App\Helpers\Moving;

use App\Interface\rating\RatingQuestionsRepositoryInterface;
use App\Models\rating\RatingQuestions;
use App\Models\hr\Profession;
use App\Models\rating\Rating_types;
use App\Http\Requests\rating\RatingQuestionsRequest;
use Illuminate\Support\Facades\Validator;


class RatingQuestionsRepository implements RatingQuestionsRepositoryInterface
{
    protected $data;

    public function __construct()
    {
        
        $this->data['professions']= Profession::all();
          $this->data['rating_types']=Rating_types::when(request()->has('profession'),function($q){
                    $q->where('profession_id',request()->get('profession'));
                    })->get();

    }

    public function index(){
         Moving::getMoving('عرض الاسئلة  ');
         $this->data['rating_question']=RatingQuestions::when(request()->has('profession'),function($q){
             $q->where('profession_id',request()->get('profession'));
        })->when(request()->has('type'),function($r){
             $r->where('type_id',request()->get('type'));
        })->get();
        return view('pages.rating.rating_questions.index',$this->data);
    }

    public function create(){
        $_data =Rating_types::pluck('profession_id');
        $this->data['professions']= Profession::whereIn('id',$_data)->get();
        return view('pages.rating.rating_questions.create',$this->data);
    }

    public function store(RatingQuestionsRequest $request){
        $data=$request->validated();
       $this->data['rating_question']=RatingQuestions::where('profession_id',$request->profession_id)->where('type_id', $request->type_id)->get();
      
        $data['userAdd']=auth()->user()->id;
        RatingQuestions::create($data);
        toastr()->success('تم حفظ بنجاح');
        Moving::getMoving('حفظ سؤال جديد');

        return  redirect()->route('rating_questions.index',array('profession'=>$request->profession_id , 'type'=>$request->type_id));
    }

    public function show($question){

        return view('pages.rating.rating_questions.show',compact('question'));
     }

    public function edit( $question){
        $question = RatingQuestions::findorfail($question);
        $this->data['quest']=$question;
        return view('pages.rating.rating_questions.edit',$this->data);
     }

    public function update($request,$question){

        $data=$request->validated();
        $question = RatingQuestions::findorfail($question);
        $data['userEdit']=auth()->user()->id;
        $question->update($data);
        toastr()->success('تم تعديل بنجاح');
        Moving::getMoving('تعديل سؤال ');


        return redirect()->route('rating_questions.index',array('profession' =>request()->get('profession')));
    }
    public function destroy( $ques){
        $ques = RatingQuestions::findorfail($ques);
        $ques->delete();
        toastr()->success('تم الحذف بنجاح');
        Moving::getMoving('حذف سؤال ');
        return back();
    }

    public function getTypes($request)
    {
        $types = Rating_types::select('id','name','profession_id')
         ->where('profession_id',$request)
         ->get();
         $data['data']=$types;

     return response()->json($data);
     }

}
