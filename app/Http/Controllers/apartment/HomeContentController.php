<?php

namespace App\Http\Controllers\apartment;
use App\Http\Controllers\Controller;

use App\Http\Requests\apartment\HomeContentRequest;
use App\Interface\apartment\HomeContentRepositoryInterface;
use App\Models\Apartment\HomeContent;
use Illuminate\Http\Request;

class HomeContentController extends Controller
{
    private $HomeContentRepository;

    public function __construct(HomeContentRepositoryInterface $HomeContentRepository)
    {
        $this->HomeContentRepository = $HomeContentRepository;
    }

    public function index(){
        return $this->HomeContentRepository->index();

    }
    public function store(HomeContentRequest $request){


        return $this->HomeContentRepository->store($request);
    }
    public function update(HomeContentRequest $request,HomeContent $homeContent){

        return $this->HomeContentRepository->update($request,$homeContent);
    }
    public function destroy(HomeContent $homeContent){
        return $this->HomeContentRepository->destroy( $homeContent);
    }
    public function chooseContent(Request $request){
        return $this->HomeContentRepository->chooseContent( $request);

    }
}
