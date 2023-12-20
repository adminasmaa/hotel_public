<?php

namespace App\Http\Controllers\Ads;

use App\Http\Controllers\Controller;
//use App\Http\Requests\A\BillRequest;
use App\Interface\Ads\AdsRepositoryInterface;

class AdsController extends Controller
{
    private $adsRepository;

    public function __construct(AdsRepositoryInterface $adsRepository)
    {
        $this->adsRepository = $adsRepository;
    }
    public function index()
    {
        return $this->adsRepository->index();
    }
    public function stat($id)
    {
        return $this->adsRepository->stat($id);
    }
}
