<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/',function () {
//    return view('welcome');
//});
//
//Route::get('/hadi', function (){
//    echo ('welcome Hadi');
//});
//
//Route::view('/test','test');

//Route::get('/','TestController@index');

Route::view('test','test');
Route::view('test1','test1');




Route::view('base','base_layout.master_layout');

//Route::group(['prifix'=> 'category'],function(){
//
//    Route::get('create','CategoryController@create');
//    Route::post('store',['as' => 'category.store','uses' => 'CategoryController@store']);
////    Route::get ('index',['as' => 'category.index','uses' => 'CategoryController@index']);
//
//});
Route::get('category/create','CategoryController@create');
Route::post('category/store',['as' => 'category.store','uses' => 'CategoryController@store']);
//  Route::get ('index',['as' => 'category.index','uses' => 'CategoryController@index']);
Route::get('category/index','CategoryController@index')->name('category.index');


//Route::post('category/store','CategoryController@store')->name('category.store');