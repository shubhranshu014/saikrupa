<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreStockMovementRequest;
use App\Services\StockMovementService;

class StockMovementController extends Controller
{
    protected $stockMovementService;

    public function __construct(StockMovementService $stockMovementService)
    {
        $this->stockMovementService = $stockMovementService;
    }
    public function stockmovementlist()
    {
        $movements = \App\Models\StockMovement::with('store','product')->get();
        // Logic to retrieve and display the stock movement list
        return view('superadmin.stockmovementlist')->with(compact('movements'));
    }
    public function createstockmovement()
    {
        $products = \App\Models\Product::all();
        $stores = \App\Models\Store::all();
        // Logic to show the form for creating a new stock movement
        return view('superadmin.createstockmovement')->with(compact('stores','products'));
    }

    public function storestockmovement(StoreStockMovementRequest $request)
    {
        // Store record via service
        $this->stockMovementService->store($request->validated());

        return redirect()
            ->route('superadmin.stockmovement.list')
            ->with('success', 'Stock movement recorded successfully.');
    }

}
