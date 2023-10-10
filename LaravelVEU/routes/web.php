<?php

use App\Http\Controllers\PostItController;
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
/*
Route::get('/', function () {
    return view('postit');
});*/
Route::get('{any}', function () {
    return view('postit');
})->where('any','.*');
Route::get('/edit',function () {
    return view('editar');
})->name('editar');
/*
Route::get('/postit')->name('postit');
Route::post('/postit',[PostItController::class,'store'])->name('postit');*/
