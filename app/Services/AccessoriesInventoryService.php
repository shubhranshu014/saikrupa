<?php

namespace App\Services;
use App\Models\AccessoriesInventory;
use Illuminate\Support\Facades\DB;

class AccessoriesInventoryService
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }
    public function store(array $data): AccessoriesInventory
    {
        return DB::transaction(function () use ($data) {
            return AccessoriesInventory::create($data);
        });
    }
}
