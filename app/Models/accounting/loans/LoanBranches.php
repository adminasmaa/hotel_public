<?php

namespace App\Models\accounting\loans;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LoanBranches extends Model
{
    use HasFactory,SoftDeletes;
    protected $guarded=[];
    protected $appends = ['count'];

    public function getCountAttribute()
    {
        return Loans::where('loan_branch_id', $this->id)->count();
    }
}
