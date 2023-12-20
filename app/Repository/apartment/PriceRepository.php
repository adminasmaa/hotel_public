<?php

namespace App\Repository\apartment;

use App\Helpers\Moving;
use App\Interface\apartment\PriceRepositoryInterface;
use App\Models\Apartment\Apartment;
use App\Models\Apartment\Price;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class PriceRepository implements PriceRepositoryInterface
{

    public function index()
    {
        Moving::getMoving('عرض كل اسعار الشقه');
        $prices=Price::where("apart_id",request()->get('apart'))->get();
        $apart=Apartment::findOrFail(request()->get('apart'));
        //dd($apart->price);
        return view('pages.apartments.prices.index', compact('prices','apart'));
    }

    public function create()
    {
        return view('pages.apartments.prices.create');
    }

    public function store($request)
    {

        $data =$request->validated();  
       // dd(now()->modify('+2 day')->format('D'));
        //dd($request->days);
        $dates=self::get_total_dates($request->from,$request->to,$request->days??[]);
        //dd($dates);
        $data['days']=json_encode($dates) ;
        $data['userAdd']=auth()->user()->id;
       // dd($data);
        Price::create($data);
        Moving::getMoving('حفظ سعر شقه جديد');
        toastr()->success('تم حفظ بنجاح');
        return redirect()->route('prices.index',['apart'=>$request->apart_id]);
    }

    public function edit($price)
    {
        return view('pages.apartments.prices.edit', compact('price'));
    }

    public function update($request, $price)
    {
       
        $data =$request->validated();    
        $data['userEdit']=auth()->user()->id;
        $price->update($data);
        Moving::getMoving('تعديل سعر ');
        toastr()->success('تم تعديل بنجاح');
        return redirect()->route('prices.index');
    }

    public function destroy($price)
    {
       
        $price->delete();
        Moving::getMoving('حذف سعر ');
        toastr()->success('تم الحذف بنجاح');
        return back();
    }

    public function discount($request){
        $dates=self::get_total_dates($request->from,$request->to,$request->days??[]);
        Price::whereIn(DB::raw("DATE(created_at)"),$dates)
        ->where("apart_id","=",$request->apart_id)
        ->update(['discount'=>$request->discount]);
        toastr()->success('تم التحديث بنجاح');
        return back();
    }


    function get_total_dates($start, $end, $weekends = []){

        $start = new \DateTime($start);
        $end   = new \DateTime($end);
        $end->modify('+1 day');
    
        $total_dates = [];
        $period = new \DatePeriod($start, new \DateInterval('P1D'), $end);
        foreach($period as $dt) {
            if (in_array($dt->format('D'),  $weekends)){
                $total_dates[]=$dt->format('D');
            }
        }
      
        return array_unique($total_dates);
    }

}
