<?php

namespace App\Services;
use App\Models\GlassInventory;
use Illuminate\Support\Facades\DB;

class GlassInventoryService
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }
    public function store(array $data): GlassInventory
    {
        return DB::transaction(function () use ($data) {
            return GlassInventory::create($data);
        });
    }

}
