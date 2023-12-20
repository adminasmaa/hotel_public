<?php

namespace App\Models\Maintenance;

use App\Models\Apartment\Apartment;
use App\Models\Apartment\ApartType;
use App\Models\Apartment\HomeContent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Session;


class Maintenance extends Model
{
    use HasFactory,SoftDeletes;

    protected $guarded = [];


    public function apartType()
    {
      return $this->belongsTo(ApartType::class,'type_id');
    }
    public function apart()
    {
      return $this->belongsTo(Apartment::class,'apart_id');
    }
    public function content()
    {
      return $this->belongsTo(HomeContent::class,'content_id');
    }
    public function require()
    {
      return $this->belongsTo(MaintenanceRequire::class,'require_id');
    }

    protected static function booted(): void
    {
        static::addGlobalScope(' maintenances', function (Builder $builder) {
            $branch_id = Session::get('branch');
            $builder->when(auth()->user()->branch_id != 1, function ($q) {
                $types_ids = ApartType::where('branch_id', auth()->user()->branch_id)->pluck('id')->ToArray();
                $q->whereIn('type_id', $types_ids);
            })->when($branch_id, function ($q) use ($branch_id) {
                $types_ids = ApartType::where('branch_id', Session::get('branch'))->pluck('id')->ToArray();
                $q->whereIn('type_id', $types_ids);
            });

        });
    }


}
