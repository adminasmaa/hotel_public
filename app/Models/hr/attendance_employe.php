<?php

namespace App\Models\hr;
use App\Models\hr\Employee;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class attendance_employe extends Model
{
    use HasFactory;
    protected $table ='hr_att_emp';

    protected $fillable = [
        'check_in_time','description', 'attendance_image', 'employees_id','check_out_time'
    ];

  
    public function employee(){
        return $this->belongsTo(Employee::class,'employees_id');
    }
    public function getcountAttribute(){
        $count=attendance_employe::where('employees_id',$this->employees_id)->count();
        return $this->count=$count;

    }



}



