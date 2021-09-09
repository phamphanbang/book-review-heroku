<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{
    use HasFactory;
    protected $table = "follow";
    public $timestamps = false;
    protected $fillable = [
        'follow_id',
        'user_id',
    ];

    public function follow() {
        return $this->belongsTo(User::class,'user_id');
    }

    public function beFollowed() {
        return $this->belongsTo(User::class,'follow_id');
    }

    public function scopeFollowUser($query,$userId,$followId){
        return $query->where([['user_id','=',$userId],['follow_id','=',$followId]]);
    }
}
