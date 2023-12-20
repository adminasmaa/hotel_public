<?php

namespace App\Models\main;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\SoftDeletes;

class Company extends Model
{
    use HasFactory,SoftDeletes;
    protected $guarded=[];

    public static function boot()
    {
        parent::boot();

        static::deleting(function($company) {
             $company->product()->delete();
             $company->mark()->delete();

        });
    }

    protected function transfer(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => json_decode($value, true),
            set: fn ($value) => json_encode($value),
        );
    }
    protected function maintenance(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => json_decode($value, true),
            set: fn ($value) => json_encode($value),
        );
    }
    protected function sales(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => json_decode($value, true),
            set: fn ($value) => json_encode($value),
        );
    }



    public function product(){
        return $this->hasMany(Product::class);
    }

    public function mark(){
        return $this->hasMany(Marks::class);
    }
    // public function classes(){
    //     //dd($this->mark->first());
    //     return Classes::where('mark_id',optional($this->mark->first())->id);
    // }

}
