<?php

namespace App\Models\hr;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class FileManger extends Model
{
    use HasFactory,SoftDeletes;
    protected $table="hr_file_mng";
    protected $guarded=[];
    protected $appends = ['name'];

    public function getNameAttribute(){    
          return DB::table('hr_file_type')->where('name',$this->type)->first()->type;
    }
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
