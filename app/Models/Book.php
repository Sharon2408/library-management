<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

protected $fillable = ['title','author','published_year','image','category_id','description'];

    public function book(){
        return $this->belongsTo(Category::class);
    }

    public function getIdAttribute($attribute){
        if (isset($this->getId()[$attribute])) {
            return $this->getId()[$attribute];
        } else {
            return;
        }
    }
    
        public function getId()
        {
            return [
                1 => 'Mystery',
                2 => 'Thriller',
                3 => 'Children',
                4 => 'Adventure',
                5 => 'Fantasy',
                6 => 'Fiction'
            ];
        }
}
