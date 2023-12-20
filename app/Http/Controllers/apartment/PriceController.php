<?php

namespace App\Http\Controllers\Apartment;

use App\Http\Controllers\Controller;
use App\Http\Requests\apartment\PriceRequest;
use App\Interface\apartment\PriceRepositoryInterface;
use App\Models\Apartment\Price;
use Illuminate\Http\Request;

class PriceController extends Controller
{
    private $priceRepository;

    public function __construct(PriceRepositoryInterface $priceRepository)
    {
        $this->priceRepository = $priceRepository;
    }
    public function index(){
        return $this->priceRepository->index();
      }
    public function create(){
        return $this->priceRepository->create();
    }

    public function store(PriceRequest $request){
        return $this->priceRepository->store($request);
     }

     public function edit(Price $price){
        return $this->priceRepository->edit($price);

    }

    public function update(PriceRequest $request,Price $price){
        return $this->priceRepository->update($request,$price);
    }
    public function destroy(Price $price){
        return $this->priceRepository->destroy($price);
    }
    public function discount(Request $request){
        return $this->priceRepository->discount($request);
     }
}
