<?php


namespace App\Repository\main;

use App\Helpers\Moving;
use App\Models\main\Classes;
use App\Models\main\Types;
use App\Interface\main\TypesRepositoryInterface;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\main\TypesRequest;

class TypesRepository implements TypesRepositoryInterface
{
    protected $data;

    public function __construct()
    {
        $this->data['types'] = Types::all();
        // dd(request()->get('class'));
        $this->data['classes'] = Classes::all();

    }

    public function index()
    {
        Moving::getMoving('عرض كل  الانواع');
        $this->data['types'] = Types::when(request()->has('class'), function ($q) {
            $q->where('class_id', request()->get('class'));
        })->get();
        return view('pages.main.types.index', $this->data);
    }


    public function store($request)
    {

        $data = $request->validated();
        $data['userAdd'] = auth()->user()->id;

        Types::create($data);
        toastr()->success('تم حفظ بنجاح');
        Moving::getMoving('حفظ نوع جديد');
        return back();
    }


    public function update($request, $type)
    {

        $data = $request->validated();

        $data['userEdit'] = auth()->user()->id;
        $type->update($data);
        if ($type)
            toastr()->success('تم التعديل بنجاح');
        Moving::getMoving('تعديل نوع ');
        return back();
    }

    public function destroy(Types $type)
    {

        $type->delete();
        Moving::getMoving('حذف نوع ');
        return back();
    }


}
