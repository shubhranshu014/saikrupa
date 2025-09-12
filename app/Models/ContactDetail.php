<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactDetail extends Model
{
    protected $fillable = ['business_contact_id', 'name', 'email', 'phone', 'address'];

    public function businessContact()
    {
        return $this->belongsTo(BusinessContact::class);
    }
}
