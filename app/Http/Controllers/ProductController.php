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

    public function __construct()
    {
      $this->middleware('auth');
    }
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
        Product::updateProductRecipe($product->id, $request);

        Session::flash('callback',[
          "message"     => "Successfully created " . $request->input('product_name'),
          "is_success"  => true,
        ]);

        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        dd($product);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
      #dd($product->recipes);
      $view_data = array(
        "page_title"    => "Edit Product : " . $product->product_name,
        "product"       => $product,
        "action"        => "update",
        "submitBtnTxt"  => "Update",
      );

      return view('products.form',compact('view_data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, Product $product)
    {
        $product->update($request->all());
        $product->recipes()->delete(); /* Delete all previous ingredients */

        Product::updateProductRecipe($product->id, $request);

        Session::flash('callback',[
          'message'     => 'Successfully updated ' . $product->product_name,
          'is_success'  => true,
        ]);

        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
      $product->update(array('status'=> '2'));
      $product->recipes()->delete(); /* Delete all previous ingredients */

      return response()->json([
        'is_success' => true,
        'message'    => "Succesfully removed " . $product->product_name,
      ]);
    }

    public function _showProductList() {
      $products = Product::getAllActiveProduct();
      return view('products.partials._productList', compact('products'));
    }

    public function _showIngredientListSelection($product_id="") {
      $recipes = [];
      $recipe_array = [];
      if($product_id) {
        $recipes = Product::getAllProductRecipes($product_id);
        foreach($recipes as $key=>$value):
          $recipe_array[] = $value->ingredient_id;
        endforeach;
      }

      $data = array(
        'ingredients'     => Ingredient::getAllActiveIngredients(),
        'recipes'         => $recipes,
        'recipe_array'    => $recipe_array,
      );

      return view('products.partials._ingredientListSelection')->with($data);
    }
}
