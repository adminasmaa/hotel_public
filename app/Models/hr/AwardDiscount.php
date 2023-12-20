<?php

namespace App\Models\hr;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Session;
use App\Models\Scopes\BranchScope;

class AwardDiscount extends Model
{
    use HasFactory,SoftDeletes;
    protected $table ='hr_award_discounts';
    protected $guarded=[];

    public static function boot()
    {
        parent::boot();

        static::addGlobalScope(new BranchScope);
    }
    public function employee()
    {
        return $this->belongsTo(Employee::class,'employee_id');
    }
    public function scopeGetEmployee($query)
    {
        if(request()->has('employee')){
            return $query->where('employee_id',request()->get('employee'));
        }
    }
}
