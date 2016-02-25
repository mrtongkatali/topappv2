<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ProductRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
      return [
          'product_name'  => 'required|max:255|min:3',
          'sku'           => 'required|max:255|min:3',
          'base_price'    => array('Regex:/^(?=.+)(?:[1-9]\d*|0)?(?:\.\d+)?$/','required','numeric',),
      ];
    }
}
