<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Apartment\Apartment;
use App\Models\Apartment\ApartType;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FrontController extends Controller
{

    ///////////////تسجيل الدخول
    public function login(Request $request)
    {

        $this->validate($request, [
            'phone' => 'required',
            'password' => 'required|min:6',
        ]);
        $request->request->add(['code' => substr($request->full, 0, strlen($request->full) - strlen($request->phone))]);
        if (Auth::guard('client')->attempt($request->only(['phone', 'password', 'code']), $request->get('remember'))) {
            return redirect()->intended('/front');
        }
        return back()->withInput($request->only('phone', 'remember'))->withErrors('البيانات خطا');
    }
    ///////////////////الرثيسيه
    public function index()
    {
        return view('pages.front.component.index');
    }

    ////////////////////الشقق
    public function type(Request $request)
    {
        $aparts = ApartType::findOrFail($request->type)->apart;
        return view('pages.front.component.type', compact('aparts'));
    }
    public function detail(Apartment $apartment)
    {
        $apartment->update([
            'view' => $apartment->view + 1,
        ]);
        return view('pages.front.component.detail', compact('apartment'));

    }

    /////////////////////السعر
    public function price(Apartment $apartment, Request $request)
    {
        $price = 0;
        $numDisabledDay = 0;
        if ($apartment->type == 'week') {
            foreach ($apartment->typeable() as $item) {
                if ($item['period'] == ($request->days) % 7) {
                    $price += json_decode($apartment->week_p)[$item['type'] - 1]->price;
                }
            }
            $price += json_decode($apartment->week_p)[2]->price * intval(($request->days) / 7);
        } else {
            $price += $this->get_total_day_price($request->from, $request->to, $apartment)['total'];
            $numDisabledDay = $this->get_total_day_price($request->from, $request->to, $apartment)['numDisabledDay'];
        }
        return response()->json([
            'data' => $price,
            'numDisabledDay' => $numDisabledDay,
        ]);
    }
    public function filter_days($start, $end, $apartment)
    {
        $start = new \DateTime ($start);
        $end = new \DateTime ($end);
        $end->modify('+1 day');
        $total_dates = [];
        $period = new \DatePeriod ($start, new \DateInterval ('P1D'), $end);
        foreach ($period as $dt) {
            if ($apartment->booking->where('from', '<=', $dt->format('Y-m-d'))->where('to', '>=', $dt->format('Y-m-d'))->count() >= $apartment->units) {
                $total_dates[] = $dt->format('Y-m-d');
            }
        }
        return array_unique($total_dates);
    }

    public function get_total_day_price($start, $end, $apartment, $weekends = ['Fri', 'Sat', 'Thu'])
    {

        $start = new \DateTime ($start);
        $end = new \DateTime ($end);
        $end->modify('+1 day');

        $numWeekend = 0;
        $numDays = 0;
        $numDisabledDay = 0;
        $prices = [];
        $period = new \DatePeriod ($start, new \DateInterval ('P1D'), $end);

        foreach ($period as $dt) {
            if ($apartment->booking->where('from', '<=', $dt->format('Y-m-d'))->where('to', '>=', $dt->format('Y-m-d'))->count() >= $apartment->units) {
                $numDisabledDay += 1;
                continue;
            }
            $price = $apartment->price->where('from', '<=', $dt->format('Y-m-d'))->where('to', '>=', $dt->format('Y-m-d'))->first();
            if ($price && (count(json_decode($price->days)) == 0 || in_array($dt->format('D'), json_decode($price->days)))) {
                $prices[] = $price->discount;
            } elseif (in_array($dt->format('D'), $weekends)) {
                $numWeekend += 1;
            } else {
                $numDays += 1;
            }
        }
        $total = array_sum($prices) + ($numDays * json_decode($apartment->day_p)[0]->day) + ($numWeekend * json_decode($apartment->day_p)[0]->week);
        return ['total' => $total,
            'numDisabledDay' => $numDisabledDay,
        ];
    }

    //////////////////////الحجز
    public function booking(Apartment $apartment)
    {
        $to = $apartment->booking->max('to');
        $from = $apartment->booking->min('from');
        $days = $this->filter_days($from, $to, $apartment);
        return view('pages.front.component.booking', compact('apartment', 'days'));

    }

    public function Makebooking(Request $request)
    {
        $data = $request->all();
        $client = auth('client')->user();
        $data['client_date'][] = (object) ['phone' => $client->phone, 'number' => $client->num, 'approve' => $client->approve_id];
        $data['client_id'] = $client->id;
        $data['userAdd'] = 1;
        //dd($data);
        Booking::create($data);
        toastr()->success('تم الحجز بنجاح');
        return back();

    }

}
