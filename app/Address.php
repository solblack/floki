<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Address extends Model
{
    use SoftDeletes;
  protected $guarded = [];

  public function user(){
      return $this->belongsTo(User::class, "user_id");
  }

  public function order(){
      return $this->belongsTo(Order::class, "address_id");
  }
}
