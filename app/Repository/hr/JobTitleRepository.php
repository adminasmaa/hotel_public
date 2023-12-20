<?php


namespace App\Repository\hr;

use App\Helpers\Moving;
use App\Models\hr\JobTitle;
use App\Interface\hr\JobTitleRepositoryInterface;

class JobTitleRepository implements JobTitleRepositoryInterface
{
    public function index(){
        Moving::getMoving('عرض كل اسماء المسمى الوظيفى ');
        $jobTitles=JobTitle::all();
        return view('pages.hr.jobTitles.index',compact('jobTitles'));
    }
    public function store($request){
        $data=$request->validated();
        $data['userAdd']=auth()->user()->id;
        JobTitle::create($data);
        toastr()->success('تم حفظ بنجاح');
        Moving::getMoving('حفظ المسمى الوظيفى جديد');

        return back();
    }
    public function update($request,$jobTitle){
        $data=$request->validated();
        $data['userEdit']=auth()->user()->id;

        $jobTitle->update($data);
        toastr()->success('تم تعديل بنجاح');
        Moving::getMoving('تعديل المسمى الوظيفى ');

        return back();
    }
    public function destroy(JobTitle $jobTitle){
        if($jobTitle->count>0){
            toastr()->error('لا يمكن حذف هذا العنصر لوجود موظفين ف هذا العنصر');
            return back();
        }
        $jobTitle->delete();
        toastr()->success('تم الحذف بنجاح');
        Moving::getMoving('حذف المسمى الوظيفى ');

        return back();
    }

}
