<?php

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Product;


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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/product',function(){
    return Product::all();
});


Route::get('/category',function(){
    return Category::orderBy('name','ASC')->get();
});

Route::get('/product-cat/{id}',function($id){
    return Product::where('category_id',$id)-> orderBy('id','DESC')->limit(4)->get();
});
