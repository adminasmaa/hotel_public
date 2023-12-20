<?php

namespace App\Models\hr;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Qualification extends Model
{
    use HasFactory;
    protected $guarded=[];
    protected $table ='hr_qualifications';

    protected $appends = ['count'];

    public function getCountAttribute(){
        return Employee::where('qual_id',$this->id)->count();
    }
}
