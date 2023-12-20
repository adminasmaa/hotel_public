<?php

namespace App\Http\Controllers\clients;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
//use App\Http\Requests;

use App\Http\Requests\clients\ClientsRequest;
use App\Models\clients\Clients;
use App\Interface\clients\ClientsRepositoryInterface;

class ClientsController extends Controller
{
    private $clientRepository;

    public function __construct(ClientsRepositoryInterface $clientRepository)
    {
        $this->clientRepository = $clientRepository;
    }

    public function index(){
      return $this->clientRepository->index();
    }
    public function create(){
        return $this->clientRepository->create();

    }
    public function store(ClientsRequest $request){
       return $this->clientRepository->store($request);
    }
    public function show($id){
        return $this->clientRepository->show($id);
    }
    public function edit(Clients $client){
        return $this->clientRepository->edit($client);

    }
    public function update(ClientsRequest $request,Clients $client){
        return $this->clientRepository->update($request,$client);
    }
    public function destroy(Clients $client){
        return $this->clientRepository->destroy($client);
    }
    public function store_black(Request $request, $id){

        return $this->clientRepository->store_black($request,$id);
     }
     public function remove_black(Request $request, $id){

        return $this->clientRepository->remove_black($request,$id);
     }
     public function getdata($id){

        return $this->clientRepository->getdata($id);
     }
}
