<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
class CategoriesController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::all();
        $query = '';
        return view('/home', compact('categories','query'));
        
    }
}
