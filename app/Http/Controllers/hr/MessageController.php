<?php

namespace App\Http\Controllers\hr;
use App\Http\Controllers\Controller;

use App\Http\Requests\hr\MessageRequest;
use App\Interface\hr\MessageRepositoryInterface;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    private $messageRepository;

    public function __construct(MessageRepositoryInterface $messageRepository)
    {
        $this->messageRepository = $messageRepository;
    }

    public function index(){
      return $this->messageRepository->index();
    }


    public function store(MessageRequest $request){
       return $this->messageRepository->store($request);
    }
}
