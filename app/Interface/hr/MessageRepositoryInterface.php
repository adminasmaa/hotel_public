<?php


namespace App\Interface\hr;
use App\Http\Requests\hr\MessageRequest;



interface MessageRepositoryInterface
{
   public function index();
   public function store(MessageRequest $request);


}
