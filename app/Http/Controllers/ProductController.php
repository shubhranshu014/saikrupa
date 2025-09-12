<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Requests\StoreProductRequest;
use App\Services\ProductService;

class ProductController extends Controller
{
    protected $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }
    public function productlist()
    {
        $products = Product::all();
        // Logic to retrieve and return the product list
        return view('superadmin.productlist')->with(compact('products'));
    }
    public function createproduct()
    {
        // Logic to show the product creation form
        return view('superadmin.createproduct');
    }
    public function storeproduct(StoreProductRequest $request)
    {
        $product = $this->productService->store($request->validated());

        return redirect()->route('superadmin.product.list')
            ->with('success', 'Product created successfully.');

    }
}
