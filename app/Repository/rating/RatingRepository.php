<?php


namespace App\Repository\rating;

use App\Helpers\Moving;

use App\Interface\rating\RatingRepositoryInterface;
use App\Models\rating\Rating;
use App\Models\rating\Rating_imgs;
use App\Models\hr\Profession;
use App\Models\rating\Rating_types;
use App\Models\rating\RatingQuestions;
use App\Models\hr\Employee;
use App\Http\Requests\rating\RatingRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Image;

class RatingRepository implements RatingRepositoryInterface
{
    protected $data;

    public function __construct()
    {
        $this->data['professions'] = Profession::all();

        $this->data['employees'] = Employee::all();
    }

    public function index()
    {
        
        if (Session::get('branch')) {
            $test = Employee::where('branch_id', Session::get('branch'))->pluck('id');
            $this->data['ratings'] = Rating::select('*', DB::raw('DATE(created_at) as date'), 'created_at')->whereIN('user_id', $test)->groupBy(['user_id'])->get();
          //  dd( $this->data['ratings']  );
        } else {
            $this->data['ratings'] = Rating::select('*', DB::raw('DATE(created_at) as date'), 'created_at')->groupBy(['user_id'])->get();

        }

        Moving::getMoving('عرض التقييمات  ');
        return view('pages.rating.index', $this->data);
    }

    public function showRatings($id)
    {
        Moving::getMoving('عرض التقييمات  ');
        $this->data['ratings'] = Rating::where('user_id', $id)->orderBy('created_at')->get();
        return view('pages.rating.showRatings', $this->data);
    }

    public function create()
    {
        $_data = DB::table('rating_questions')
            ->join('rating_types', 'rating_questions.type_id', '=', 'rating_types.id')
         //  ->where('rating_types.profession_id' ,  'rating_questions.profession_id')
            ->select('rating_questions.profession_id')
            ->get(); 
        foreach ($_data as $key) {
            $this->data['professions'] = Profession::where('id', $key->profession_id)->get();
        }

        return view('pages.rating.create', $this->data);
    }

    public function store($request)
    {
        $data = $request->all();


        foreach ($data['ids'] as $key => $item) {
            $answers[] = (object)['rating_question_id' => $item, 'note' => $data['note'][$key], 'answer' => $data['answer'][$key], 'rating' => $data['rating'][$key]];
        }
        $rate_id = Rating::create([
            'answers' => json_encode($answers),
            'admin_id' => auth()->user()->id,
            'type_id' => $data['type_id'],
            'user_id' => $data['user_id'],
            'profession_id' => $data['profession_id'],
            'rating_avg' => collect($data['rating'])->avg(),
        ]);
        $rate_id = $rate_id->id;

        foreach ($data['q_id'] as $key => $item) {
            $test = Rating_imgs::where('q_id', $item)->where('user_id', auth()->user()->id)->where('rating_id', NULL)->get();
            foreach ($test as $tes) {
                $tes->update([
                    'rating_id' => $rate_id
                ]);
            }
        }

        toastr()->success('تم حفظ بنجاح');
        Moving::getMoving('حفظ تقييم جديد');

        return redirect()->route('rating.index');
    }

    public function show(Rating $rating, Rating_imgs $imgs)
    {
        $this->data['rating'] = $rating;
        $this->data['rating_questions'] = RatingQuestions::all();
        $this->data['imgs'] = Rating_imgs::where('rating_id', $rating->id)->get();
        foreach ($this->data['imgs'] as $im) {
            $this->data['img'] = $im;
        }
        Moving::getMoving('عرض تقييم موظف  ');
        return view('pages.rating.show', $this->data);
    }


    public function destroy(Rating $client)
    {
        $client->delete();
        toastr()->success('تم الحذف بنجاح');
        Moving::getMoving('حذف تقييم ');
        return redirect()->route('rating.index');
    }


    public function answerForm($profession_id)
    {
        $rating = Rating::where('profession_id', $profession_id)->get();
        return view('pages.rating.answerForm', compact('rating', 'profession_id'));
    }

    public function showStatistics()
    {
        $this->data['stat'] = Rating::get();
        return view('pages.rating.statistics', $this->data);
    }

    public function add_rate($request)
    {
        $data = $request->all();

        $this->data['rating_questions'] = RatingQuestions::where('type_id', $request->type_id)->where('profession_id', $request->profession_id)->get();

        return view('pages.rating.answerForm', $this->data);

    }

    public function getEmployees($id)
    {
        $data['data'] = array();
        
         if( Session::has('branch')){
            $data['data'] = Employee::where('profession_id', $id)->where('branch_id', Session::get('branch'))->get();
         }
        
        else
           $data['data'] = Employee::where('profession_id', $id)->get();

        return response()->json($data);
    }

    public function get_employe_attendance($request)
    {
        $monthe_attendence = $request->monthe ? explode('-', $request->monthe)[1] : explode('-', \Carbon\Carbon::now())[1];
        $start = Rating::monthy($monthe_attendence)->whereDay('created_at', '<=', '7')->get();
        $second = Rating::monthy($monthe_attendence)->whereDay('created_at', '>', '7')->whereDay('created_at', '<=', '14')->get();
        $third = Rating::monthy($monthe_attendence)->whereDay('created_at', '>', '14')->whereDay('created_at', '<=', '21')->get();
        $end = Rating::monthy($monthe_attendence)->whereDay('created_at', '>', '21')->get();
        $all = Rating::monthy($monthe_attendence)->get();
        $stat = request()->has('week') ? ${request()->get('week')} : $all;
        $month_name = Carbon::createFromDate(now()->month)->translatedFormat('F');

        $_data = Rating::groupBy('user_id')->pluck('user_id');
        $emps = Employee::all();
        foreach($_data as $e)
        {
            $emps = $emps->except($e);
        }
        return view('pages.rating.statistics', compact('stat', 'month_name', 'all', 'start', 'second', 'third', 'end','emps','_data'));
    }

    public function getTypes($request)
    {
        $types = RatingQuestions::where('profession_id', $request)->get();
        $data['data'] = array();
        foreach ($types as $one) {
            $type = Rating_types::where('id', $one->type_id)->where('profession_id',$request)->get();
            if (in_array($type, $data['data'])) {
                continue;
            } else {
                array_push($data['data'], $type);
            }
        }
        return response()->json($data);
    }


    public function remove_img($id)
    {
        $data['data'] = array();
        $data['data'] = Rating_imgs::where('id', $id)->delete();


        return response()->json($data);
    }

    public function doupload($request)
    {
        $data['data'] = array();
        $test = Rating_imgs::where('q_id', $request->q_id)->where('user_id', auth()->user()->id)->where('rating_id', NULL)->get();
        $f_name = Moving::upload($request, 'rating_imgs', 'photo');
        $testing = url('storage/' . $f_name);
        array_push($data['data'], $testing);

        foreach ($test as $tes) {
            $tes->delete();
        }
        $file_name = $request['name'];
        $q_id = $request['q_id'];
        $md5id = Hash::make($request->_token);
        $t = 'storage/' . $f_name;

        if ($f_name) {
            $img_id = Rating_imgs::create([
                'image_name' => $f_name,
                'q_id' => $q_id,
                'user_id' => auth()->user()->id,
                'md5id' => $md5id,
            ]);
            $img_id = $img_id->id;
        }
        array_push($data['data'], $img_id);

        return response()->json($data);

    }
}
