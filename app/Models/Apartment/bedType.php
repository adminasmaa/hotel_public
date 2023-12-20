<?php

namespace App\Models\Apartment;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class bedType extends Model
{
    use HasFactory,SoftDeletes;
    protected $guarded=[];
    public static function boot()
    {
        parent::boot();
        static::deleting(function($type) {
             optional($type->apartType())->delete();
        });
    }


    public function apartType(){
        return $this->hasMany(ApartType::class,'bed_id');
    }
}
