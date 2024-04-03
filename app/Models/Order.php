<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public function users() {
        return $this->belongsTo(User::class);
    }

    public function zones() {
        return $this->belongsTo(Zone::class);
    }

    public function orderDetails() {
        return $this->belongsToMany(OrderDetail::class);
    }

}
