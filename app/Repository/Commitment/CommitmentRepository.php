<?php


namespace App\Repository\Commitment;

use App\Helpers\Moving;
use App\Interface\Commitment\CommitmentRepositoryInterface;
use App\Models\Commitment\Commitment;
use App\Models\Commitment\CommitmentSection;
use App\Models\Country;



class CommitmentRepository implements CommitmentRepositoryInterface
{
    protected $data;


    public function __construct()
    {
        $this->data['countries'] = Country::all();
        $this->data['CommitmentSections'] = CommitmentSection::all();
        
    }

    public function index()
    {
        Moving::getMoving('عرض كل الالتزامات');
        $commitments=Commitment::all();
        return view('pages.commitments.commitments.index', compact('commitments'));
    }

    public function create()
    {
        return view('pages.commitments.commitments.create', $this->data);
    }

    public function store($request)
    {

        $data = $request->validated(); 
        $data['userAdd'] = auth()->user()->id;
        $data['country_id'] =optional(Country::where('code',substr($request->full,0,strlen($request->full)-strlen($request->phone)))->first())->id;
        Commitment::create($data);
        toastr()->success('تم حفظ بنجاح');
        Moving::getMoving('حفظ التزام جديد');
        return redirect()->route('commitments.index');
    }

 

    public function edit($commitment)
    {
        $this->data['commitment'] = $commitment;
        return view('pages.commitments.commitments.edit', $this->data);
    }

    public function update($request, $commitment)
    {
        $data = $request->validated(); 
        $data['country_id'] =optional(Country::where('code',substr($request->full,0,strlen($request->full)-strlen($request->phone)))->first())->id;
        $data['userEdit'] = auth()->user()->id;
        $commitment->update($data);
        Moving::getMoving('تعديل التزام ');
        toastr()->success('تم تعديل بنجاح');

        return redirect()->route('commitments.index');
    }

    public function destroy($commitment)
    {
        Moving::getMoving('حذف التزام ');
        $commitment->delete();
        toastr()->success('تم الحذف بنجاح');
        return redirect()->route('commitments.index');
    }
}
