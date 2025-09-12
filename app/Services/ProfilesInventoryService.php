<?php

namespace App\Services;
use App\Models\ProfilesInventory;
use Illuminate\Support\Facades\DB;

class ProfilesInventoryService
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }
    public function store(array $data): ProfilesInventory
    {
        return DB::transaction(function () use ($data) {
            return ProfilesInventory::create($data);
        });
    }
}
