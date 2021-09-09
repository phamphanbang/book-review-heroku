<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    use HasFactory;

    protected $table = "cart_item";

    public $timestamps = false;

    protected $fillable = [
        'book_id',
        'total_price',
        'quantity',
    ];

    public function cart() {
        return $this->belongsTo(Cart::class,'cart_id');
    }

    public function book() {
        return $this->belongsTo(Book::class,'book_id');
    }

}
