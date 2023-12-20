<?php

namespace App\Models\Apartment;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class viewType extends Model
{
    use HasFactory,SoftDeletes;
    protected $guarded=[];

    public static function boot()
    {
        parent::boot();
        static::deleting(function($view) {
             optional($view->apartType())->delete();
        });
    }


    public function apartType(){
        return $this->hasMany(ApartType::class,'view_id');
    }
}
