<?php


namespace App\Repository\accounting\loans;

use App\Helpers\Moving;
use App\Http\Requests\accounting\loans\LoansRequest;
use App\Interface\accounting\loans\LoansRepositoryInterface;
use App\Models\accounting\loans\Loan_details;
use App\Models\accounting\loans\LoanBranches;
use App\Models\accounting\loans\Loans;
use App\Models\hr\Branch;
use Carbon\Carbon;

class LoansRepository implements LoansRepositoryInterface
{
    protected $data;

    public function __construct()
    {
        $this->data['branches'] = LoanBranches::all();
        $this->data['branches_main'] =Branch::withoutGlobalScope('branch')->get();
    }

    public function index()

    {
        Moving::getMoving('عرض   الديون  ');
        $this->data['loans'] = Loans::when(request()->has('loan_branch_id') && request()->get('loan_branch_id') != '', function ($q) {
            return $q->where('loan_branch_id', request()->get('loan_branch_id'));
        })->get();


        foreach ($this->data['loans'] as $value) {

            $value->late = Loan_details::where('inst_status', 0)->where('loan_id', $value['id'])->where('inst_dt', '<', Carbon::now()->format('Y-m-d'))->count();
            $value->pay_val = Loan_details::where('inst_status', 1)->where('loan_id', $value['id'])->first();
            $value->pay = Loan_details::where('inst_status', 1)->where('loan_id', $value['id'])->count();

        }



        return view('pages.accounting.loans.index', $this->data);
    }

    public function create()
    {
        //
        return view('pages.accounting.loans.create', $this->data);
    }

    public function store($request)
    {

        $data = $request->validated();
        $data['userAdd'] = auth()->user()->id;
        $new_loan = Loans::create($data);
        $date = Carbon::createFromFormat('Y-m-d', $new_loan->installment_data);
        $loan_inst_first = new Loan_details;
        $final_date = $date->toDateString();
        $loan_inst_first->inst_dt = $final_date;
        $loan_inst_first->loan_id = $new_loan->id;
        $loan_inst_first->inst_val = $new_loan->installment_amount;
        $loan_inst_first->inst_status = 0;
        $loan_inst_first->userAdd = auth()->user()->id;
        $loan_inst_first->save();


        for ($i = 1; $i < $new_loan->getNOInstallmentAmountAttribute(); $i++) {
            $loan_inst = new Loan_details;
            $date->addMonth(1);
            $final_date = $date->toDateString();
            $loan_inst->inst_dt = $final_date;
            $loan_inst->loan_id = $new_loan->id;
            $loan_inst->inst_val = $new_loan->installment_amount;
            $loan_inst->inst_status = 0;
            $loan_inst->userAdd = auth()->user()->id;
            $loan_inst->save();
        }
        toastr()->success('تم اضافة بنجاح');
        Moving::getMoving('حفظ دين  جديد');
        return redirect()->route('loans.index');
    }

    public function edit(Loans $loan)
    {
        //
        $this->data['loan'] = $loan;

        Moving::getMoving('تعديل دين ');

        return view('pages.accounting.loans.edit', $this->data);
    }

    public function show($id, $request)
    {
        if ($request->details_id) {
            $details = Loan_details::where('id', $request->details_id)->first();
            $details->inst_status = 1;
            $details->save();
            toastr()->success('تم  دفع القسط بنجاح');

        }


        $loan_details = Loan_details::where('loan_id', $id)->get();


        return view('pages.accounting.loans.show', compact('loan_details'));
    }

    public function update($request, $loan)
    {
           $today_date=Carbon::now()->format('Y-m-d');
            $data = $request->all();

        if ($request->loan_date   &&   $request->loan_date>= $today_date &&  $today_date > $loan->loan_date ) {
            toastr()->error('لا يمكن تغير تاريج المعاملة ');
            return redirect()->route('loans.index');
        }elseif ($request->installment_amount   &&   $request->installment_amount >  ($loan->count*$loan->installment_amount)  ) {
        toastr()->error('لا يمكن تغير  قيمة القسط لانه اكبر من المبلغ المتبقى ');
        return redirect()->route('loans.index');
    }



        $data['userEdit'] = auth()->user()->id;

        $loan->update($data);
        $loans_details = Loan_details::where('loan_id', $loan->id)->where('inst_status', 0)->get();


        foreach ($loans_details as $loan_detail) {
            $loan_detail->delete();
        }

        $loan_inst_first = new Loan_details;
        $final_date = $loan->installment_data;
        $loan_inst_first->inst_dt = $final_date;
        $loan_inst_first->loan_id = $loan->id;
        $loan_inst_first->inst_val = $loan->installment_amount;
        $loan_inst_first->inst_status = 0;
        $loan_inst_first->userAdd = auth()->user()->id;
        $loan_inst_first->save();
        $date = Carbon::createFromFormat('Y-m-d', $loan->installment_data);
        for ($i = 1; $i < $loan->getNOInstallmentAmountAttribute(); $i++) {
            $loan_inst = new Loan_details;
            $date->addMonth(1);
            $final_date = $date->toDateString();
            $loan_inst->inst_dt = $final_date;
            $loan_inst->loan_id = $loan->id;
            $loan_inst->inst_val = $loan->installment_amount;
            $loan_inst->inst_status = 0;
            $loan_inst->userAdd = auth()->user()->id;
            $loan_inst->save();
        }


        toastr()->success('تم التعديل بنجاح');
        Moving::getMoving('تعديل دين ');

        return redirect()->route('loans.index');
    }

    public function destroy(Loans $loan)
    {


        $loan->delete();
        toastr()->success('تم الحذف بنجاح');
        Moving::getMoving('حذف دين ');

        return back();
    }

    public function change_status($id, $request)
    {


        $loan = Loans::where('id', $id)->first();


        $loan->update(['status_loan' => $request->status]);

        return response()->json('ok');
//


    }

}
