<?php

namespace App\Services;
use App\Models\Lead;
class LeadService
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }
    public function store(array $data): Lead
    {
        return Lead::create($data);
    }
}
