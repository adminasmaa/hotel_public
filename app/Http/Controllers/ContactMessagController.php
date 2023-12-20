<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;

use App\Interface\ContactMessagRepositoryInterface;
use App\Http\Requests\ContactMessagRequest;
use App\Models\ContactMessages;
use Illuminate\Http\Request;

class ContactMessagController extends Controller
{
    private $ContactMessagRepository;

    public function __construct(ContactMessagRepositoryInterface $ContactMessagRepository)
    {
        $this->ContactMessagRepository = $ContactMessagRepository;
        
    }

    public function index(){
      return $this->ContactMessagRepository->index();
    }


    public function store(ContactMessagRequest $request){
      dd('gggggg');
       return $this->ContactMessagRepository->store($request);
    }
}
