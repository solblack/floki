<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductPhoto extends Model
{
    protected $guarded = [];
    use SoftDeletes;

    public function product(){
        return $this->belongsTo(Product::class, "product_id");
    }
}
