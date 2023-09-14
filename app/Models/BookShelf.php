<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookShelf extends Model
{
    use HasFactory;

    public function bookShelf(){
        $this->belongsTo(User::class);
    }

    protected $fillable = [
        'title',
        'author',
        'published_year',
        'image',
        'category_id',
        'user_id',
        'book_id',
        'description',
        'pdf'
    ];

}
