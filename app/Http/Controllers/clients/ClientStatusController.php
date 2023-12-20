<?php

namespace App\Http\Controllers\clients;

use App\Http\Controllers\Controller;
use App\Http\Requests\clients\ClientStatusRequest;
use App\Interface\clients\ClientStatusRepositoryInterface;
use Illuminate\Http\Request;

class ClientStatusController extends Controller
{
    private $clientStatusRepository;

    public function __construct(ClientStatusRepositoryInterface $clientStatusRepository)
    {
        $this->clientStatusRepository = $clientStatusRepository;
    }

    public function index()
    {
        return $this->clientStatusRepository->index();

    }

    public function store(ClientStatusRequest $request)
    {
        return $this->clientStatusRepository->store($request);
    }

    public function update(ClientStatusRequest $request,$clientStatus)
    {

        return $this->clientStatusRepository->update($request, $clientStatus);
    }

    public function destroy($clientStatus)
    {
        return $this->clientStatusRepository->destroy($clientStatus);
    }
}
