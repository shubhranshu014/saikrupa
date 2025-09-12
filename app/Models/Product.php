<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'product_name',
        'category',
        'dimensions',
        'selling_price',
        'cost_price',
        'quantity',
    ];
}
