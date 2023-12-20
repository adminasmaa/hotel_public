<?php

namespace App\Models\Apartment;

use App\Models\hr\Branch;
use App\Models\Maintenance\Maintenance;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Builder;
use App\Models\Scopes\BranchScope;

class ApartType extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    public static function booted()
    {
        parent::boot();
        static::deleting(function ($type) {
            optional($type->apart())->delete();
            optional($type->maintenance())->delete();
        });
    }


    public static function boot()
    {
        parent::boot();

        static::addGlobalScope(new BranchScope);
    }


    public function homeContents()
    {
        return $this->belongsToMany(HomeContent::class, 'content_types', 'type_id', 'content_id');
    }

    public function bedType()
    {
        return $this->belongsTo(bedType::class, 'bed_id');
    }

    public function viewType()
    {
        return $this->belongsTo(viewType::class, 'view_id');
    }

    public function apart()
    {
        return $this->hasMany(Apartment::class, 'type_id');
    }

    public function maintenance()
    {
        return $this->hasMany(Maintenance::class, 'type_id');
    }

    public function branch()
    {
        return $this->belongsTo(Branch::class, 'branch_id');
    }

}
