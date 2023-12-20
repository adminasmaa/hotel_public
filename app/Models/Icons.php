<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Icons extends Model
{
    use HasFactory;
    protected $guarded=[];
    protected $fillable = [
        'id','name'     
    ];

    public function icon(){
        return $this->belongsTo(Icons::class,'id');
    }
}
