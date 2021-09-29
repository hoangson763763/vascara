<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::post('/login','api\LoginController@store');
Route::get('/user','api\LoginController@infoUser');
Route::get('/register','api\LoginController@register');
Route::get('/product/show','api\ProductController@show');
Route::get('/category/show','api\CategoryController@show');
Route::get('/parent-category/show','api\ParentCategoryController@show');
Route::post('/parent-category/post','api\ParentCategoryController@store');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
