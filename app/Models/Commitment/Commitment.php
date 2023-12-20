<?php

namespace App\Models\Commitment;

use App\Models\Country;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Commitment extends Model
{
    use HasFactory,SoftDeletes;
    protected $guarded = [];
    public function country(){
        return $this->belongsTo(Country::class,'country_id');
     }
     public function section(){
        return $this->belongsTo(CommitmentSection::class,'section_id');
     }
}


