<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/categorysave', 'CategoryController@store')->name('category.store');
Route::get('/categorylist', 'CategoryController@index')->name('category.index');
Route::get('/categorybyid/{id}', 'CategoryController@edit')->name('category.edit');
Route::post('/categoryupdate/{id}', 'CategoryController@update')->name('category.update');
Route::get('/categorydelete/{id}', 'CategoryController@destroy')->name('category.destroy');

Route::post('/subcategorysave', 'SubCategoryController@store')->name('subcategory.store');
Route::get('/subcategorylist', 'SubCategoryController@index')->name('subcategory.index');
Route::get('/subcategorybyid/{id}', 'SubCategoryController@edit')->name('subcategory.edit');
Route::post('/subcategoryupdate/{id}', 'SubCategoryController@update')->name('subcategory.update');
Route::get('/subcategorydelete/{id}', 'SubCategoryController@destroy')->name('subcategory.destroy');

// router for subCategory by categoryId
Route::get('/getsubcategorybycategoryid/{id}', 'SubCategoryController@getSubCategoryByCategoryId')->name('subcategory.getSubCategoryByCategoryId');

Route::post('/contentsave', 'ContentController@store')->name('content.store');
// Route::get('/subcategorylist', 'SubCategoryController@index')->name('subcategory.index');
// Route::get('/subcategorybyid/{id}', 'SubCategoryController@edit')->name('subcategory.edit');
// Route::post('/subcategoryupdate/{id}', 'SubCategoryController@update')->name('subcategory.update');
// Route::get('/subcategorydelete/{id}', 'SubCategoryController@destroy')->name('subcategory.destroy');
