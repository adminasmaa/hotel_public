<?php


namespace App\Repository\filemanger;

use App\Helpers\Moving;
use App\Interface\filemanger\filesmanagerRepositoryInterface;
use App\Models\filemanger\filesmanger;
use App\Models\filemanger\files_types;
use App\Models\filemanger\files_depts;
use App\Models\main\Types;
use App\Models\hr\Branch;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;


class filesmanagerRepository implements filesmanagerRepositoryInterface
{
    public function __construct()
    {
        $this->data['files_types'] = files_types::all();
        $this->data['types'] = DB::table('hr_file_type')->get();
        $this->data['files_depts'] = files_depts::all();
        $this->data['branches'] = Branch::withoutGlobalScope('branch')->get();


    }


    public function index()
    {
        $filesmangers = filesmanger::when(request()->has('file_dept_id') && request()->get('file_dept_id') != '', function ($q) {
            return $q->where('file_dept_id', request()->get('file_dept_id'));
        })
            ->when(request()->has('file_type_id') && request()->get('file_type_id') != '', function ($q) {
                return $q->where('file_type_id', request()->get('file_type_id'));
            })
            ->when(request()->has('onlytrash'), function ($q) {
                $q->onlyTrashed();
            })->orderBy('created_at', 'desc')
            ->get();
        //
        Moving::getMoving('عرض الملفات');


        return view('pages.filemanger.index', $this->data, compact('filesmangers'));
    }

    public function create()
    {
        return view('pages.filemanger.create', $this->data);
    }


    public function store($request)
    {


        $data = $request->all();
        $data['path'] = Moving::upload($request, 'filesmangers', 'path');
        filesmanger::create($data);

        toastr()->success('تم الاضافة بنجاح');
        Moving::getMoving('الاضافة الى مدي الملقات ملف ');
        return redirect()->route('filesmanger.index');

    }

    public function edit($filesmanger)
    {

        Moving::getMoving('تعديل ملف ');
        $this->data['filesmanger'] = $filesmanger;
        return view('pages.filemanger.edit', $this->data);
    }

    public function update($request, $filesmanger)
    {
        $data = $request->all();

        $data['userEdit'] = auth()->user()->id;
        if ($request->hasFile('path')) {
            $data['path'] = Moving::upload($request, 'filesmanger', 'path');

        }


        $filesmanger->update($data);
        toastr()->success('تم التعديل بنجاح');
        Moving::getMoving('تعديل البلد ');

        return redirect()->route('filesmanger.index');
    }

    public function destroy(filesmanger $filesmanger)
    {
        toastr()->success('تم الحذف بنجاح');
        $filesmanger->delete();
        Moving::getMoving('حذف من ملف الموظف');
        return back();
    }

    public function restore($filesmanger)
    {

        filesmanger::withTrashed()->find($filesmanger)->restore();

        return back();
    }

    public function delete($filesmanger)
    {
        filesmanger::withTrashed()->find($filesmanger)->forcedelete();

        return back();


    }

}
