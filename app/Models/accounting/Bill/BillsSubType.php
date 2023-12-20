<?php

namespace App\Models\accounting\Bill;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BillsSubType extends Model
{
    use HasFactory,SoftDeletes;
    protected $guarded = [];
    public static function boot()
    {
        parent::boot();
        static::deleting(function($subType) {
             optional($subType->bill())->delete();
        });
    }
    
     public function type(){
        return $this->belongsTo(BillsType::class,'type_id');
     }

     public function bill(){
        return $this->hasMany(Bill::class,'subType_id');
     }


}
