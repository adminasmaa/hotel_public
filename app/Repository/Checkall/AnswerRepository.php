<?php

namespace App\Repository\Checkall;

use App\Helpers\Moving;
use App\Interface\Checkall\AnswerRepositoryInterface;
use App\Models\Checkall\Checkall;
use App\Models\Checkall\CheckallAnswer;
use App\Models\Checkall\CheckallType;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use App\Models\hr\Employee;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;

class AnswerRepository implements AnswerRepositoryInterface
{
    protected $data;

    public function __construct()
    {
        $this->data['checkallanswers'] = CheckallAnswer::all();
    }

    public function index()
    {
        Moving::getMoving('عرض كل اجابات التفتيش');
        $types = CheckallType::all();
        $branch_id = Session::has('branch');
        $answers = CheckallAnswer::when($branch_id, function ($q) use ($branch_id) {
            $employees_ids = Employee::where('branch_id', Session::get('branch'))->pluck('id')->ToArray();
            $q->whereIn('employee_id', $employees_ids);
        })->select('type_id', 'employee_id', DB::raw('DATE(created_at) as date'), 'created_at')
            ->groupBy(['employee_id', 'date'])
            ->orderBy('created_at', 'desc')
            ->get();

        return view('pages.checkall.answers.index', compact('types', 'answers'));
    }


    public function addAnswer()
    {
        $types = CheckallType::all();
        return view('pages.checkall.answers.addAnswer', compact('types'));
    }

    public function selectType($request)
    {
        if (is_null($request->type_id)) {
            toastr()->error('يجب اختيار النوع');
            return back();
        }
        if (CheckallAnswer::where('employee_id', auth()->user()->id)->where(DB::raw('DATE(created_at)'), now()->format('Y-m-d'))->where('type_id', $request->type_id)->count() > 0) {
            toastr()->error('لا يمكنك اضافة تفتيش من نفس النوع فى نفس اليوم');
            return back();
        }
        return redirect()->route('answers.get_v', ['id' => $request->type_id]);
    }

    public function answerForm($id)
    {
        $checkalls = Checkall::where('type_id', $id)->get();

        return view('pages.checkall.answers.answerForm', compact('checkalls', 'id'));
    }

