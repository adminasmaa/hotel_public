<?php

namespace App\Models\Checkall;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CheckallType extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = [];
    public static function boot()
    {
        parent::boot();

        static::deleting(function ($type) {
            $type->checkall()->delete();
            $type->answer()->delete();
        });
    }

    public function checkall()
    {
        return $this->hasMany(Checkall::class, 'type_id');
    }
    public function answer()
    {
        return $this->hasMany(CheckallAnswer::class, 'type_id');
    }
}
