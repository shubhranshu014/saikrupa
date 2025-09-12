<?php

namespace App\Services;
use App\Models\Store;


class StoreService
{
    /**
     * Create a new class instance.
     */
    
    public function createStore(array $data): Store
    {
        return Store::create([
            'name' => $data['name'],
            'location' => $data['location'] ?? null,
            'contact_number' => $data['contact_number'] ?? null,
            'store_code' => $data['store_code'],
        ]);
    }
}
