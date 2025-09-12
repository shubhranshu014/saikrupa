<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Discussion extends Model
{
    use HasFactory;

    protected $fillable = [
        'lead_id',
        'date',
        'discussion',
    ];

    public function lead()
    {
        return $this->belongsTo(Lead::class);
    }
}
