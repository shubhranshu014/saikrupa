<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $fillable = [
        'supplier_id',
        'supplier_name',
        'contact_person',
        'phone',
        'email',
        'address',
        'gst_number',
        'supply_type',
        'bank_account_no',
        'ifsc_code',
        'notes',
        'status',
    ];
}
