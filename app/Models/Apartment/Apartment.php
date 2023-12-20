<?php

namespace App\Models\Apartment;

use App\Models\Booking;
use App\Models\hr\Branch;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Builder;
use App\Models\Scopes\BranchScope;

class Apartment extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];
    protected $table = 'aparts';

    public function typeable()
    {
        $typeable = [
            1 => ['type' => '1', 'period' => 4, 'day' => 'من الاحد الى الاربعاء'],
            2 => ['type' => '2', 'period' => 3, 'day' => 'من الخميس الى سبت'],
            3 => ['type' => '3', 'period' => 7, 'day' => 'من الاحد الى السبت'],

        ];
        return $typeable;
    }

    public static function booted()
    {
        parent::boot();

        static::deleting(function ($apart) {
            $apart->homeContents()->delete();
            $apart->apartValue()->detach();
        });
    }

    public static function boot()
    {
        parent::boot();

        static::addGlobalScope(new BranchScope);
    }

    public function homeContents()
    {
        return $this->belongsToMany(HomeContent::class, 'aparts_hr_contents')
            ->withPivot('image')
            ->withTimestamps();
    }

    public function apartValue()
    {
        return $this->belongsToMany(Content::class, 'apart_has_values', 'apart_id', 'value_id');
    }

    public function types()
    {
        return $this->belongsTo(ApartType::class, 'type_id');
    }

    public function booking()
    {
        return $this->hasMany(Booking::class, 'apart_id');
    }

    public function price()
    {
        return $this->hasMany(Price::class, 'apart_id');
    }


    public function homeContentsWithContent()
    {
        $ids = $this->apartValue->pluck('id')->toArray();
        return $this->types->homeContents()->with(['content' => function ($query) use ($ids) {
            $query->whereIn('id', $ids);
        }]);
    }

}
