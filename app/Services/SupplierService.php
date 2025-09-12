<?php

namespace App\Services;
use App\Models\Supplier;
use Illuminate\Support\Facades\DB;
use Request;

class SupplierService
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function store(array $data): Supplier
    {
        return DB::transaction(function () use ($data) {
            $supplier = new Supplier();

            $supplier->supplier_id = $data['supplier_id'] ?? null;
            $supplier->supplier_name = $data['supplier_name'] ?? null;
            $supplier->contact_person = $data['contact_person'] ?? null;
            $supplier->phone = $data['phone'] ?? null;
            $supplier->email = $data['email'] ?? null;
            $supplier->address = $data['address'] ?? null;
            $supplier->gst_number = $data['gst_number'] ?? null;
            $supplier->supply_type = $data['supply_type'] ?? null;
            $supplier->bank_account_no = $data['bank_account_no'] ?? null;
            $supplier->ifsc_code = $data['ifsc_code'] ?? null;
            $supplier->status = $data['status'] ?? 'Active';

            $supplier->save();

            return $supplier;
        });
    }

    public function update(Supplier $supplier, Request $request): Supplier
    {
        return DB::transaction(function () use ($supplier, $request) {
            $supplier->supplier_id = $request['supplier_id'] ?? $supplier->supplier_id;
            $supplier->supplier_name = $request['supplier_name'] ?? $supplier->supplier_name;
            $supplier->contact_person = $request['contact_person'] ?? $supplier->contact_person;
            $supplier->phone = $request['phone'] ?? $supplier->phone;
            $supplier->email = $request['email'] ?? $supplier->email;
            $supplier->address = $request['address'] ?? $supplier->address;
            $supplier->gst_number = $request['gst_number'] ?? $supplier->gst_number;
            $supplier->supply_type = $request['supply_type'] ?? $supplier->supply_type;
            $supplier->bank_account_no = $request['bank_account_no'] ?? $supplier->bank_account_no;
            $supplier->ifsc_code = $request['ifsc_code'] ?? $supplier->ifsc_code;
            $supplier->status = $request['status'] ?? $supplier->status;

            $supplier->save();

            return $supplier;
        });
    }

    public function delete(Supplier $id): bool
    {
        return DB::transaction(function () use ($id) {
            return $id->delete();
        });
    }
}
