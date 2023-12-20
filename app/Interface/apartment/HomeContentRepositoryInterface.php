<?php


namespace App\Interface\apartment;

use App\Http\Requests\apartment\HomeContentRequest;
use App\Models\Apartment\HomeContent;
use Illuminate\Http\Request;

interface HomeContentRepositoryInterface
{
    public function index();


    public function store(HomeContentRequest $request);

    public function update(HomeContentRequest $request,HomeContent $homeContent);

    public function destroy(HomeContent $homeContent);
    public function chooseContent(Request $request);

}
