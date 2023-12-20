<?php


namespace App\Repository;

use App\Helpers\Moving;
use App\Models\ContactMessages;
use App\Interface\ContactMessagRepositoryInterface;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ContactMessagRepository implements ContactMessagRepositoryInterface
{
    protected $data;
    public function index()
    {
        Moving::getMoving('عرض كل  الماركات');
       // dd('dddddddddd');
        return view('contact');
    }

    public function store($request)
    {
        // dd($request->all());
        $data = $request->validated();
        ContactMessages::create($data);
        toastr()->success('تم حفظ بنجاح');
        Moving::getMoving('حفظ رسالة تواصل جديد');

        return redirect()->route('contact');
    }

}
