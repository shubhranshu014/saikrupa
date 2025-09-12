<?php

namespace App\Services;
use App\Models\StockMovement;
use Illuminate\Support\Facades\DB;

class StockMovementService
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }
    public function store(array $data): StockMovement
    {
        return DB::transaction(function () use ($data) {
            return StockMovement::create($data);
        });
    }
}
