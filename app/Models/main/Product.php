<?php

namespace App\Models\main;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory,SoftDeletes;
    protected $guarded=[];
    protected $appends = ['mark','mark_id','guarantee_id'];



    public function company(){
        return $this->belongsTo(Company::class);
    }
    public function class(){
        return $this->belongsTo(Classes::class,'class_id');
    }
    public function mark(){

        return $this->belongsTo(Marks::class,'marks_id');


    }
    public function type(){
        return $this->belongsTo(Types::class,'type_id');

    }
    public function guraantee(){
        return $this->belongsTo(guarantee::class,'guraantee_id');

    }
    public function getCountAttribute(){
        return guarantee::where('guraantee_id',$this->id)->count();
    }

}
