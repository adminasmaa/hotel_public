<?php

namespace App\Models\main;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Types extends Model
{
    use HasFactory;
    protected $guarded=[];
    protected $appends = ['count'];

    public function classes()
    {
        return $this->belongsTo(Classes::class);
    }
    public function getCountAttribute(){
        return Types::where('class_id',$this->id)->count();
    }




}
