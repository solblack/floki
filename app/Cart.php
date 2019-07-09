<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cart extends Model
{
    p protected $guarded = [];
    use SoftDeletes;

    public function user(){
        return $this->belongsTo(User::class, "user_id");
    }

    public function product(){
        return $this->belongsTo(Product::class, "product_id");
    }
}
