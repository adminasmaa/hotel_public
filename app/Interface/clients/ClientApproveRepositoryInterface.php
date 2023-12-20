<?php


namespace App\Interface\clients;

use App\Http\Requests\clients\ClientApproveRequest;
use App\Models\clients\ClientApprove;



interface ClientApproveRepositoryInterface
{
    public function index();


    public function store(ClientApproveRequest $request);

    public function update(ClientApproveRequest $request,$clientApprove);

    public function destroy($clientApprove);

}
