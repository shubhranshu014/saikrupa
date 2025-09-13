<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class purchase extends Model
{
    protected $fillable = [
        'purchase_id',
        'purchase_date',
        'items',          // JSON array of items
        'status',         // pending | approved | completed/received
    ];

     protected $casts = [
        'items' => 'array', // Automatically decode JSON into an array
    ];

    public function getItemsCountAttribute(): int
    {
        return ($this->items ?? collect())->count();
    }
}
