<?php

namespace App\Models\accounting\loans;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\accounting\loans\Loan_details;
use App\Models\Scopes\BranchScope;
use Carbon\Carbon;

use Illuminate\Database\Eloquent\Builder;

class Loans extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'loans';
    protected $appends = ['installment_no','count'];
    protected $guarded = [];
    public static function boot()
    {
        parent::boot();

        static::addGlobalScope(new BranchScope);
    }
    public function getCountAttribute()
    {
        return Loan_details::where('loan_id', $this->id)->where('inst_status',0)->where('inst_dt', '>', Carbon::now()->format('Y-m-d'))->count();
    }


    public function getNOInstallmentAmountAttribute()
    {


        $pay_value = $this->loan_amount - $this->pay_amount;
        $pay_count=Loan_details::where('loan_id',$this->id)->where('inst_status',1)->count();
        $pay_val=Loan_details::where('loan_id',$this->id)->where('inst_status',1)->first();
        if($pay_val){
            $pay_value =$pay_value-($pay_count*$pay_val->inst_val);
        }else{
            $pay_value= $pay_value;
        }

        $installment_no = ($pay_value) / $this->installment_amount;

        return $installment_no;
    }

    public function loanDetails()
    {
        return $this->hasMany(Loan_details::class, 'loan_id');
    }


}
