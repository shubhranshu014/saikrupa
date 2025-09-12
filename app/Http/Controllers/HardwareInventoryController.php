<?php

namespace App\Http\Controllers;

use App\Models\HardwareInventory;
use App\Models\Supplier;
use Illuminate\Http\Request;
use App\Http\Requests\StoreHardwareInventoryRequest;
use App\Services\HardwareInventoryService;

class HardwareInventoryController extends Controller
{
    protected $hardwareInventoryService;

    public function __construct(HardwareInventoryService $hardwareInventoryService)
    {
        $this->hardwareInventoryService = $hardwareInventoryService;
    }
    public function hardwareinventorylist()
    {
        $hardwareInventories = HardwareInventory::with('supplier')->get();
        // Logic to retrieve and display the hardware inventory list
        return view('superadmin.hardwareinventorylist')->with(compact('hardwareInventories'));
    }
    public function createhardwareinventory()
    {
        $suppliers = Supplier::all();
        // Logic to show the form for creating a new hardware inventory item
        return view('superadmin.createhardwareinventory')->with(compact('suppliers'));
    }

    public function storehardwareinventory(StoreHardwareInventoryRequest $request)
    {
        $this->hardwareInventoryService->store($request->validated());

        return redirect()
            ->route('superadmin.hardwareinventory.list') // Change this to your listing route name
            ->with('success', 'Hardware inventory stored successfully.');
    }

}
