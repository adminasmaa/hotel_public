<?php

namespace App\Models\hr;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobTitle extends Model
{
    use HasFactory;
    protected $guarded=[];
    protected $table ='hr_job_titles';

    protected $appends = ['count'];

    public function getCountAttribute(){
        return Employee::where('job_title_id',$this->id)->count();
    }

}
