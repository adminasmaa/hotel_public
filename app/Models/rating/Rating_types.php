<?php

namespace App\Models\rating;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\hr\Profession;
use Illuminate\Database\Eloquent\SoftDeletes;

class Rating_types extends Model
{
    use HasFactory,SoftDeletes;

    public static function boot()
    {
        parent::boot();

        static::deleting(function($question) {
             optional($question->quest())->delete();
        });
    }
    protected $guarded=[];
    protected $appends = ['count'];
 
    public function quest(){
        return $this->hasMany(RatingQuestions::class,'type_id');
    }
    public function getCountAttribute(){
        $count=Rating_types::where('profession_id',$this->profession_id)->count();
        return $this->count=$count;
    }

    public function getCount($type_id){
    
        return RatingQuestions::where('profession_id',$this->profession_id)->where('type_id',$type_id)->count();
    }

    public function group(){
        return $this->belongsTo(Profession::class,'profession_id');
    }
   

}
