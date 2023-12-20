<?php

namespace App\Models\accounting;

use App\Models\hr\Branch;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Scopes\BranchScope;

class Checks extends Model
{
    use HasFactory,SoftDeletes;

    protected $guarded=[];

    public static function boot()
    {
        parent::boot();

        static::addGlobalScope(new BranchScope);
    }
    public function branch(){
        return $this->belongsTo(Branch::class,'branch_id');
    }



}
