<?php


namespace App\Interface\Maintenance;
use App\Http\Requests\Maintenance\MaintenanceRequireRequest;
use App\Models\Maintenance\MaintenanceRequire;

interface MaintenanceRequireRepositoryInterface
{
    public function index();


    public function store(MaintenanceRequireRequest $request);

    public function update(MaintenanceRequireRequest $request,MaintenanceRequire $maintenanceRequire);

    public function destroy(MaintenanceRequire $maintenanceRequire);

}
