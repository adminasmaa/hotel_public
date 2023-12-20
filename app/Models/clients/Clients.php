<?php

namespace App\Models\clients;

use App\Models\Country;
use App\Models\hr\Branch;
use App\Models\hr\Nationality;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Builder;
use App\Models\Scopes\BranchScope;


class Clients extends Authenticatable
{
    use HasFactory, SoftDeletes;
    protected $guard = "client";
    protected $guarded = [];
    protected $appends = ['country'];
    public static function boot()
    {
        parent::boot();

        static::addGlobalScope(new BranchScope);
    }


    public function getCountryAttribute()
    {
        return optional(Country::where('code', $this->code)->first())->name ;
    }

    public function nationality()
    {
        return $this->belongsTo(Nationality::class);
    }


    public function status()
    {
        return $this->belongsTo(Client_statuses::class, 'client_statuses_id');
    }
    public function approve()
    {
        return $this->belongsTo(ClientApprove::class, 'approve_id');
    }

    public function branch()
    {
        return $this->belongsTo(Branch::class, 'branch_id');
    }

}
