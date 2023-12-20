<?php

namespace App\Http\Controllers\hr;

use App\Models\hr\Moving as ModelsMoving;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Yajra\DataTables\Facades\DataTables; 

class ReportController extends Controller
{
    public function index(Request $request,$id = null)
    {
        $movings = ModelsMoving::query()->when(!is_null($id), function ($q) use ($id) {
            $q->where('employee_id', $id);
        })
            ->when(request()->has('onlyauth'), function ($q) {
                $q->where(function($q){
                    $q->where('name', 'تسجيل الدخول')->orWhere('name', 'تسجيل الخروج');
                });         
            })
            ->when(request()->has('from') && request()->get('from') != "" && request()->has('to') && request()->get('to') != "", function ($q) {

                $q->whereBetween('created_at', [request()->get('from') . ' 00:00:00', request()->get('to') . ' 23:59:59']);
            })
            ->orderBy('created_at', 'desc')->get();
  
        
       if ($request->ajax()) {
            
            return Datatables::of($movings)
                ->addIndexColumn()
                ->addColumn('user_name', function($movings) {
                    return $movings->employee->user_name;
                })
                ->addColumn('date', function($movings) {
                    return Carbon::parse($movings->created_at )->locale('ar')->translatedFormat('Y-m-d');
                })
                ->addColumn('time', function($movings) {
                    return Carbon::parse($movings->created_at )->locale('ar')->translatedFormat('h:i:s');
                })
                ->rawColumns(['user_name','date','time'])
                ->make(true);
        }
        return view('pages.hr.reports.index');
    }
}
