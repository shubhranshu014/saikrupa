<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;
use App\Http\Requests\StoreProfilesInventoryRequest;
use App\Services\ProfilesInventoryService;

class InventoryController extends Controller
{
    protected $inventoryService;

    public function __construct(ProfilesInventoryService $inventoryService)
    {
        $this->inventoryService = $inventoryService;
    }
    public function profilesinventorylist()
    {
        $inventories = \App\Models\ProfilesInventory::with('supplier')->get();
        // Logic to retrieve and display the inventory list for super admin

        return view('superadmin.profilesinventorylist')->with(compact('inventories'));
    }

    public function createprofilesinventory()
    {
        $suppliers = Supplier::all();
        // Logic to show the form for creating a new inventory item

        return view('superadmin.createprofilesinventory')->with(compact('suppliers'));
    }

    public function storeprofilesinventory(StoreProfilesInventoryRequest $request)
    {
        $this->inventoryService->store($request->validated());

        return redirect()
            ->route('superadmin.profilesinventory.list')
            ->with('success', 'Profile inventory added successfully.');
    }


}
