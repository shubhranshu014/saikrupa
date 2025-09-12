<?php

namespace App\Services;
use App\Models\AssignLead;
class AssignLeadService
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function store(array $data): AssignLead
    {
        return AssignLead::create([
            'lead_id' => $data['lead_id'],
            'user_id' => $data['user_id'],
            'assigned_date' => $data['assigned_date'],
        ]);
    }
}
