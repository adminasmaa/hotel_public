<?php

namespace App\Models\accounting\Bill;

use App\Models\hr\Branch;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Scopes\BranchScope;

class Bill extends Model
{
    use HasFactory,SoftDeletes;
    protected $guarded = [];
    public static function boot()
    {
        parent::boot();

        static::addGlobalScope(new BranchScope);
    }
    public function type(){
        return $this->belongsTo(BillsType::class,'type_id');
    }
     public function subtype(){
        return $this->belongsTo(BillsSubType::class,'subType_id');
     }
     public function branch(){
        return $this->belongsTo(Branch::class,'branch_id');
    }

    public function scopeFilter($query){
        return $query->when(!request()->has('name')||request()->get('name')=='bills',function($q){
            $q->where(function($q){
                $q->where('name','bills')->orWhere('is_bill',1);
            });
        })->when(request()->has('name')&&request()->get('name')!='bills',function($q){
            $q->where('name',request()->get('name'));
        })->when(request()->has('type'),function($q){
            $q->where('type_id',request()->get('type'));
        })->when(request()->has('branch'),function($q){
            $q->where('branch_id',request()->get('branch'));
        });
    }
    public function scopeCounts($query){
        return $query->when(!request()->has('name')||request()->get('name')=='bills',function($q){
            $q->where(function($q){
                $q->where('name','bills')->orWhere('is_bill',1);
            });
        })->when(request()->has('name')&&request()->get('name')!='bills',function($q){
            $q->where('name',request()->get('name'));
        });
    }
    public function scopeMonthy($query,$month,$type){
        return $query->where('type_id',$type)->whereMonth( 'date', $month);
    }
}
