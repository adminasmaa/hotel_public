<?php

namespace App\Http\Controllers\apartment;
use App\Http\Controllers\Controller;

use App\Http\Requests\apartment\ApartmentRequest;
use App\Http\Requests\apartment\ContentImageRequest;
use App\Interface\apartment\ApartmentRepositoryInterface;
use App\Models\Apartment\Apartment;
use Illuminate\Http\Request;

class ApartmentController extends Controller
{        
    private $apartmentRepository;

    public function __construct(ApartmentRepositoryInterface $apartmentRepository)
    {
        $this->apartmentRepository = $apartmentRepository;
    }
    public function index(){
        return $this->apartmentRepository->index();    
      }
    public function create(){
        return $this->apartmentRepository->create();
    }

    public function store(ApartmentRequest $request){ 
        return $this->apartmentRepository->store($request);;
     }

     public function edit(Apartment $apartment){
        return $this->apartmentRepository->edit($apartment);
          
    }

    public function update(ApartmentRequest $request,Apartment $apartment){
        return $this->apartmentRepository->update($request,$apartment);
    }

    public function destroy(Apartment $apartment){
        return $this->apartmentRepository->destroy($apartment);
    }



  ////////////////////////////// add and delete image /////////////////////////////////////////////////
    public function contentImage(Apartment $apartment){
        return $this->apartmentRepository->contentImage($apartment);
    }
    public function saveImage(Request $request){
        return $this->apartmentRepository->saveImage($request);
    }
    public function saveContentImage(ContentImageRequest $request,Apartment $apartment){
        return $this->apartmentRepository->saveContentImage($request,$apartment);
    }
    public function deleteContentImage($id){
       
        return $this->apartmentRepository->deleteContentImage($id);
    }

  public function getValue($id){
    return $this->apartmentRepository->getValue($id);
  }
    
}
