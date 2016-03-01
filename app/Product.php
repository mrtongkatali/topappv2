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
}
