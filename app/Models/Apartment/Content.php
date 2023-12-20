<?php

namespace App\Models\Apartment;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Content extends Model
{
    use HasFactory,SoftDeletes;


    protected $table='apart_values';

    const main = 'اساسى';
    const normal = 'عادى';
    const maintenance = 'صيانه';

    public function types(){
       return constant('self::' . $this->type);
    }
    protected $guarded=[];

    protected function name(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => json_decode($value, true),
            set: fn ($value) => json_encode($value),
        );
    }
    protected function image(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => json_decode($value, true),
            set: fn ($value) => json_encode($value),
        );
    }

    public function homeContent(){
        return $this->belongsTo(HomeContent::class);
    }

    public function apartValue(){
        return $this->belongsToMany(Apartment::class, 'apart_has_values', 'apart_id', 'value_id');
     }


}
