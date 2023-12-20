<?php

namespace App\Models\Maintenance;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MaintenanceRequire extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];
    public static function boot()
    {
        parent::boot();
        static::deleting(function($require) {
             optional($require->maintenance())->delete();
        });
    }
    public function maintenance()
    {
      return $this->hasMany(Maintenance::class,'require_id'); 
    }
}
