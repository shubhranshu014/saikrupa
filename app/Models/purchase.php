<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class purchase extends Model
{
    protected $fillable = [
        'purchase_id',
        'supplier_id',
        'purchase_date',
        'items',          // JSON array of items
        'total_amount',
        'status',         // pending | approved | completed/received
    ];

     protected $casts = [
        'items' => 'array', // Automatically decode JSON into an array
    ];

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }

    public function getItemsCountAttribute(): int
    {
        return ($this->items ?? collect())->count();
    }
}
