<?php


namespace App\Repository\hr;

use App\Helpers\Moving;
use App\Models\hr\Branch;
use App\Interface\hr\BranchRepositoryInterface;

class BranchRepository implements BranchRepositoryInterface
{
    public function index()
    {



        Moving::getMoving('عرض كل اسماء الفروع');
        $branches = Branch::withoutGlobalScope('branch')->get();


        return view('pages.hr.branches.index', compact('branches'));
    }

    public function create()
    {
        return view('pages.hr.branches.create');
    }

    public function store($request)
    {
        $data = $request->validated();
        $data['logo'] = Moving::upload($request, 'branch', 'logo');
        $data['userAdd'] = auth()->user()->id;
        Branch::create($data);
        toastr()->success('تم اضافة بنجاح');
        Moving::getMoving('حفظ فرع جديد');
        return redirect()->route('branches.index');

    }

    public function edit($branch)
    {
        return view('pages.hr.branches.edit', compact('branch'));
    }

    public function update($request, $branch)
    {
        $data = $request->validated();
        $data['logo'] = Moving::upload($request, 'branch', 'logo');
        $data['userEdit'] = auth()->user()->id;
        $branch->update($data);
        toastr()->success('تم التعديل بنجاح');
        Moving::getMoving('تعديل فرع ');

        return redirect()->route('branches.index');
    }

    public function show($branch)
    {
        return view('pages.hr.branches.show', compact('branch'));
    }

    public function destroy(Branch $branch)
    {
        if ($branch->count > 0) {
            toastr()->error('لا يمكن حذف هذا العنصر لوجود موظفين ف هذا العنصر');
            return back();
        }
        $branch->delete();
        toastr()->success('تم الحذف بنجاح');
        Moving::getMoving('حذف الفرع ');

        return back();
    }

}
