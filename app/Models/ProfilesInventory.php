<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProfilesInventory extends Model
{
    protected $fillable = [
        'profile_id',
        'profile_name',
        'profile_type',
        'material',
        'color',
        'length_mm',
        'available_bars',
        'supplier_id'
    ];

    public function supplier()
    {
        return $this->belongsTo(\App\Models\Supplier::class);
    }
}
