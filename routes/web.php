<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
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

Route::get('/', [App\Http\Controllers\HomeController::class,'index']);

// Route::get('i',function () {
//     return view('index');
//     });
Route::get('/library/book/{cat}', [App\Http\Controllers\HomeController::class,'show'])->name('library.book');
Route::get('/library/createbook', [App\Http\Controllers\HomeController::class,'category'])->name('library.createbook');
Route::post('/library/book', [App\Http\Controllers\HomeController::class,'store'])->name('book.store');
Auth::routes();

