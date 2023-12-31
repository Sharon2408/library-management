<?php

use App\Http\Controllers\BookShelfController;
use App\Http\Controllers\CategoriesController;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Request;

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

Route::get('/', [CategoriesController::class,'index']);//->middleware('verified');
Route::get('/library/book/{category_id}', [BooksController::class,'index'])->name('library.book');
Route::post('/library/book', [BooksController::class,'store'])->name('book.store');
Route::get('/admin/createbook', [BooksController::class,'createBook'])->name('admin.createbook');
Route::get('/admin/book', [BooksController::class,'getBooksAdmin'])->name('admin.book');//->middleware('can:view,book');
Route::get('/admin/{book}/editbook', [BooksController::class, 'show']);
Route::patch('/admin/{book}', [BooksController::class, 'update']);
Route::delete('/admin/{employee}', [BooksController::class, 'destroy']);
Route::get('/{id}',[BookShelfController::class, 'bookShelf'])->name('shelf.book');
Route::any ( '/search', function () {
    $q = Request::get ( 'q' );
    $searchcategory = Category::where ( 'category_name', 'LIKE', '%' . $q . '%' )->get ();
    if (count ( $searchcategory ) > 0){
        return view ( 'home' )->withDetails ( $searchcategory )->withQuery ( $q );
    }
    else{
        return view ( 'home' )->withMessage ( 'No Matches found' )->withQuery ( $q );
    }
} )->name('search');

Auth::routes([
    'verify' => true
]);

