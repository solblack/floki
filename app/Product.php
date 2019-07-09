<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
  protected $guarded = [];
  use SoftDeletes;

  public function categories(){

    return $this->belongsToMany(Category::class, "product_category", "product_id", "category_id");
 }

 public function productPhotos(){
    return $this->hasMany(ProductPhoto::class, "product_id");
 }

 public function orders(){
    return $this->belongsToMany(Order::class, "order_details", "product_id", "order_id");
}

public function carts(){
    return $this->hasMany(Cart::class, "product_id");
}
}
