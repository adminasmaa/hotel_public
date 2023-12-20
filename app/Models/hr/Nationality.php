<?php

namespace App\Models\hr;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nationality extends Model
{
    use HasFactory;
    protected $guarded=[];
    protected $table ='hr_nationalities';

    protected $appends = ['count'];

    public function getCountAttribute(){
        return Employee::where('nation_id',$this->id)->count();
    }
}
