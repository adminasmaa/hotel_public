<?php

namespace App\Repository\Ads;

use App\Helpers\Moving;
use App\Interface\Ads\AdsRepositoryInterface;
use App\Models\Ads\Ads;
use App\Models\Ads\AdsType;

class AdsRepository implements AdsRepositoryInterface
{
    protected $data;

    public function __construct()
    {
        $this->data['types'] = AdsType::all();

    }

    public function index()
    {
        Moving::getMoving('عرض  الاحصائيات');
        $this->data['ads'] = AdsType::all();

        return view('pages.ads.ads.index', $this->data);
    }
    public function stat($id)
    {
        Moving::getMoving('عرض  الاحصائيات');
        $this->data['stat'] = Ads::where('type_id', $id)->get();
        // print_r($this->data);exit;
        return view('pages.ads.ads.stat', $this->data);

    }
}
