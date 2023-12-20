<?php

namespace App\Models\accounting\Bill;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BillsType extends Model
{
    use HasFactory,SoftDeletes;
    protected $guarded = [];
    public static function boot()
    {
        parent::boot();
        static::deleting(function($Type) {
             optional($Type->subtype())->delete();
             optional($Type->bill())->delete();
        });
    }
    
     public function subtype(){
        return $this->hasMany(BillsSubType::class,'type_id');
     }

     public function bill(){
        return $this->hasMany(Bill::class,'type_id');
     }
}
