<?php


namespace App\Repository\filemanger;
use App\Helpers\Moving;
use App\Http\Requests\filemanger\files_deptsRequest;
use App\Models\filemanger\files_depts;
use App\Interface\filemanger\files_deptsRepositoryInterface;
use App\Models\filemanger\filesmanger;

class files_deptsRepository implements files_deptsRepositoryInterface
{
    public function index()
    {
        $this->data['files_depts'] =filesmanger::when(request()->has('file_dept_id') && request()->get('file_dept_id') != '', function ($q) {
            return $q->where('file_dept_id', request()->get('file_dept_id'));
       })
            ->get();


        Moving::getMoving('عرض كل اسماء اقسام الملفات');
        $files_depts = files_depts::all();

        return view('pages.filemanger.files_depts.index', compact('files_depts'));
    }

    public function store($request)
    {
        // dd($request->all());
        $data = $request->validated();
        $data['userAdd'] = auth()->user()->id;
        files_depts::create($data);
        toastr()->success('تم اضافة بنجاح');
        Moving::getMoving('حفظ قسم الملف جديد');

        return back();
    }

    public function update($request, $filesDept)
    {
        $data = $request->all();
        $data['userEdit'] = auth()->user()->id;

        $filesDept->update($data);
        toastr()->success('تم التعديل بنجاح');
        Moving::getMoving('تعديل البلد ');

        return back();
    }

    public function destroy(files_depts $files_dept)
    {
        if($files_dept->count>0){
            toastr()->error('لا يمكن حذف هذا العنصر لوجود ملفات  هذا العنصر');
            return back();
        }


        $files_dept->delete();
        toastr()->success('تم الحذف بنجاح');
        Moving::getMoving('حذف قسم ملف ');
        return back();
    }

}
