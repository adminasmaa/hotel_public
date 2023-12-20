<?php


namespace App\Interface\clients;
use App\Http\Requests\clients\ClientsRequest;
use App\Models\clients\Clients;
use Illuminate\Http\Request;

interface ClientsRepositoryInterface
{
   public function index();
   public function create();

    public function store(ClientsRequest $request);
    public function edit(Clients $client);
    public function show($id);
    public function update(ClientsRequest $request,Clients $client);

    public function destroy(Clients $ClientsStatus);
    public function store_black(Request $request,$id);
    public function remove_black(Request $request,$id);
    public function getdata($id);
}