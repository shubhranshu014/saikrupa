<?php

namespace App\Services;
use App\Models\HardwareInventory;
use Illuminate\Support\Facades\DB;

class HardwareInventoryService
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function store(array $data): HardwareInventory
    {
        return DB::transaction(function () use ($data) {
            return HardwareInventory::create($data);
        });
    }
}
