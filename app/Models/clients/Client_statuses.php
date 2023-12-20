<?php

namespace App\Models\clients;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Client_statuses extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = [
        'name','name_en'
    ];
    public static function boot()
    {
        parent::boot();
        static::deleting(function($status) {
             optional($status->client())->delete();
        });
    }

    public function client()
    {
        return $this->hasMany(Clients::class, 'client_statuses_id');
    }
}
