<?php


namespace App\Repository\main;

use App\Helpers\Moving;
use App\Models\main\Marks;
use App\Models\main\Company;
use App\Interface\main\MarksRepositoryInterface;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class MarksRepository implements MarksRepositoryInterface
{
    protected $data;

    public function __construct()
    {
        $this->data['marks'] = Marks::orderBy('created_at', 'DESC')->get();
        $this->data['companies'] = Company::where('is_active', 1)->get();
    }

    public function index()
    {
        Moving::getMoving('عرض كل  الماركات');
        return view('pages.main.marks.index', $this->data);
    }

    public function create()
    {
        return view('pages.main.marks.create', $this->data);
    }

    public function store($request)
    {
        $data = $request->validated();
        // dd($request->all());

        $data['company_img'] = Moving::upload($request, 'Marks', 'company_img');
        $data['userAdd'] = auth()->user()->id;

        foreach ($request->company_id as $key => $item) {

            $companies[] = ['company_id'=>$item,'company_name' => $key];
        }


        $data['company_id'] = json_encode($companies);

        //dd( implode(",",$company));
        Marks::create($data);
        toastr()->success('تم حفظ بنجاح');
        Moving::getMoving('حفظ ماركة جديد');

        return redirect()->route('marks.index');
    }

    public function edit($mark)
    {

        Moving::getMoving('تعديل ماركة ');
        $this->data['mark'] = $mark;

        return view('pages.main.marks.edit', $this->data);
    }

    public function update($request, $mark)
    {
        $data = $request->validated();
        if ($request->hasFile('company_img')) {
            $data['company_img'] = Moving::upload($request, 'Marks', 'company_img');

        }
        $data['userEdit'] = auth()->user()->id;
        $data['company_id']=[];
        //dd( $data['company_id'] );

        foreach ($request->company_id as $key => $item) {
            $companies[] = ['company_id'=>$item,'company_name' => $key];
        }
        $data['company_id'] = json_encode($companies);

        $mark->update($data);
        if ($mark)
            toastr()->success('تم التعديل بنجاح');
        Moving::getMoving('تعديل ماركة ');
        return redirect()->route('marks.index');
    }

    public function destroy(Marks $mark)
    {
        Moving::deleteImage($mark->company_img);
        $mark->delete();
        Moving::getMoving('حذف ماركة ');
        return back();
    }


}
