<?php

namespace App\Models\Checkall;

use App\Models\hr\Employee;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class CheckallAnswer extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    public function getCreateAtAttribute($val)
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $val)->format('Y-m-d');
    }

    public function getAnswersAttribute($val)
    {
        return json_decode($val);
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    public function type($employee_id, $created_at, $type)
    {

        $allType = $this->where('employee_id', $employee_id)->where(DB::raw('DATE(created_at)'), Carbon::createFromFormat('Y-m-d H:i:s', $created_at)->format('Y-m-d'))->distinct()->pluck('type_id')->toArray();
        return in_array($type, $allType);
    }

    public function ids($employee_id, $created_at, $type = null)
    {

        $ids = $this->where('employee_id', $employee_id)->where(DB::raw('DATE(created_at)'), Carbon::createFromFormat('Y-m-d H:i:s', $created_at)->format('Y-m-d'))->when($type != null, function ($q) use ($type) {
            $q->where('type_id', $type);
        })->distinct()->pluck('id')->toArray();

        return json_encode($ids);
    }

    public function scopeMonthy($query, $mon)
    {
        return $query->whereMonth('created_at', $mon)->groupBy('created_at');
    }

    public function scopeCheckAnswer($query, $request)
    {

        $monthe_attendence = $request->monthe ? explode('-', $request->monthe)[1] : explode('-', \Carbon\Carbon::now())[1];
        return $query->whereMonth('created_at', '=', $monthe_attendence)->when(request()->has('employee_id') && request()->get('employee_id') != '', function ($q) {
            $q->where('employee_id', request()->get('employee_id'));
        })->when(request()->has('type_id') && request()->get('type_id') != '', function ($q) {
            $q->where('type_id', request()->get('type_id'));
        });


    }


}
