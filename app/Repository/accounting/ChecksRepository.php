<?php


namespace App\Repository\accounting;
use App\Helpers\Moving;
use App\Models\accounting\Checks;
use App\Interface\accounting\ChecksRepositoryInterface;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;

class ChecksRepository implements ChecksRepositoryInterface
{
    protected $data;
    public function index(){
        Moving::getMoving('عرض كل اسماء الشيكات');
        
        $month =  explode('-', Carbon::now())[1];
        $current = Checks::whereMonth('due_date', '=',$month)->where('type',1)->where('status','!=','cashed')->sum('amount');
        $wanted = Checks::where('type', 1)->where('status','!=','cashed')->sum('amount');
        $delay = Checks::where('type', 0)->sum('amount');
        $cash = Checks::where('status', 'cashed')->sum('amount');

        $this->data['checks'] =  Checks::when(!request()->has('type'),function($q){
            $q->where('deleted_at', NULL)->where('type',1)->where('status','!=','cashed');
         //   return  Checks::where('deleted_at', NULL)->where('type',1)->where('status','!=','cashed');
           })->when(request()->has('type'),function($q){
             $q->where('type', request()->get('type'))->where('status','!=','cashed');
           })->when(request()->has('month') , function ($q) {
             return Checks::whereMonth('due_date', '=',explode('-', Carbon::now())[1])->where('type',1)->where('status','!=','cashed');
           })->when(request()->has('check_status') , function ($q) {
               return Checks::where('status', 'cashed');
            })->when(request()->has('all') , function ($q) {
                return Checks::where('deleted_at', NULL);
             })->get();

        $sum_all = Checks::where('deleted_at', NULL)->sum('amount'); 

        return view('pages.accounting.checks.index',$this->data ,compact('current','wanted','delay','cash','sum_all'));
    }

    public function create(){

        return view('pages.accounting.checks.create');
    }

    

    public function store($request){
       
        $data = $request->all();       
        $data = $request->validated();
        $data['branch_id'] =  Session::has('branch')?Session::get('branch'):$request->branch_id;
        $data['userAdd'] = auth()->user()->id;
        $data['phone'] = $request->phone;
        $data['about_name'] = $request->about_name;
       
        Checks::create($data);
        Moving::getMoving('حفظ شيك جديد');
        toastr()->success('تم حفظ بنجاح');

        return redirect()->route('checks.index');
    }

    public function edit($check){
        return view('pages.accounting.checks.edit',compact('check'));
     }

    public function update($request,$check){
       
        $data=$request->all();
        $data = $request->validated();
        $data['branch_id'] =  Session::has('branch')?Session::get('branch'):$request->branch_id;
        $data['userEdit']=auth()->user()->id;
        $data['phone'] = $request->phone;
        $data['about_name'] = $request->about_name;
        $data['status'] = $request->has('status')? ${request()->get('status')}:0;
        $check->update($data);
        Moving::getMoving('تعديل شيك ');
        toastr()->success('تم تعديل بنجاح');
        return redirect()->route('checks.index');
    }

    public function show($id){
        $check = Checks::findOrFail($id);
        if( request()->has('status'))
        {
            $check->status = request()->get('status');
            $check->save();
            toastr()->success('تم الصرف بنجاح');
            Moving::getMoving('عرض تفاصيل شيك ');
            return redirect()->route('checks.index');
        }
        
        return view('pages.accounting.checks.show', compact('check'));
    }
    public function destroy(Checks $check){

        $check->delete();
        toastr()->success('تم الحذف بنجاح');
        Moving::getMoving('حذف شيك ');
        return back();
    }

    public function duplicate($id)
    { 
        $check = Checks::findOrFail($id);

        $check->replicate()->save();
        toastr()->success('تم تكرار الشيك  بنجاح');
        return redirect()->route('checks.index');
    }
    public function cashed($id)
    {
        $check = Checks::findOrFail($id);
        if($check && ($check->status == 0))
         { 
            $check->update(['status' => 'cashed']);
            toastr()->success('تم الصرف بنجاح');
            Moving::getMoving('صرف شيك ');
           return redirect()->route('checks.index');
         }
         else
         {
            toastr()->error('تم الصرف من قبل ');
           return redirect()->route('checks.index');
        }
       
    }

}
