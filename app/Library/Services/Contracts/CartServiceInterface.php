<?php
namespace App\Library\Services\Contracts;

Interface CartServiceInterface
{
    public function getCurrentCart($user_id);

    public function storeCartItem($request);

    public function getCurrentCartData();

    public function updateCart($request,$cart_id);

    public function updateCartItem($request,$cart_item_id);

    public function getCart($cart_type);

    public function getLatestCart($user_id);
}