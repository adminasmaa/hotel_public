<?php

namespace App\Models;

use App\Models\clients\ClientApprove;
use App\Models\clients\Clients;
use App\Models\hr\Employee;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Booking extends Model
{
    use HasFactory,SoftDeletes;
    protected $guarded=[];
    protected $appends = ['approve'];

    public function getApproveAttribute(){
            return ClientApprove::findOrFail($this->client_date[0]['approve'])->name;
    }
    public function client(){
        return $this->belongsTo(Clients::class,'client_id');
    }
    public function employee(){
        return $this->belongsTo(Employee::class,'userAdd');
    }
    protected function clientDate(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => json_decode($value,true),
            set: fn ($value) => json_encode($value),
        );
    }
}
