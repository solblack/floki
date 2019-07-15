<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
  protected $guarded = [];
  use SoftDeletes;
  public function user(){
      return $this->belongsTo(User::class, "user_id");
  }

  public function orderStatuses(){
      return $this->hasMany(OrderStatus::class, "order_status_id");
  }

  public function address(){
      return $this->belongsTo(Address::class, "address_id");
  }

  public function shipping(){
      return $this->belongsTo(Shipping::class, "shipping_id");
  }

  public function products(){
    return $this->belongsToMany(Product::class, "order_details", "order_id", "product_id");
}

public function orderDetails(){
    return $this->hasMany(OrderDetail::class, "order_id");
}
}
