<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
  protected $fillable = [
      'ingredient_id','product_id','qty',
  ];
}
