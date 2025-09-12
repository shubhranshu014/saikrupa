<?php

namespace App\Services;
use App\Models\Product;

class ProductService
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }
    public function store(array $data): Product
    {
        return Product::create([
            'product_name' => $data['product_name'],
            'category' => $data['category'],
            'dimensions' => $data['dimensions'] ?? null,
            'selling_price' => $data['selling_price'],
            'cost_price' => $data['cost_price'] ?? null,
            'quantity' => $data['quantity'],
        ]);
    }
}
