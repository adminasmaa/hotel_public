<?php


namespace App\Interface\clients;

use App\Http\Requests\clients\ClientStatusRequest;




interface ClientStatusRepositoryInterface
{
    public function index();


    public function store(ClientStatusRequest $request);

    public function update(ClientStatusRequest $request,$clientStatus);

    public function destroy($clientStatus);

}
