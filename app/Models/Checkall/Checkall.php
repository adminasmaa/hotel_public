<?php

namespace App\Models\Checkall;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Checkall extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = [];
    public function type()
    {
        return $this->belongsTo(CheckallType::class);
    }
}
