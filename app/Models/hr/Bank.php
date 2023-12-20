<?php

namespace App\Models\hr;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    use HasFactory;
    protected $guarded=[];
    protected $table ='hr_banks';
    protected $appends = ['count'];

    public function getCountAttribute(){
        return Employee::whereJsonContains('account_name',$this->name)->count();
    }
}
