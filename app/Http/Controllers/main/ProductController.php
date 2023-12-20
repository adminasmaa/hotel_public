<?php

namespace App\Http\Controllers\main;
use App\Http\Controllers\Controller;

use App\Http\Requests\main\ProductRequest;
use App\Interface\main\ProductRepositoryInterface;
use App\Models\main\Product;
use App\Models\main\Types;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    private $productRepository;

    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->productRepository = $productRepository;
    }
    public function index(){
        return $this->productRepository->index();
      }
    public function create(){
        return $this->productRepository->create();
    }

    public function store(ProductRequest $request){
        return $this->productRepository->store($request);
     }

     public function edit(Product $product){
        return $this->productRepository->edit($product);

    }

    public function update(ProductRequest $request,Product $product){
        return $this->productRepository->update($request,$product);
    }
    public function destroy(Product $product){
        return $this->productRepository->destroy($product);
    }




}
