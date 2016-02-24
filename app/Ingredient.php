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

    if($value) {
      $vowels           = array("a", "e", "i", "o", "u", "A", "E", "I", "O", "U", " ","_","-","%","!","@","#","$","`");
      $generated        = str_replace($vowels, "", $value) . str_pad(rand(1,999999),7,0,STR_PAD_LEFT);
      $ingredient_code  = substr(strtoupper(str_pad($generated,11,"X",STR_PAD_RIGHT)),0,11);

      $this->attributes['ingredient_code'] = $ingredient_code;
    }

  }

  public function scopeActive($query)
  {
    return $query->where('status','=',1);
  }

  public function scopeHasStock($query)
  {
    return $query->where('stock_qty', '>=', 0);
  }

  public static function getAllActiveIngredients()
  {
    return self::active()->hasStock()->get();
  }
}
