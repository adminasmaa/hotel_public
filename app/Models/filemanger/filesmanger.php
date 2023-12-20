<?php

namespace App\Models\filemanger;
use App\Models\filemanger\files_depts;
use App\Models\filemanger\files_types;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Builder;
use App\Models\Scopes\BranchScope;

class filesmanger extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];
    protected $appends = ['file_type_id','file_dept_id','branch_id'];

    public static function boot()
    {
        parent::boot();

        static::addGlobalScope(new BranchScope);
    }

    public function files_dept()
    {
        return $this->belongsTo(files_depts::class, 'file_dept_id');
    }

    public function files_type()
    {
        return $this->belongsTo(files_types::class, 'file_type_id');
    }

}
