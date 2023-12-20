<?php

namespace App\Repository\Checkall;

use App\Helpers\Moving;
use App\Interface\Checkall\CheckallRepositoryInterface;
use App\Models\Checkall\Checkall;
use App\Models\Checkall\CheckallType;
use Flasher\Laravel\Http\Request;

class CheckallRepository implements CheckallRepositoryInterface
{
    public function index()
    {
        Moving::getMoving('عرض كل اسماء التفتيش');
        $checkalls = Checkall::when(request()->has('type'), function ($q) {
            $q->where('type_id', request()->get('type'));
        })
            ->orderByRaw("FIELD(checkalls.`order`, 'null') ASC, checkalls.`order`")
            ->get();
        $types = CheckallType::all();
        return view('pages.checkall.checkalls.index', compact('checkalls', 'types'));
    }

    public function create()
    {
        $types = CheckallType::all();
        return view('pages.checkall.checkalls.create', compact('types'));
    }

    public function store($request)
    {
        $data = $request->all();
        $data['order'] = !is_null($request->order) ? $request->order : 0;
        Checkall::create($data);
        Moving::getMoving('حفظ التفتيش جديد');
        toastr()->success('تم حفظ بنجاح');
        return back();

    }

    public function edit($checkall)
    {
        $types = CheckallType::all();
        return view('pages.checkall.checkalls.edit', compact('checkall', 'types'));
    }

    public function update($request, $checkall)
    {
        $data = $request->all();
        $data['order'] = !is_null($request->order) ? $request->order : 0;
        $checkall->update($data);
        Moving::getMoving('تعديل التفتيش ');
        toastr()->success('تم تعديل بنجاح');
        return back();

    }

    public function destroy($checkall)
    {
        $checkall->delete();
        toastr()->success('تم الحذف بنجاح');
        Moving::getMoving('حذف التفتيش ');
        return back();
    }

}
