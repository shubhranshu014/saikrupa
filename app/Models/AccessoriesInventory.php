<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AccessoriesInventory extends Model
{
    protected $fillable = [
        'item_id',
        'item_name',
        'unit',
        'available_qty',
        'reorder_level',
        'category',
        'supplier_id',
    ];

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }
}
