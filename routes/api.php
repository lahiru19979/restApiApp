<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\productcontroller;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/productslist',[productcontroller::class,'productslist']);
Route::post('/storeproducts',[productcontroller::class,'storeproducts'])->name('storeproducts');
Route::get('/searchproducts/{id}',[productcontroller::class,'searchproducts'])->name('searchproducts');
Route::put('/updateproducts/{id}',[productcontroller::class,'updateproducts'])->name('updateproducts');
Route::DELETE('/deleteproducts/{id}',[productcontroller::class,'deleteproducts'])->name('deleteproducts');
Route::get('/searchproductsname/{name}',[productcontroller::class,'searchproductsname'])->name('searchproductsname');
