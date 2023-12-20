<?php

namespace App\Models\rating;

use App\Models\hr\Profession;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RatingQuestions extends Model
{
    use HasFactory,SoftDeletes;
    protected $table ='rating_questions';
    protected $guarded=[];
    protected $appends = ['count'];

    public function getCountAttribute(){
        $count=RatingQuestions::where('profession_id',$this->profession_id)->count();
        return $this->count=$count;
    }


      public function group(){
          return $this->belongsTo(Profession::class,'profession_id');
      }
      public function type(){
        return $this->belongsTo(Rating_types::class);
    }
}
