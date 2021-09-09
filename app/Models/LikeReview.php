<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use User;
use Review;

class LikeReview extends Model
{
    use HasFactory;
    protected $table = "like_review";
    public $timestamps = false;
    protected $fillable = [
        'like', 
        'review_id',
        'user_id',
    ];

    public function user() {
        return $this->belongsTo(User::class,'user_id');
    }

    public function review() {
        return $this->belongsTo(Review::class,'review_id');
    }
}
