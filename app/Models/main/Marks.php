<?php

namespace App\Models\main;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Marks extends Model
{
    use HasFactory,SoftDeletes;

    protected $guarded=[];

    // public static function boot()
    // {
    //     parent::boot();

    //     static::deleting(function($mark) {
    //          $mark->classes()->delete();
    //     });
    // }

    public function company(){

        return $this->belongsTo(Company::class);
    }



}
