<?php


namespace App\Repository\accounting\Bill;

use App\Helpers\Moving;
use App\Interface\accounting\Bill\BillRepositoryInterface;
use App\Models\accounting\Bill\Bill;
use App\Models\accounting\Bill\BillsSubType;
use App\Models\accounting\Bill\BillsType;
use App\Models\hr\Branch;

class BillRepository implements BillRepositoryInterface
{
    protected $data;


    public function __construct()
    {
        $this->data['types'] = BillsType::all();
        $this->data['branches'] = Branch::withoutGlobalScope('branch')->get();
        // $name=[    
        //         1 => ['name' => 'عهدة', 'name_en' => 'convenant'],
        //         2 => ['name' => 'معتمدين', 'name_en' => 'accredited'],
        //         3 => ['name' => 'فاتورة', 'name_en' => 'bills']      
        // ];
        // if(request()->has('name') && request()->get('name')=='convenant'){
        //     $this->data['name']='عهدة';
        // }else if(request()->has('name') && request()->get('name')=='accredited'){
        //     $this->data['name']='معتمدين';
        // }else{
        //     $this->data['name']='فاتورة';
        // }
    }

    public function index()
    {
        Moving::getMoving('عرض كل الفواتير');
        $this->data['bills']=Bill::filter()->get();
        
        return view('pages.accounting.bills.bills.index', $this->data);
    }

    public function create()
    {
        if(request()->has('name') && request()->get('name')=='convenant'){
            $this->data['name']='عهدة';
        }else if(request()->has('name') && request()->get('name')=='accredited'){
            $this->data['name']='معتمدين';
        }else{
            $this->data['name']='فاتورة';
        }
        return view('pages.accounting.bills.bills.create', $this->data);
    }

    public function store($request)
    {

        $data = $request->validated(); 
        $data['userAdd'] = auth()->user()->id;
        $data['is_bill']=$request->has('is_bill')?'1':0;
        Bill::create($data);
        toastr()->success('تم حفظ بنجاح');
        Moving::getMoving('حفظ الفاتورة جديد');
        return redirect()->route('bills.index',array('name'=>$request->name));
    }

 

    public function edit($bill)
    {
        $this->data['bill'] = $bill;
        if($bill->name=='convenant'){
            $this->data['name']='عهدة';
        }else if($bill->name=='accredited'){
            $this->data['name']='معتمدين';
        }else{
            $this->data['name']='فاتورة';
        }
       
        return view('pages.accounting.bills.bills.edit', $this->data);
    }

    public function update($request, $bill)
    {
        $data = $request->validated(); 
        $data['userEdit'] = auth()->user()->id;
        $data['is_bill']=$request->has('is_bill')?'1':0;
        $bill->update($data);
        Moving::getMoving('تعديل الفاتورة ');
        toastr()->success('تم تعديل بنجاح');

        return redirect()->route('bills.index',array('name'=>$request->name));
    }

    public function destroy($bill)
    {
        Moving::getMoving('حذف الفاتورة ');
        $bill->delete();
        toastr()->success('تم الحذف بنجاح');
        return redirect()->route('bills.index',array('name'=>$bill->name));
    }
    public function show($bill)
    {
        $this->data['bill'] = $bill;
        if($bill->name=='convenant'){
            $this->data['name']='عهدة';
        }else if($bill->name=='accredited'){
            $this->data['name']='معتمدين';
        }else{
            $this->data['name']='فاتورة';
        }
       
        return view('pages.accounting.bills.bills.show', $this->data);
    }
    public function statistic(){
        $monthName=['','يناير','فبراير','مارس','ابريل', 'مايو','يونيو','يوليو','اغسطس','سبتمبر','اكتوبر','نوفمبر','ديسمبر',];
        $months=Bill::selectRaw('month(date) month')
        ->when(request()->has('month'),function($q){
            $q->whereMonth('date',request()->get('month'));
        })
        ->groupBy('month')
        ->orderBy('desc')
        ->get();
        
       $types=BillsType::all();
        return view('pages.accounting.bills.bills.statistic', compact('months','monthName','types'));
    }
}
