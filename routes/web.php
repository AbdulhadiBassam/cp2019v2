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

Route::group(['prefix'=> 'category'],function() {

    Route::get('create', 'CategoryController@create');
    Route::post('store', ['as' => 'category.store', 'uses' => 'CategoryController@store']);
    Route::get('index', ['as' => 'category.index', 'uses' => 'CategoryController@index']);
    Route::get('edit/{id}', 'CategoryController@edit')->name('category.edit');
    Route::PUT('update/{id}', 'CategoryController@update')->name('category.update');
    Route::get('destroy/{id?}', 'CategoryController@destroy')->name('category.destroy');

});

//Route::get('category/create','CategoryController@create');
//Route::post('category/store',['as' => 'category.store','uses' => 'CategoryController@store']);
//Route::post('category/store','CategoryController@store')->name('category.store');

//  Route::get ('index',['as' => 'category.index','uses' => 'CategoryController@index']);
//Route::get('category/index','CategoryController@index')->name('category.index');
//Route::get('category/edit/{id}','CategoryController@edit')->name('category.edit');
//Route::PUT('category/update/{id}','CategoryController@update')->name('category.update');
//Route::get('category/destroy/{id?}','CategoryController@destroy')->name('category.destroy');

//Route::get('category/edit/{id}',['as' => 'category.edit','uses' => 'CategoryController@edit']);
//Route::post('category/store','CategoryController@store')->name('category.store');
