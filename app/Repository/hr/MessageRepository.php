<?php


namespace App\Repository\hr;

use App\Helpers\Moving;
use App\Interface\hr\MessageRepositoryInterface;
use App\Models\hr\Employee;
use Illuminate\Support\Arr;
use App\Models\hr\Message;


class MessageRepository implements MessageRepositoryInterface
{


    public function index()
    {
        $data['employees'] = Employee::when(request()->has('search'), function ($q) {
            $q->where('user_name', 'LIKE', '%' . request()->get('search') . '%');
        })->get();
        $data['showEmployees'] = Employee::when(request()->has('id'), function ($q) {
            $q->where('id', request()->get('id'));
        })->with('messages')->get();


        ////////////////////seen

        auth()->user()->messages()->when(request()->has('id'), function ($q) {
            $q->where('messages_id', request()->get('id'));

        })->update(['seen' => 1]);
       // dd(auth()->user()->messages()->get());


        Moving::getMoving('عرض كل الرسائل');

        return view('pages.hr.messages.index', $data);
    }


    public function store($request)
    {


        $data = Arr::except($request->validated(), 'profession_id');
        $data['from'] = auth()->user()->id;

        $new_messages = Message::create($data);
        if ($request->type_message_send == 'all') {
            if ($request->employees_id == null && $request->profession_id != null) {
                $employee_send_messages = Employee::where('emp_state_id', '!=', 5)->where('profession_id', $request->profession_id)->where('id', '!=', auth()->user()->id)->pluck('id');
                foreach ($employee_send_messages as $employee_message_id) {
                    $new_messages->employees()->attach([$employee_message_id]);
                }


            } else {
                $new_messages->employees()->attach([$request->employees_id]);


            }
        } else {

            $new_messages->employees()->attach([$request->to]);

        }

        Moving::getMoving('حفظ  رسالة جديدة');
        toastr()->success('تم حفظ بنجاح');

        return back();
    }


}
