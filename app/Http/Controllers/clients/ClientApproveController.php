<?php

namespace App\Http\Controllers\clients;

use App\Http\Controllers\Controller;
use App\Http\Requests\clients\ClientApproveRequest;
use App\Interface\clients\ClientApproveRepositoryInterface;
use App\Models\clients\ClientApprove;
use Illuminate\Http\Request;

class ClientApproveController extends Controller
{
    private $clientRepository;

    public function __construct(ClientApproveRepositoryInterface $clientRepository)
    {
        $this->clientRepository = $clientRepository;
    }

    public function index()
    {
        return $this->clientRepository->index();

    }

    public function store(ClientApproveRequest $request)
    {
        return $this->clientRepository->store($request);
    }

    public function update(ClientApproveRequest $request,$clientApprove)
    {

        return $this->clientRepository->update($request, $clientApprove);
    }

    public function destroy($clientApprove)
    {
        return $this->clientRepository->destroy($clientApprove);
    }
}
