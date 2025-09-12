<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
        'date',
        'lead_sources',
    ];

    public function leadDetails()
{
    return $this->hasMany(LeadDetails::class, 'lead_id');
}
}
