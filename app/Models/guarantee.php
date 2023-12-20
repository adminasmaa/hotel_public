<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class guarantee extends Model
{
    use HasFactory,SoftDeletes;
    protected $table ='guarantee';

    protected $guarded=[];
    public function getCountAttribute(){
        return Product::where('guarantee_id',$this->id)->count();
    }
    public function product(){
        return $this->hasMany(Product::class,'guarantee_id');
    }

}
