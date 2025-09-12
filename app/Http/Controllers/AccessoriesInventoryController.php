<?php

namespace App\Http\Controllers;

use App\Models\AccessoriesInventory;
use Illuminate\Http\Request;

class AccessoriesInventoryController extends Controller
{
    public function accessoriesinventorylist()
    {
        $accessories = AccessoriesInventory::with('supplier')->get();
        // Logic to retrieve and display the accessories inventory list
        return view('superadmin.accessoriesinventorylist')->with(compact('accessories'));
    }

    public function createaccessoriesinventory()
    {
        $suppliers = \App\Models\Supplier::all(); // Fetch all suppliers for the dropdown
        // Logic to show the form for creating a new accessories inventory item
        return view('superadmin.createaccessoriesinventory')->with(compact('suppliers'));
    }

    public function storeaccessoriesinventory(\App\Http\Requests\StoreAccessoriesInventoryRequest $request)
    {
        $service = new \App\Services\AccessoriesInventoryService();
        $service->store($request->validated());

        return redirect()
            ->route('superadmin.accessoriesinventory.list') // Change this to your listing route name
            ->with('success', 'Accessories inventory stored successfully.');
    }

}
