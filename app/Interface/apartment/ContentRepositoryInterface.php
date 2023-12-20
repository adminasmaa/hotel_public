<?php


namespace App\Interface\apartment;

use App\Http\Requests\apartment\ContentRequest;
use App\Models\Apartment\Content;
use Illuminate\Http\Request;

interface ContentRepositoryInterface
{
   public function index(Request $request);
   public function create(Request $reques);

    public function store(ContentRequest $request);
    public function edit(Content $company);

    public function update(ContentRequest $request,Content $company);

    public function destroy(Content $company);
    public function remove($apart,Content $content);

}