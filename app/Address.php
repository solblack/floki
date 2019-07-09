<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
  protected $guarded = [];

  public function user(){
      return $this->belongsTo(User::class, "user_id");
  }

  public function order(){
      return $this->belongsTo(Order::class, "address_id");
  }
}
