<?php

namespace App\Library\Services;

use App\Library\Services\Contracts\CartServiceInterface;
use App\Models\Cart;
use App\Enums\CartStatus;
use App\Models\User;
use App\Models\CartItem;
use App\Models\Book;
use Exception;
use Illuminate\Support\Facades\DB;
use stdClass;

class CartService implements CartServiceInterface
{
    public function getCart($cart_type)
    {
        $data = Cart::where('status', $cart_type)->orderBy('created_at', 'desc')->paginate(10);
        return $data;
    }

    public function getCurrentCart($user_id)
    {
        $user = User::find($user_id);
        if (session()->has('cart')) {
            $current_cart = $user->carts()->create();
            $data = $this->getCurrentCartData();
            $total_price = 0;
            DB::beginTransaction();
            try {
                foreach ($data["cart_item"] as $item) {
                    $total_price += $item->quantity * $item->book->price;
                    $current_cart->cartItems()->create([
                        'book_id' => $item->book->id,
                        'quantity' => $item->quantity,
                        'total_price' => $item->quantity * $item->book->price,
                    ]);
                }
                DB::commit();
            } catch (Exception $e) {
                DB::rollBack();
                throw new Exception($e->getMessage());
            }
            $current_cart->update(['total_price' => $total_price]);
            session()->forget('cart');
            return $current_cart;
        }
        $current_cart = Cart::where('status', CartStatus::SHOPPING)
            ->where('user_id', $user_id)
            ->orderBy('created_at', 'desc')->first();
        return $current_cart;
    }

    public function storeCartItem($request)
    {
        $book = Book::find($request->book_id);
        if ($book->quantity == 0) {
            return __('message.outOfStock');
        }
        $cartItem = new stdClass();
        $cartItem->book = $book;
        $cartItem->quantity = 1;
        $cart = session('cart') ? session('cart') : [];
        if (!$cart) {
            $cart[] = $cartItem;
            session(['cart' => $cart]);
            return __('message.addCartItemSuccess');
        }
        foreach ($cart as $item) {
            if ($item->book->id == $book->id) {
                if ($item->quantity == $book->quantity) {
                    return __('message.outOfStock');
                }
                $item->quantity++;
                session(['cart' => $cart]);
                return __('message.addCartItemSuccess');
            }
        }
        $cart[] = $cartItem;
        session(['cart' => $cart]);
        return __('message.addCartItemSuccess');
    }

    public function getCurrentCartData()
    {
        $data["current_cart"] = null;
        $data["cart_item"] = session('cart') ? session('cart') : [];
        return $data;
    }

    public function updateCart($request, $cart_id)
    {
        $cart = Cart::find($cart_id);
        $cart_items = $cart->cartItems()->get();
        if ($request->user()->role == 'admin') {
            DB::beginTransaction();
            try {
                foreach ($cart_items as $item) {
                    $book = Book::find($item->book_id);
                    $book->update(['quantity' => $book->quantity - $item->quantity]);
                }
                DB::commit();
            } catch (Exception $e) {
                DB::rollBack();
                throw new Exception($e->getMessage());
            }
        }
        $data = $request->all();
        $checkIfSuccess = $cart->update($data);
        return $checkIfSuccess;
    }

    public function updateCartItem($request, $cart_item_id)
    {
        $data = $request->all();
        $cart = session('cart');
        foreach ($cart as $item) {
            if ($item->book->id == $cart_item_id) {
                $item->quantity = $data["quantity"];
            }
        }
        session(['cart' => $cart]);
        return __('message.addCartItemSuccess');
    }

    public function getLatestCart($user_id)
    {
        $user = User::find($user_id);
        $current_cart = $user->carts()->latest('created_at')->first();
        return $current_cart;
    }
}
