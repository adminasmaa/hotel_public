<?php

namespace App\Models;

use App\Models\hr\Branch;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;
    protected $guarded=[];



    public function getCountAttribute(){
        return Product::where('country_id',$this->id)->count();
    }
}
