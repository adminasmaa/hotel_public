<?php

namespace App\Repository;

use App\Helpers\Moving;
use App\Interface\BookingRepositoryInterface;
use App\Models\Apartment\Apartment;
use App\Models\Booking;
use App\Models\clients\ClientApprove;
use App\Models\hr\Branch;
use Illuminate\Support\Arr;

class BookingRepository implements BookingRepositoryInterface
{

    public function index()
    {
        Moving::getMoving('عرض الحجوزات');
        $data['bookings'] = Booking::where('case', 1)->where('status', 0)->get();
        $data['activeBookings'] = Booking::where('case', 1)->where('from', '=<', date("Y-m-d"))->get();
        $data['expireBookings'] = Booking::where('case', 1)->where('to', '>', date("Y-m-d"))->get();
        $data['cancelBookings'] = Booking::where('case', 0)->get();
        $data['paidBookings'] = Booking::where('status', 1)->get();
        $data['approves'] = ClientApprove::all();
        $data['branches'] = Branch::withoutGlobalScope('branch')->get();
        return view('pages.bookings.index', $data);
    }

    public function create($id)
    {
        /*   if(request()->has('name') && request()->get('name')=='convenant'){
        $this->data['name']='عهدة';
        }else if(request()->has('name') && request()->get('name')=='accredited'){
        $this->data['name']='معتمدين';
        }else{
        $this->data['name']='فاتورة';
        }

        return view('pages.booking.create', $this->data);
         */
        $this->data['apart_data'] = Apartment::where('id', $id)->first();
        $this->data['approves'] = ClientApprove::all();

        return view('pages.bookings.create', $this->data);

    }

    public function store($request)
    {
        $request->request->add(['userAdd' => auth()->user()->id]);
        $data = Arr::except($request->all(), ['chooose', 'phone', 'num', 'approve_id']);

        $data['client_date'][] = (object) ['phone' => $request->phone, 'number' => $request->num, 'approve' => $request->approve_id];
        $client = Arr::except($request->all(), ['chooose', 'client_id', 'book_date', 'code']);
        $client['code'] = substr($request->full, 0, 4);
        $booking = Booking::create($data);
        $booking->client;
        $booking->client->update($client);
        toastr()->success('تم حفظ بنجاح');
        Moving::getMoving('حفظ حجز جديد');
        return redirect()->route('bookings.index');
    }
    public function destroy(Booking $booking)
    {
        $booking->delete();
        toastr()->success('تم الحذف بنجاح');
        Moving::getMoving('حذف حجز ');

        return back();
    }
    public function show(Booking $booking)
    {

        return view('pages.bookings.show', compact('booking'));
    }
    public function changeStatus($id)
    {
        Booking::findOrFail($id)->update([
            'status' => 1,
        ]);
        toastr()->success('تم تغير حاله الدفع بنجاح');
        Moving::getMoving('تغير الحاله');

        return back();
    }
    public function changeCase($id)
    {
        /*  return response()->json([
        'data' => 'تم الغاء'
        ]);
         */
        Booking::findOrFail($id)->update([
            'case' => 0,
        ]);
        toastr()->success('تم تغير الغاء الحاله  بنجاح');
        Moving::getMoving('تغير الحاله');
        return back();
    }

}
