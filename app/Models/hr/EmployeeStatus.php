<?php

namespace App\Models\hr;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeStatus extends Model
{
    use HasFactory;
    protected $guarded=[];
    protected $table ='hr_employee_statuses';

    protected $appends = ['count'];

    public function getCountAttribute(){
        return Employee::where('emp_state_id',$this->id)->count();
    }

}
