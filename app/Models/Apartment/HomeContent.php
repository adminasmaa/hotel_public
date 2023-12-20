<?php

namespace App\Models\Apartment;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HomeContent extends Model
{
    use HasFactory,SoftDeletes;
    protected $guarded=[];
    protected $table='apart_contents';

    public function apartments()
    {
      return $this->belongsToMany(Apartment::class)
       ->withPivot('image')
       ->withTimestamps();
    }

    public function content(){
      return $this->hasMany(Content::class);
     }
     public function apartTypes()
     {
       return $this->belongsToMany(ApartType::class,'content_types')
        ->withTimestamps();
     }
}
