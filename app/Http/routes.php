<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => 'web'], function () {
    Route::auth();

    Route::get('/', 'HomeController@index');
    Route::get('/home', 'HomeController@index');

    Route::resource('ingredients','IngredientController');
    Route::group(['prefix'=>'ingredients/xhttp/'], function () {
      Route::get('_showIngredientList', [
          'as' => 'xhttp.showIngredientList',
          'uses' => 'IngredientController@_showIngredientList'
      ]);
    });
});

Route::group(['middleware' => 'web'], function () {
    Route::resource('products','ProductController');
    Route::group(['prefix'=>'products/xhttp/'], function () {
      Route::get('_showProductList', [
          'as' => 'xhttp.showProductList',
          'uses' => 'ProductController@_showProductList'
      ]);
      Route::get('_getIngredientListSelection/{product_id?}', [
          'as' => 'xhttp.getIngredientListSelection',
          'uses' => 'ProductController@_showIngredientListSelection'
      ]);
    });
});
