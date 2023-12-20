<?php

namespace App\Http\Controllers\Maintenance;

use App\Http\Controllers\Controller;
use App\Http\Requests\Maintenance\MaintenanceRequireRequest;
use App\Interface\Maintenance\MaintenanceRequireRepositoryInterface;
use App\Models\Maintenance\MaintenanceRequire;
use Illuminate\Http\Request;

class MaintenanceRequireController extends Controller
{
    private $maintenanceRequire;

    public function __construct(MaintenanceRequireRepositoryInterface $maintenanceRequire)
    {
        $this->maintenanceRequire = $maintenanceRequire;
    }

    public function index(){
        return $this->maintenanceRequire->index();

    }
    public function store(MaintenanceRequireRequest $request){


        return $this->maintenanceRequire->store($request);
    }
    public function update(MaintenanceRequireRequest $request,MaintenanceRequire $maintenanceRequire){

        return $this->maintenanceRequire->update($request,$maintenanceRequire);
    }
    public function destroy(MaintenanceRequire $maintenanceRequire){
        return $this->maintenanceRequire->destroy( $maintenanceRequire);
    }
}
