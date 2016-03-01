<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use \Auth;
use \Session;
use App\Http\Requests\ProductRequest;

use App\Product;
use App\Recipe;
use App\Ingredient;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $callback = [];
      if(session()->has('callback')) {
        $callback =  Session::get('callback');
      }
      return view('products.index', compact('callback'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function create()
     {
         $view_data = array(
           "page_title"    => "Create New Product",
           "action"        => "post",
           "submitBtnTxt"  => "Create",
         );

         return view('products.form',compact('view_data'));
     }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        $product =  Auth::user()->products()->create($request->all());

        if($request->input('cb')) {
          foreach($request->input('cb') as $key=>$value):
            $array = array(
              "ingredient_id" => $value,
              "product_id"    => $product->id,
            );
            $recipe = Recipe::create($array);
            print_r($recipe);
          endforeach;
        }

        Session::flash('callback',[
          "message"     => "Successfully created " . $request->input('product_name'),
          "is_success"  => true,
        ]);

        //return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function _showIngredientListSelection() {
      $ingredients = Ingredient::getAllActiveIngredients();
      return view('products.partials._ingredientListSelection', compact('ingredients'));
    }
}
