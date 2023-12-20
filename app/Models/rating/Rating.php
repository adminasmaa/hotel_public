<?php

namespace App\Models\rating;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\hr\Employee;
use App\Models\rating\RatingQuestions;
use App\Models\hr\Profession;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;
class Rating extends Model
{
    use HasFactory,SoftDeletes;
    protected $table ='rating';
    protected $guarded=[];

    public function emp(){
        return $this->belongsTo(Employee::class,'user_id');
    }
    public function admin(){
      return $this->belongsTo(Employee::class,'admin_id');
  }
    public function type(){
      return $this->belongsTo(Rating_types::class,'type_id');
  }
  public function prof(){
    return $this->belongsTo(Profession::class,'profession_id');
}

    public function quest(){
      return $this->belongsTo(RatingQuestions::class);
  }
  public function getCount($id){
    $count=Rating::where('user_id',$id)->count();
    //->where(DB::raw('DATE(created_at)'),Carbon::createFromFormat('Y-m-d H:i:s', $created_at)->format('Y-m-d'))->count();
    return $this->count=$count;
}

public function scopeMonthy($query,$mon)
{
    return $query->whereMonth( 'created_at', $mon)->groupBy(['admin_id', 'created_at']);
}

 
}
