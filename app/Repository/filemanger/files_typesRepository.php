<?php


namespace App\Repository\filemanger;
use App\Helpers\Moving;
use App\Http\Requests\filemanger\files_typesRequest;
use App\Models\filemanger\files_types;
use App\Interface\filemanger\files_typesRepositoryInterface;

class files_typesRepository implements files_typesRepositoryInterface
{
    public function index()
    {
        Moving::getMoving('عرض كل اسماء انواع الملفات');
        $files_types = files_types::all();
        return view('pages.filemanger.files_types.index', compact('files_types'));
    }

    public function store($request)
    {
        $data = $request->validated();
        $data['userAdd'] = auth()->user()->id;



        files_types::create($data);
        toastr()->success('تم اضافة بنجاح');
        Moving::getMoving('حفظ بلد جديد');

        return back();
    }

    public function update($request, $files_type)

    {
        $data = $request->all();
       // dd($files_type);
        $data['userEdit'] = auth()->user()->id;

        $files_type->update($data);
       // dd($files_type);
        toastr()->success('تم التعديل بنجاح');
        Moving::getMoving('تعديل نوع الملف ');

        return back();
    }

    public function destroy(files_types $files_type)
    {

        if($files_type->count>0){
            toastr()->error('لا يمكن حذف هذا العنصر لوجود ملفات  هذا العنصر');
            return back();
        }
        $files_type->delete();
        toastr()->success('تم الحذف بنجاح');
        Moving::getMoving('حذف البلد ');

        return back();
    }

}
