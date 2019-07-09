<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shipping extends Model
{
    protected $guarded = [];

    public function order(){
        return $this->belongsTo(Order::class, "shipping_id");
    }
}
