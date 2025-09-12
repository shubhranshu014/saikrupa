<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GlassInventory extends Model
{
    protected $fillable = [
        'glass_id',
        'glass_type',
        'thickness_mm',
        'width_mm',
        'height_mm',
        'available_sheets',
        'supplier_id',
    ];

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }
}
