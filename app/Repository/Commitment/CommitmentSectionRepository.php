<?php


namespace App\Repository\Commitment;

use App\Helpers\Moving;
use App\Interface\Commitment\CommitmentSectionRepositoryInterface;
use App\Models\Commitment\CommitmentSection;

class CommitmentSectionRepository implements CommitmentSectionRepositoryInterface
{
    public function index(){
        Moving::getMoving('عرض كل اسماء فرع التزامات');
        $commitmentSections=CommitmentSection::all();
        return view('pages.commitments.commitmentSections.index',compact('commitmentSections'));
    }
    public function store($request){
        $data=$request->validated();
        $data['userAdd']=auth()->user()->id;
        CommitmentSection::create($data);
        Moving::getMoving('حفظ فرع التزام جديد');
        toastr()->success('تم حفظ بنجاح');
        return back();
    }
    public function update($request,$commitmentSection){
        $data=$request->validated();
        $data['userEdit']=auth()->user()->id;
        $commitmentSection->update($data);
        Moving::getMoving('تعديل فرع التزام ');
        toastr()->success('تم تعديل بنجاح');
        return back();
    }
    public function destroy($commitmentSection){    
        $commitmentSection->delete();
        Moving::getMoving('حذف  فرع التزام ');
        toastr()->success('تم الحذف بنجاح');
        return back();
    }
}
