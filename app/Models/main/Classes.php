<?php

namespace App\Models\main;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Classes extends Model
{
    use HasFactory,SoftDeletes;

    public static function boot()
    {
        parent::boot();

        static::deleting(function($company) {
             optional($company->product())->delete();
             optional($company->types())->delete();
        });
    }
    protected $guarded=[];



    public function product(){
        return $this->hasMany(Product::class,'class_id');
    }

    public function types(){
        return $this->hasMany(Types::class,'class_id');
    }


    public function getCountAttribute(){
        return Types::where('class_id',$this->id)->count();
    }


}
