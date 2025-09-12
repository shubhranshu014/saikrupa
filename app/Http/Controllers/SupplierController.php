<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;
use App\Http\Requests\StoreSupplierRequest;
use App\Services\SupplierService;

class SupplierController extends Controller
{
    protected $supplierService;

    public function __construct(SupplierService $supplierService)
    {
        $this->supplierService = $supplierService;
    }
    public function supplierslist()
    {
        $suppliers = Supplier::all();
        // Logic to retrieve and display the suppliers list for super admin

        return view('superadmin.supplierslist')->with(compact("suppliers"));
    }

    public function createsupplier()
    {
        // Logic to show the form for creating a new supplier

        return view('superadmin.createsupplier');
    }

    public function storesupplier(StoreSupplierRequest $request, SupplierService $supplierService)
    {
        // Logic to store the new supplier data
        $supplierService->store($request->validated());
        // Redirect or return response after storing
        return redirect()->route('superadmin.supplierslist')->with('success', 'Supplier added successfully!');
    }

    public function edit(Supplier $supplier)
    {
        return view('superadmin.suppliersedit', compact('supplier'));
    }

    public function update(StoreSupplierRequest $request, Supplier $supplier)
    {
        $this->supplierService->update($supplier, $request->validated());
        return redirect()->route('superadmin.supplierslist')->with('success', 'Supplier updated successfully.');
    }

    public function destroy(Supplier $id)
    {
        $this->supplierService->delete($id);
        return redirect()->route('superadmin.supplierslist')->with('success', 'Supplier deleted successfully.');
    }

}
