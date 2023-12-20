<?php


namespace App\Repository\hr;

use App\Helpers\Moving;

use App\Interface\hr\StatisticRepositoryInterface;
use App\Models\hr\Branch;
use App\Models\hr\Employee;

class StatisticRepository implements StatisticRepositoryInterface
{
    public function index()
    {
        Moving::getMoving('عرض  كل الاحصائيات');


        return view('pages.hr.statistics.index');
    }

    public function employee_statistic()
    {

        Moving::getMoving('احصايئات الموظفين');
        $field = request()->get('name');
        if ($field == 'living') {
            $employees = Employee::orderby('branch_id')->get();
        } elseif($field == 'security_receipt'){
            $employees=Employee::whereJsonContains('license', ["type"=>"security","receipt" => 1])->get();
        }elseif($field == 'egypt_license'){
            $employees=Employee::whereJsonContains('license', ["type"=>"egypt","receipt" => 1])->get();
        }elseif($field == 'kuwait_license'){
            $employees=Employee::whereJsonContains('license', ["type"=>"Kuwait","receipt" => 1])->get();
        }else {
            $employees = Employee::where($field, 1)->orderby('branch_id')->get();
        }

        $name = 'لديه ليسن كويتى';
        return view('pages.hr.statistics.employee_statistic', compact('employees', 'field', 'name'));

    }

    public function security()
    {
        Moving::getMoving('احصايئات ايصال الامانه');
        $branches = Branch::all();
        return view('pages..hr.statistics.security', compact('branches'));
    }

    public function egypt_license()
    {
        Moving::getMoving('احصايئات ليسن مصرى');
        $branches = Branch::all();
        return view('pages..hr.statistics.egypt_license', compact('branches'));
    }

    public function kuwait_license()
    {
        Moving::getMoving('احصايئات ليسن كويتى');
        $branches = Branch::all();
        return view('pages.hr.statistics.kuwait_license', compact('branches'));
    }

    public function uniform()
    {
        Moving::getMoving('احصايئات يونيفورم');
        $branches = Branch::all();
        return view('pages.hr.statistics.uniform', compact('branches'));
    }

    public function living()
    {
        Moving::getMoving('احصايئات السكن');
        $branches = Branch::all();
        return view('pages.hr.statistics.living', compact('branches'));
    }

    public function bank()
    {
        Moving::getMoving('احصايئات السكن');
        $employees = employee::when(auth()->user()->branch_id!=1,function($q){
            $q->where('branch_id',auth()->user()->branch_id);
        })
        ->when(request()->has('branch'),function($q){
            $q->where('branch_id',request()->get('branch'));
        })->get();
        return view('pages.hr.statistics.bank', compact('employees'));
    }


}
