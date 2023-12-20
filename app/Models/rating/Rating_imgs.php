<?php

namespace App\Models\rating;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\hr\Profession;
// use Illuminate\Database\Eloquent\SoftDeletes;

class Rating_imgs extends Model
{
    use HasFactory;
    
    protected $table ='rating_imgs';
    protected $guarded=[];
   
   

}