    public function saveimage($request)
    {

        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $checkallSlider = Image::make($image)->resize(500, 333)->save('my-image.jpg', 90);
            Storage::disk('public')->put('checkall/' . $filename, $checkallSlider);

            $imagName = 'checkall/' . $filename;
            //$imagName=Moving::upload($request,'checkall','photo');
            return response(['imagName' => $imagName], 200);
        }
    }

    public function Store($request)
    {
        $data = $request->all();
        $data['document'] = explode(",", trim($request->document, ','));
        foreach ($data['ids'] as $key => $item) {
            $answers[] = (object)['checkall_id' => $item, 'note' => $data['note'][$key], 'answer' => $data['answer'][$key], 'image' => $data['document'][$key]];
        }
        CheckallAnswer::create([
            'answers' => json_encode($answers),
            'employee_id' => auth()->user()->id,
            'type_id' => $data['type_id'],
        ]);

        toastr()->success('تم الحفظ بنجاح');
        return redirect()->route('answers.index');
    }

    public function destroy($ids)
    {

        foreach (json_decode($ids) as $id) {
            $answer = CheckallAnswer::findOrFail($id);
            foreach ($answer->answers as $a) {
                Moving::deleteImage($a->image);
            }
            $answer->delete();
        }
        Moving::getMoving('حذف التفتيش ');
        toastr()->success('تم الحذف بنجاح');
        return back();
    }

    public function show($ids)
    {
        $checkallAnswer = CheckallAnswer::whereIN('id', json_decode($ids, true))->first();
        $answers = $checkallAnswer->answers;
        return view('pages.checkall.answers.show', compact('answers', 'checkallAnswer'));

    }

    public function Get_Statistics_answer($request)
    {


        $monthe_attendence = $request->monthe ? explode('-', $request->monthe)[1] : explode('-', \Carbon\Carbon::now())[1];
        $month_name = Carbon::createFromDate(now()->month)->translatedFormat('F');

        $start = CheckallAnswer::checkAnswer($request)->whereDay('created_at', '<=', '7');
        $second = CheckallAnswer::checkAnswer($request)->whereDay('created_at', '>', '7')->whereDay('created_at', '<=', '14');
        $third = CheckallAnswer::checkAnswer($request)->whereDay('created_at', '>', '14')->whereDay('created_at', '<=', '21');
        $end = CheckallAnswer::checkAnswer($request)->whereDay('created_at', '>', '21');
        $all = CheckallAnswer::checkAnswer($request);
        $stat = request()->has('week') ? ${request()->get('week')} : $all;

        $emps = Employee::all();


        $array = [];
        if ($request->week == 'start') {
            $this->data['checkallanswers'] = $start->whereMonth('created_at', '=', $monthe_attendence)->whereDay('created_at', '<=', '7');
        } elseif ($request->week == 'second') {
            $this->data['checkallanswers'] = $second->whereMonth('created_at', '=', $monthe_attendence)->whereDay('created_at', '>', '7')->whereDay('created_at', '<=', '14');

        } elseif ($request->week == 'third') {
            $this->data['checkallanswers'] = $third->whereMonth('created_at', '=', $monthe_attendence)->whereDay('created_at', '>', '14')->whereDay('created_at', '<=', '21');

        } elseif ($request->week == 'end') {
            $this->data['checkallanswers'] = $end->whereMonth('created_at', '=', $monthe_attendence)->whereDay('created_at', '>', '21');

        } else {

            $this->data['checkallanswers'] = $all->whereMonth('created_at', '=', $monthe_attendence);
        }

        if (!request()->has('employee_id') && !request()->has('type_id')) {

            $this->data['checkallanswers'] = $this->data['checkallanswers']->groupBy('employee_id')->get();

        } else {
            $this->data['checkallanswers'] = $this->data['checkallanswers']->groupBy('type_id')->get();
        }


        $allanswers = [];


        foreach ($this->data['checkallanswers'] as $e) {
            $e->count = CheckallAnswer::where('employee_id', $e->employee_id)->whereMonth('created_at', '=', $monthe_attendence)->count('type_id');
            $e->type = CheckallType::where('id', $e->type_id)->first();
            $e->type_count = CheckallAnswer::where('employee_id', $e->employee_id)->whereMonth('created_at', '=', $monthe_attendence)->where('type_id', $e->type->id)->count('type_id');

            array_push($allanswers, $e->answers);


        }


        return view('pages.checkall.answers.statistics', $this->data, compact('stat', 'allanswers', 'month_name', 'all', 'start', 'second', 'third', 'end', 'emps', 'array'));
    }

    public function Get_Statistics_answer_emp($request)
    {
        //dd($request->all());
        $monthe_attendence = $request->monthe ? explode('-', $request->monthe)[1] : explode('-', \Carbon\Carbon::now())[1];
        $month_name = Carbon::createFromDate(now()->month)->translatedFormat('F');
        $start = CheckallAnswer::checkAnswer($request)->whereDay('created_at', '<=', '7');
        $second = CheckallAnswer::checkAnswer($request)->whereDay('created_at', '>', '7')->whereDay('created_at', '<=', '14');
        $third = CheckallAnswer::checkAnswer($request)->whereDay('created_at', '>', '14')->whereDay('created_at', '<=', '21');
        $end = CheckallAnswer::checkAnswer($request)->whereDay('created_at', '>', '21');
        $all = CheckallAnswer::checkAnswer($request);


        $emps = Employee::all();

        if ($request->week == 'start') {
            $this->data['checkallanswers'] = $start->whereMonth('created_at', '=', $monthe_attendence)->whereDay('created_at', '<=', '7')->get();
        } elseif ($request->week == 'second') {
            $this->data['checkallanswers'] = $second->whereMonth('created_at', '=', $monthe_attendence)->whereDay('created_at', '>', '7')->whereDay('created_at', '<=', '14')->get();

        } elseif ($request->week == 'third') {
            $this->data['checkallanswers'] = $third->whereMonth('created_at', '=', $monthe_attendence)->whereDay('created_at', '>', '14')->whereDay('created_at', '<=', '21')->get();

        } elseif ($request->week == 'end') {
            $this->data['checkallanswers'] = $end->whereMonth('created_at', '=', $monthe_attendence)->whereDay('created_at', '>', '21')->get();

        } else {

            $this->data['checkallanswers'] = $all->whereMonth('created_at', '=', $monthe_attendence)->get();
        }
        foreach ($this->data['checkallanswers'] as $e) {
            $e->type = CheckallType::where('id', $e->type_id)->first();
            $e->type_count = CheckallAnswer::where('employee_id', $e->employee_id)->whereMonth('created_at', '=', $monthe_attendence)->where('type_id', $e->type->id)->count('type_id');

        }


        return view('pages.checkall.answers.statistics', $this->data, compact('month_name', 'all', 'start', 'second', 'third', 'end', 'emps'));


    }

}
