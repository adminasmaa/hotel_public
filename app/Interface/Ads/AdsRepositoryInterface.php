<?php

namespace App\Interface\Ads;

//use App\Http\Requests\Bill\BillRequest;

interface AdsRepositoryInterface
{
    public function index();
    public function stat($id);

}
