<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class LeadDetails extends Model
{
    use HasFactory;

    protected $fillable = [
        'lead_id',
        'product_category',
        'width',
        'height',
        'quantity',
        'design',
        'glass_specification',
        'location',
        'square_feet',
        'position',
        'date',
    ];

    public function lead()
    {
        return $this->belongsTo(\App\Models\Lead::class, 'lead_id');
    }
}
