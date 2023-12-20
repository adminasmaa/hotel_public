<?php


namespace App\Interface\Maintenance;

use App\Http\Requests\Maintenance\MaintenanceRequest;
use App\Models\Maintenance\Maintenance;
use Illuminate\Http\Request;

interface MaintenanceRepositoryInterface
{
    public function index();
    public function create();
    public function store(MaintenanceRequest $request);
    public function edit(Maintenance $maintenance);
    public function update(MaintenanceRequest $request,Maintenance $maintenance);
    public function destroy(Maintenance $maintenance);
    public function expired(Maintenance $maintenance);
}