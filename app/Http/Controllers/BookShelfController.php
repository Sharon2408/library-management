<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\BookShelf;
use Illuminate\Http\Request;

class BookShelfController extends Controller
{
    public function bookShelf($id)
    {
        $bookData = Book::where('id', $id)->get();
        //dd($bookData);
        // $userid = auth()->user()->id;
        // $bookShelf = BookShelf::create([
        //      'book_id' => $bookData['id'],
        //     'title' => $bookData['title'],
        //     'author' => $bookData['author'],
        //     'published_year' => $bookData['published_year'],
        //     'image' => $bookData['image'],
        //     'category_id' => $bookData['category_id'],
        //     "user_id" => $userid,
        //     'description' => $bookData['description'],
        //     'pdf' => $bookData['pdf'],
        // ]);
        //return redirect('library/book/'.$bookData['category_id']);
    }
}