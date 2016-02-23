<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use \Auth;
use \Session;
use App\Http\Requests\IngredientRequest;

use App\Ingredient;


class IngredientController extends Controller
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

        $ingredients = Ingredient::getAllActiveIngredients();
        return view('ingredients.index', compact('ingredients','callback'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $view_data = array(
          "ingredient"    => [],
          "page_title"    => "Create New Ingredient",
          "action"        => "post",
          "submitBtnTxt"  => "Create",
        );

        return view('ingredients.form',compact('view_data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(IngredientRequest $request)
    {
        $request->merge(array('ingredient_code' => $request->input('ingredient_name')));

        Auth::user()->ingredients()->create($request->all());

        Session::flash('callback',[
          "message"     => "Successfully created " . $request->input('ingredient_name'),
          "is_success"  => true,
        ]);

        return redirect()->route('ingredients.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  Ingredient  $ingredient
     * @return \Illuminate\Http\Response
     */
    public function show(Ingredient $ingredient)
    {
        dd($ingredient);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Ingredient  $ingredient
     * @return \Illuminate\Http\Response
     */
    public function edit(Ingredient $ingredient)
    {
        $view_data = array(
          "page_title"    => "Edit Ingredient - " . $ingredient->ingredient_name . " ({$ingredient->ingredient_code})",
          "ingredient"    => $ingredient,
          "action"        => "update",
          "submitBtnTxt"  => "Update",
        );
        return view('ingredients.form', compact('view_data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Ingredient $ingredient
     * @return \Illuminate\Http\Response
     */
    public function update(IngredientRequest $request, Ingredient $ingredient)
    {
        $request->merge(array('ingredient_code' => ""));
        $ingredient->update($request->all());

        Session::flash('callback',[
          "message"     => "Successfully updated " . $ingredient->ingredient_name,
          "is_success"  => true,
        ]);

        return redirect()->route('ingredients.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Ingredient $ingredient
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ingredient $ingredient)
    {
        //
    }
}
