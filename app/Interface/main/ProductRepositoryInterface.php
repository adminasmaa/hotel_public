<?php


namespace App\Interface\main;
use App\Http\Requests\main\ProductRequest;
use App\Models\main\Product;


interface ProductRepositoryInterface
{
   public function index();
   public function create();

    public function store(ProductRequest $request);
    public function edit(Product $product);

    public function update(ProductRequest $request,Product $product);

    public function destroy(Product $product);

}