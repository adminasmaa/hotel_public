<?php


namespace App\Repository\main;

use App\Helpers\Moving;
use App\Models\main\Classes;
use App\Models\main\Marks;
use App\Interface\main\ClassesRepositoryInterface;

use App\Models\main\Product;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ClassesRepository implements ClassesRepositoryInterface
{
    protected $data;

    public function __construct()
    {
        $this->data['classes']  = Classes::all();
        $this->data['marks']  = Marks::all();


    }

    public function index(){
        Moving::getMoving('عرض الاصناف');
        return  view('pages.main.classes.index',$this->data);
    }

    public function create(){
        return view('pages.main.classes.create',$this->data);
    }

    public function store($request){

         $data=$request->validated();
         $data['userAdd']=auth()->user()->id;
        Classes::create($data);
        toastr()->success('تم حفظ بنجاح');
        Moving::getMoving('حفظ صنف جديد');

        return  redirect()->route('classes.index');
    }

    public function edit($class){

        Moving::getMoving('تعديل صنف ');
        $this->data['class']=$class;
        return view('pages.main.classes.edit',$this->data);
     }

    public function update($request,$class){
        $data=$request->validated();
        $data['userEdit']=auth()->user()->id;
        $class->update($data);
        if ($class)
           toastr()->success('تم التعديل بنجاح');
          Moving::getMoving('تعديل صنف ');
         return redirect()->route('classes.index');
    }
    public function destroy(Classes $employee){
        $employee->delete();
        toastr()->success('تم الحذف بنجاح');
        Moving::getMoving('حذف صنف ');


        return back();
    }

}
