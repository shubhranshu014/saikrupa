<?php

namespace App\Http\Controllers;

use App\Models\GlassInventory;
use App\Models\Supplier;
use Illuminate\Http\Request;
use App\Http\Requests\StoreGlassInventoryRequest;
use App\Services\GlassInventoryService;

class GlassInventoryController extends Controller
{
    protected $glassInventoryService;

    public function __construct(GlassInventoryService $glassInventoryService)
    {
        $this->glassInventoryService = $glassInventoryService;
    }
    public function glassinventorylist()
    {
        $glassInventories = GlassInventory::with('supplier')->get();
        // Logic to retrieve and display the glass inventory list for super admin
        return view('superadmin.glassinventorylist')->with(compact('glassInventories'));
    }

    public function createglassinventory()
    {
        $suppliers = Supplier::all(); // Fetch all suppliers for the dropdown
        // Logic to show the form for creating a new glass inventory
        return view('superadmin.createglassinventory')->with(compact('suppliers'));
    }

    public function storeglassinventory(StoreGlassInventoryRequest $request)
    {
        $glassInventory = $this->glassInventoryService->store($request->validated());

        return redirect()
            ->route('superadmin.glassinventory.list') // Change to your listing route name
            ->with('success', 'Glass inventory added successfully!');
    }
}
