<?php


namespace App\Interface;
use App\Models\ContactMessages;
use App\Http\Requests\ContactMessagRequest;

interface ContactMessagRepositoryInterface
{
    public function index();
    public function store(ContactMessagRequest $request);
}