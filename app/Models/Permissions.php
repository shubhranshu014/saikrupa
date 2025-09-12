<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permissions extends Model
{
    protected $fillable = ['user_id', 'menus'];
    protected $casts = [
        'menus' => 'array', // convert JSON to array automatically
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
