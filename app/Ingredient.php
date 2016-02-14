<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
  protected $fillable = [
      'ingredient_code','ingredient_name', 'description','status',
  ];

  public function setStatusAttribute($value) {
    $this->attributes['status'] = ($value ? $value : 1);
  }

  public function setIngredientCodeAttribute($value) {
    $this->attributes['ingredient_code'] = ($value ? $value : str_random(20));
  }


}
