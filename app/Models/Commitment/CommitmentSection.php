<?php

namespace App\Models\Commitment;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CommitmentSection extends Model
{
    use HasFactory,SoftDeletes;
    protected $guarded = [];
    public static function boot()
    {
        parent::boot();
        static::deleting(function($sectionCommitment) {
             optional($sectionCommitment->commitment())->delete();
        });
    }

    public function commitment()
    {
        return $this->hasMany(Commitment::class, 'section_id');
    }
}
