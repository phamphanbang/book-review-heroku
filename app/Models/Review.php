<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\LikeReview;

class Review extends Model
{
    use HasFactory;
    protected $table = "review";
    protected $fillable = [
        'title', 
        'body',
        'book_id',
        'user_id',
        'rate',
        'created_at',
        'update_at',
        'status',
    ];

    public function user() {
        return $this->belongsTo(User::class,'user_id');
    }

    public function book() {
        return $this->belongsTo(Book::class,'book_id');
    }

    public function comments() {
        return $this->hasMany(Comment::class,'review_id');
    }

    public function likeReviews() {
        return $this->hasMany(LikeReview::class,'review_id');
    }
}
