<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Book;
use App\Models\Category;

class Book_Category extends Model
{
    use HasFactory;
    protected $table = "book_category";
    public $timestamps = false;
    protected $fillable = [
        'book_id',
        'category_id',
    ];

    public function books() {
        return $this->belongsTo(Book::class,'book_id');
    }

    public function categorys() {
        return $this->belongsTo(Category::class,'category_id');
    }

}
