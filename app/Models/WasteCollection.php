<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WasteCollection extends Model
{
    protected $fillable = [
        'customer', 'region', 'waste_type', 'method', 'weight', 'date', 'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
