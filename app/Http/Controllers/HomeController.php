<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;
use PharIo\Manifest\Library;
use Intervention\Image\Facades\Image;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    
     // Category Display on Home View
    public function index()
    {
        $categories = Category::all();
        return view('/home',compact('categories'));
    }

    // Routing view Category wise
    public function show($cat){
        $books = Book::where('category_id',$cat)->get();
        return view('library.book', compact('books'));
    }

public function category(){
    $books = new Book();
    $category = Category::all();
    return view('library.createbook', compact('category','books'));
}

    public function store(Request $request){
        $data=request()->validate([
            'title' => 'required|string',
            'author' => 'required',
            'published_year' => 'required',
            'description' => 'required',
            'category_id' => 'required',
            'image' =>'sometimes|file|image|max:10000', 
            ]);
            if ($request->hasFile('image')) {
                $data['image'] = $request->file('image')->store('book_images', 'public');
            }
            $book = Book::create($data);
        return redirect('library.book');
    }
}
