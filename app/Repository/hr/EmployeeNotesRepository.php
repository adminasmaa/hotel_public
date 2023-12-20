<?php


namespace App\Repository\hr;

use App\Helpers\Moving;
use App\Models\hr\EmployeeNotes;
use App\Interface\hr\EmployeeNotesRepositoryInterface;
use App\Models\hr\Branch;
use App\Models\hr\Nationality;
use App\Models\hr\Profession;
use App\Models\hr\Qualification;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;


class EmployeeNotesRepository implements EmployeeNotesRepositoryInterface
{
    protected $data;
    protected $images = ["note_img"];

    public function __construct()
    {
        $this->data['branches'] = Branch::withoutGlobalScope('branch')->get();
    //    $this->data['branches'] = Branch::when(request()->has('employee_id'), function ($q) {
    //     $q->where('emp_id', request()->get('employee_id'));
    // })->get();
    // $_data =Rating_types::pluck('profession_id');
    // $this->data['professions']= Profession::whereIn('id',$_data)->get();
       // dd($this->data['branches'] );
        // $this->data['nationalities'] = Nationality::all();
        // $this->data['professions'] = Profession::all();
        // $this->data['banks'] = Bank::all();
        // $this->data['jobTitles'] = JobTitle::all();
        // $this->data['qualifications'] = Qualification::all();
        // $this->data['EmployeeNotes'] = EmployeeNotes::when(request()->has('employee_id'), function ($q) {
        //     $q->where('emp_id', request()->get('employee_id'));
        // })->get();
        // $this->data['employees'] = Employee::where('emp_state_id', '!=', 5)->get();
    }

    public function index()
    {
        Moving::getMoving('عرض كل ملاحظات الموظفين');
        $this->data['EmployeeNotes'] = EmployeeNotes::when(request()->has('emp_id'), function ($q) {
                $q->where('emp_id', request()->get('emp_id'));
            })->when(request()->has('branch'), function ($q) {
                $q->where('branch_id',request()->get('branch'));
            })->groupBy('branch_id')->get();

            if(request()->has('emp_id'))
            {
                echo  $this->show($this->data['EmployeeNotes']);
            }
            // else

            // $this->data['EmployeeNotes'] = EmployeeNotes::when(request()->has('employee'), function ($q) {
            //     $q->where('emp_id', request()->get('employee'));
            // })->when(request()->has('branch'), function ($q) {
            //     $q->where('branch_id',request()->get('branch'));
            // })->groupBy('branch_id')->get();
       // 
        return view('pages.hr.employeesNotes.index', $this->data);
    }

    public function create()
    {
        return view('pages.hr.employeesNotes.create', $this->data);
    }

    public function store($request)
    {
        $data = $request->validated();
      // dd($request->all());
        $data['note_img'] = Moving::upload($request,'Employee_Notes','note_img');
        $data['emp_id'] = $request->emp_id;
        $data['branch_id'] = $request->branch_id;
        $data['userAdd'] = auth()->user()->id;
        $note = EmployeeNotes::create($data);
        if($note)
        toastr()->success('تم حفظ بنجاح');
        Moving::getMoving('حفظ ملاحظة جديدة');
    //    return redirect()->route('EmployeeNotes.index', array('branch' => request()->get('branch_id'),'emp_id' => request()->get('emp_id')));
         return back();
    }

    public function update($request, $EmployeeNote)
    {
        $data = $request->validated();
        $data['userEdit'] = auth()->user()->id;
        if ($request->hasFile('note_img')) {
            $data['note_img']=Moving::upload($request,'Employee_Notes','note_img');

        }
        $note = $EmployeeNote->update($data);
        if($note)
        toastr()->success('تم تعديل بنجاح');
        Moving::getMoving('تعديل ملاحطة ');
        return back();
    }
    public function show($branch){
        $url = request()->url()."?emp_id=".request()->get('emp_id')."&br_id=".request()->get('br_id');
        if(request()->has('emp_id') )
        { 
            $EmployeeNotes =  EmployeeNotes::where('branch_id',request()->get('br_id'))->where('emp_id',request()->get('emp_id'))
            ->when(request()->has('type'), function ($q) {
                 $q->where('note_type', request()->get('type'));
             })->when(request()->has('onlytrash'),function($r){
                 $r->onlyTrashed();
             })->when(request()->has('withtrash'),function($r){
                 $r->withTrashed();
             })->get();
             $EmployeeNote = EmployeeNotes::where('branch_id',request()->get('br_id'))->where('emp_id',request()->get('emp_id'))->withTrashed()->get();

             $del_Notes = EmployeeNotes::onlyTrashed()->where('branch_id',request()->get('br_id'))->where('emp_id',request()->get('emp_id'))->get();  
       
        }
        else
        {
            $EmployeeNotes = EmployeeNotes::where('branch_id',$branch)
            ->when(request()->has('type'), function ($q) {
                 $q->where('note_type', request()->get('type'));
             })->when(request()->has('onlytrash'),function($r){
                 $r->onlyTrashed();
             })->when(request()->has('withtrash'),function($r){
                 $r->withTrashed();
             })->get();
             $EmployeeNote = EmployeeNotes::where('branch_id',$branch)->withTrashed()->get();

             $del_Notes = EmployeeNotes::onlyTrashed()->where('branch_id',$branch)->get();
                   
        }
        Moving::getMoving('عرض الملاحظات ');
    
        return view('pages.hr.employeesNotes.show',compact('EmployeeNotes','EmployeeNote','del_Notes','url'));
     }

    public function destroy(EmployeeNotes $EmployeeNote)
    {
        $EmployeeNote->userDelete = auth()->user()->id;
        $EmployeeNote->update();
        $EmployeeNote->delete();
        toastr()->success('تم الحذف بنجاح');
        Moving::getMoving('حذف الموظف ');

        return back();
    }

    public function restore($id)
    {
        $EmployeeNote = EmployeeNotes::withTrashed()->find($id);
        $EmployeeNote->userDelete = null;
        $EmployeeNote->update();
        $EmployeeNote->restore();
        return back();
    }  

}
