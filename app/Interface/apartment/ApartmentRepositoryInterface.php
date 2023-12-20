<?php


namespace App\Interface\apartment;

use App\Http\Requests\apartment\ApartmentRequest;
use App\Http\Requests\apartment\ContentImageRequest;
use App\Models\Apartment\Apartment;
use Illuminate\Http\Request;

interface ApartmentRepositoryInterface
{
   public function index();
   public function create();

    public function store(ApartmentRequest $request);
    public function edit(Apartment $apartment);

    public function update(ApartmentRequest $request,Apartment $apartment);

    public function destroy(Apartment $apartment);
    public function contentImage(Apartment $apartment);
    public function saveContentImage(ContentImageRequest $request,Apartment $apartment);
    public function saveImage(Request $request,);
    public function deleteContentImage($id);
   public function getValue($id);

}