<?php

namespace App\Models\hr;

use App\Models\Apartment\HomeContent;
use App\Models\clients\Clients;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Facades\Session;

class Branch extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table = 'hr_branches';

    protected $appends = ['count', 'c_count'];


    protected static function booted(): void
    {
        static::addGlobalScope('branch', function (Builder $builder) {
            $builder->when(auth()->user()->branch_id != 1, function ($q) {
                $q->where('id', auth()->user()->branch_id);
            })->when(Session::has('branch'),function ($q) {
                $q->where('id', Session::get('branch'));
            });
        });
    }

    public function getCountAttribute()
    {
        return Employee::where('branch_id', $this->id)->count();
    }

    public function getCCountAttribute()
    {
        $client = !request()->has('status') ? Clients::where('branch_id', $this->id)->where(function ($q) {
            $q->where('client_statuses_id', '!=', 3)->orWhereNull('client_statuses_id');
        })->count() : Clients::where('branch_id', $this->id)->where('client_statuses_id', 3)->count();
        return $client;
    }

    protected function link(): Attribute
    {
        return Attribute::make(
            get: fn($value) => json_decode($value, true),
            set: fn($value) => json_encode($value),
        );
    }

    protected function name(): Attribute
    {
        return Attribute::make(
            get: fn($value) => json_decode($value)->ar,
            set: fn($value) => json_encode($value),
        );
    }


    public function name_en()
    {
        return json_decode($this->getRawOriginal('name'))->en ?? '';
    }

    public function employee()
    {
        return $this->hasMany(Employee::class);
    }

    public function security()
    {
        return Employee::where('branch_id', $this->id)->whereJsonContains('license', ["type" => "security", "receipt" => 1])->get();
    }

    public function egypt_license()
    {
        $yes = Employee::where('branch_id', $this->id)->whereJsonContains('license', ["type" => "egypt", "receipt" => 1])->get();
        $no = Employee::where('branch_id', $this->id)->whereJsonContains('license', ["type" => "egypt", "receipt" => 0])->get();
        return ['yes' => $yes, 'no' => $no];
    }

    public function kuwait_license()
    {
        $yes = Employee::where('branch_id', $this->id)->whereJsonContains('license', ["type" => "Kuwait", "receipt" => 1])->get();
        $no = Employee::where('branch_id', $this->id)->whereJsonContains('license', ["type" => "Kuwait", "receipt" => 0])->get();
        return ['yes' => $yes, 'no' => $no];
    }

    public function uniform()
    {
        $yes = Employee::where('branch_id', $this->id)->where('uniform', 1)->get();
        $no = Employee::where('branch_id', $this->id)->where('uniform', 0)->get();
        return ['yes' => $yes, 'no' => $no];
    }

    public function living()
    {
        $yes = Employee::where('branch_id', $this->id)->where('living', 'employees')->get();
        $no = Employee::where('branch_id', $this->id)->where('living', 'external_employees')->get();
        return ['yes' => $yes, 'no' => $no];
    }

    public function content()
    {
        return $this->belongsToMany(HomeContent::class, 'branch_content', 'branch_id', 'content_id');
    }

}
