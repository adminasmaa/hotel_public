<?php


namespace App\Repository\main;

use App\Helpers\Moving;
use App\Models\Country;
use App\Models\guarantee;
use App\Models\main\Product;
use App\Interface\main\ProductRepositoryInterface;
use App\Models\main\Classes;
use App\Models\main\Company;
use App\Models\main\Marks;
use App\Models\main\Types;

class ProductRepository implements ProductRepositoryInterface
{
    protected $data;

    public function __construct()
    {
        $this->data['companies'] = Company::where('is_active', 1)->get();
        $this->data['classes'] = Classes::all();
        $this->data['marks'] = Marks::all();
        $this->data['types'] = Types::all();
        $this->data['countries'] = Country::all();
        $this->data['guarantees'] = guarantee::all();

    }

    public function index()
    {

        $this->data['products'] = Product::when(request()->has('modal') && request()->get('modal') != '', function ($q) {
            $q->where('modal', 'LIKE', '%' . request()->get('modal') . '%');
        })
            ->when(request()->has('bar_code') && request()->get('bar_code') != '', function ($q) {
                $q->where('bar_code', 'LIKE', '%' . request()->get('bar_code') . '%');
            })->cursor()
            ->when(request()->has('company_id') && request()->get('company_id') != '', function ($q) {
                return $q->where('company_id', request()->get('company_id'));
            })
            ->when(request()->has('class_id') && request()->get('class_id') != '', function ($q) {
                return $q->where('class_id', request()->get('class_id'));
            })
            ->when(request()->has('marks_id') && request()->get('marks_id') != '', function ($q) {
                return $q->filter(fn($q) => $q->marks_id == request()->get('marks_id'));
            })
            ->when(request()->has('type_id') && request()->get('type_id') != '', function ($q) {
                return $q->filter(fn($q) => $q->type_id == request()->get('type_id'));
            })
            ->when(request()->has('country') && request()->get('country_id') != '', function ($q) {
                return $q->where('country_id', request()->get('country_id'));
            })
            ->when(request()->has('guarantee_id') && request()->get('guarantee_id') != '', function ($q) {

                return $q->where('guarantee_id', request()->get('guarantee_id'));
            })
            ->collect();


        Moving::getMoving('عرض كل اسماء الشركات');
        return view('pages.main.products.index', $this->data);
    }

    public function create()
    {
        return view('pages.main.products.create', $this->data);
    }

    public function store($request)
    {

        $data = $request->all();
        $data['serial_no'] = $request->has('serial_no') ? 1 : 0;
        if ($request->hasFile('img')) {
            $data['img'] = Moving::upload($request, 'product', 'img');

        }
        $data['userAdd'] = auth()->user()->id;
        Product::create($data);
        Moving::getMoving('حفظ المنتج جديد');
        toastr()->success('تم حفظ بنجاح');
        return redirect()->route('products.index');
    }

    public function edit($product)
    {
        $this->data['product'] = $product;

        return view('pages.main.products.edit', $this->data);
    }

    public function update($request, $product)
    {

        $data = $request->all();
        $data['serial_no'] = $request->has('serial_no') ? 1 : 0;
        $data['img'] = Moving::upload($request, 'product', 'img');
        $data['userEdit'] = auth()->user()->id;

        $product->update($data);
        Moving::getMoving('تعديل المنتج ');
        toastr()->success('تم تعديل بنجاح');
        return redirect()->route('products.index');
    }

    public function destroy(Product $product)
    {
        Moving::deleteImage($product->img);
        $product->delete();
        toastr()->success('تم الحذف بنجاح');
        Moving::getMoving('حذف المنتج ');

        return back();
    }

}
