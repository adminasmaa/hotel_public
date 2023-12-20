<?php

namespace App\Models\hr;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class EmployeeNotes extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded=[];
    protected $table ='hr_emp_notes';

    public function getCount(){
     //   $count = EmployeeNotes::where('branch_id',$this->branch_id)->count();
        //dd(EmployeeNotes::where('branch_id',$this->branch_id)->count());
        return EmployeeNotes::where('branch_id',$this->branch_id)->count();
    }
    
    public function employee()
    {
        return $this->belongsTo(Employee::class,'emp_id');
    }
    public function admin()
    {
        return $this->belongsTo(Employee::class,'userAdd');
    }
    public function branch()
    {
        return $this->belongsTo(Branch::class,'branch_id');
    } 

}
