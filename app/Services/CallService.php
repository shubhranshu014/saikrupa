<?php

namespace App\Services;

use App\Models\Call;

class CallService
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }
    public function store(array $data): Call
    {
        return Call::create([
            'lead_id' => $data['lead_id'],
            'call_time' => $data['call_time'],
            'notes' => $data['notes'],
        ]);
    }
}
