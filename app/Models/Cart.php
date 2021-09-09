<?php

namespace App\Models;

use App\Enums\CartStatus;
use App\Models\CartItem;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Cart extends Model
{
    use HasFactory;

    protected $table = "cart";

    protected $fillable = [
        'user_id',
        'total_price',
        'first_name',
        'last_name',
        'name_of_card',
        'credit_card_number',
        'lang',
        'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function cartItems()
    {
        return $this->hasMany(CartItem::class, 'cart_id');
    }

    public function getCartID()
    {
        return sprintf('Cart-%03d', $this->id);
    }
}
