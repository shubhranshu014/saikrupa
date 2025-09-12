<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HardwareInventory extends Model
{
    protected $fillable = [
        'hardware_id',
        'hardware_name',
        'application',
        'unit',
        'available_qty',
        'reorder_level',
        'brand',
        'supplier_id',
    ];

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }
}
