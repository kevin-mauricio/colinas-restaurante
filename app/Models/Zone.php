<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Zone extends Model
{
    use HasFactory;

    protected $fillable = [
        'zone_name',
        'price_delivery'
    ];

    public function orders() {
        return $this->hasMany(Order::class);
    }
}
