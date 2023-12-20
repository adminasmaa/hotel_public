<?php

namespace App\Http\Controllers\Maintenance;

use App\Http\Controllers\Controller;
use App\Http\Requests\Maintenance\MaintenanceRequest;
use App\Interface\Maintenance\MaintenanceRepositoryInterface;
use App\Models\Maintenance\Maintenance;
use Illuminate\Http\Request;

class MaintenanceController extends Controller
{
    private $maintenanceRepository;

    public function __construct(MaintenanceRepositoryInterface $maintenanceRepository)
    {
        $this->maintenanceRepository = $maintenanceRepository;
    }
    public function index(){
        return $this->maintenanceRepository->index();    
      }
    public function create(){
        return $this->maintenanceRepository->create();
    }

    public function store(MaintenanceRequest $request){ 
        return $this->maintenanceRepository->store($request);;
     }

     public function edit(Maintenance $maintenance){
        return $this->maintenanceRepository->edit($maintenance);
          
    }

    public function update(MaintenanceRequest $request,Maintenance $maintenance){
        return $this->maintenanceRepository->update($request,$maintenance);
    }
    public function destroy(Maintenance $maintenance){
        return $this->maintenanceRepository->destroy($maintenance);
    }
    public function expired(Maintenance $maintenance){
        return $this->maintenanceRepository->expired($maintenance);
    }
}
