<?php


namespace App\Repository\clients;

use App\Helpers\Moving;

use App\Interface\clients\ClientsRepositoryInterface;
use App\Models\Booking;
use App\Models\clients\Clients;
use App\Models\clients\Client_statuses;
use App\Models\clients\ClientApprove;
use App\Models\Country;
use App\Models\hr\Branch;
use App\Models\hr\Nationality;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;


class ClientsRepository implements ClientsRepositoryInterface
{
    protected $data;
    protected $title = 'العملاء';
    protected $sub_title = '';
    protected $images = ['client_img_1', 'client_img_2', 'contract_img'];

    public function __construct()
    {
        $this->data['nationalities'] = Nationality::all();
        $this->data['client_statuses'] = Client_statuses::all();
        $this->data['branches'] = Branch::withoutGlobalScope('branch')->get();
        $this->data['nationalities'] = Nationality::all();
        $this->data['approves'] = ClientApprove::all();
        $this->data['client_statuses'] = Client_statuses::all();
        $this->data['countries'] = Country::all();

    }

    public function index()
    {

        Moving::getMoving('عرض كل اسماء العملاء');
        $this->data['clients'] = Clients::when(request()->has('status'), function ($q) {
            $q->where('client_statuses_id', request()->get('status'));
        })->when(!request()->has('status'), function ($q) {
            $q->where(function ($q) {
                $q->where('client_statuses_id', '!=', '3')->OrWhereNull('client_statuses_id');
            });
        })->get();


        $this->data['title'] = $this->title;

        return view('pages.clients.index', $this->data);
    }

    public function create()
    {

        return view('pages.clients.create', $this->data);
    }

    public function store($request)
    {

        $data = str_contains(url()->previous(), 'bookings') ? Arr::except($request->validated(), ['book_date', 'code']) : $request->validated();
        foreach ($this->images as $image) {
            $data[$image] = Moving::upload($request, 'clients', $image);
        }
        $data['password'] = Hash::make($request->password);
        $data['userAdd'] = auth()->user()->id;
        $data['code'] =substr($request->full,0,strlen($request->full)-strlen($request->phone));
        $client = Clients::create($data);
        if ($request->has('book_date')) {
            $client_date[] = (object)['phone' => $client->phone, 'number' => $client->num, 'approve' => $client->approve_id];
            Booking::create([
                'book_date' => $request->book_date,
                'client_id' => $client->id,
                'client_date' => $client_date,
                'userAdd' => auth()->user()->id
            ]);
            toastr()->success('تم حفظ بنجاح');
            Moving::getMoving('حفظ حجز جديد بعميل جديد');
            return redirect()->route('bookings.index');
        }
        toastr()->success('تم حفظ بنجاح');
        Moving::getMoving('حفظ عميل جديد');
        return redirect()->route('clients.index', array('branch' => request()->get('branch')));
    }

    public function show($id)
    {
        $client = Clients::findOrFail($id);
        return view('pages.clients.show', compact('client'));
    }

    public function edit($client)
    {
        $this->data['client'] = $client;
        return view('pages.clients.edit', $this->data);
    }

    public function update($request, $client)
    {
        $data = $request->validated();

        foreach ($this->images as $image) {
            $data[$image] = Moving::upload($request, 'clients', $image) ?? $client[$image];
        }
        $data['password'] = $request->password ? Hash::make($request->password) : $client->password;

        $data['userEdit'] = auth()->user()->id;
        $client->update($data);
        Moving::getMoving('تعديل عميل ');
        toastr()->success('تم تعديل بنجاح');

        return redirect()->route('clients.index', array('branch' => request()->get('branch')));
    }

    public function destroy(Clients $client)
    {
        Moving::getMoving('حذف عميل ');
        foreach ($this->images as $image) {
            Moving::deleteImage($client[$image]);
        }
        $client->delete();
        toastr()->success('تم الحذف بنجاح');
        return redirect()->route('clients.index', array('branch' => request()->get('branch')));
    }

    public function store_black($request, $id)
    {
        $validator = Validator::make($request->all(), [
            'status_reason' => 'required',
        ]);

        if ($validator->fails()) {
            toastr()->error('يجب ادخل السبب');
            return back();
        }
        $client = Clients::findOrFail($id);
        $client->update([
            'client_statuses_id' => 3,
            'status_reason' => $request->status_reason,
        ]);
        Moving::getMoving('حفظ  بلاك لست');
        toastr()->success('تم عمل بلاك لست');
        return back();
    }

    public function remove_black($request, $id)
    {

        $client = Clients::findOrFail($id);
        $client->update([
            'client_statuses_id' => 1,
        ]);
        Moving::getMoving('الغاء  بلاك لست');
        toastr()->success('تم الغاء بلاك لست');
        return redirect()->route('clients.index', array('branch' => request()->get('branch')));
    }

    public function getdata($id)
    {

        $approve_id = request()->get('approve_id');
        $num = '';
        $client = Clients::findOrFail($id);
        $approves = ClientApprove::all();
        $html = view('pages.bookings.getClient', compact('client', 'approves', 'approve_id', 'num'))->render();

        return response()->json([
            'data' => $html
        ]);
    }

}
