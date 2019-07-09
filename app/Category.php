<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
  protected $guarded = [];
  use SoftDeletes;

  public function products(){
      return $this->belongsToMany(Product::class, "product_category", "category_id", "product_id");
  }
}
