<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StockMovement extends Model
{
    protected $fillable = [
        'movement_id',
        'item_id',
        'movement_type',
        'quantity',
        'reference',
        'date',
        'store_id',
    ];
    public function product()
    {
        return $this->belongsTo(Product::class, 'item_id');
    }
    public function store()
    {
        return $this->belongsTo(Store::class, 'store_id');
    }
}
