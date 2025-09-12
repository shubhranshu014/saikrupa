<?php

namespace App\Services;
use App\Models\LeadDetails;
class LeadProductService
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function store(array $data): LeadDetails
    {
        return LeadDetails::create($data);
    }
}
