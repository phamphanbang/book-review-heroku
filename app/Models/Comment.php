<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\LikeComment;

class Comment extends Model
{
    use HasFactory;
    protected $table = "comment";

    protected $fillable = [
        'body',
        'review_id',
        'user_id',
        'created_at',
        'update_at',
        'status',
    ];


    public function user() {
        return $this->belongsTo(User::class,'user_id');
    }

    public function review() {
        return $this->belongsTo(Review::class,'review_id');
    }

    public function likeComments() {
        return $this->hasMany(LikeComment::class,'comment_id');
    }
}
