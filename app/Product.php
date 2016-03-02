<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'product_name','sku', 'description','base_price','status',
    ];

    public function setStatusAttribute($value) {
      $this->attributes['status'] = ($value ? $value : 1);
    }

    public function scopeActive($query)
    {
      return $query->where('status','=',1);
    }

    public static function getAllActiveProduct()
    {
      return self::active()->get();
    }

    public function recipes()
    {
      return $this->hasMany('App\Recipe');
    }

    public static function getAllProductRecipes($id)
    {
      return self::find($id)->recipes()->get();
    }

    public static function updateProductRecipe($product_id, $request) {
      if($request->input('cb')) {
        foreach($request->input('cb') as $key=>$value):
          $array = array(
            "ingredient_id" => $value,
            "product_id"    => $product_id,
            "qty"           => $request->input('qty_'.$value),
          );
          $recipe = Recipe::create($array);
        endforeach;
      }
    }
}
