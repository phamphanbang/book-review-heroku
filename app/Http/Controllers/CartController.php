<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Enums\CartStatus;
use App\Http\Requests\CheckoutCartRequest;
use App\Library\Services\Contracts\CartServiceInterface;

class CartController extends Controller
{
    protected $cartService;

    public function __construct(CartServiceInterface $cartServiceInterface)
    {
        $this->cartService = $cartServiceInterface;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = auth()->user()->id;
        $data["carts"] = Cart::where('user_id',$user_id)->orderBy('created_at', 'desc')->paginate(4);
        return view('users.book.cartList')->with('data',$data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data["current_cart"] = $this->findCart($id);
        $data["cart_item"] = $data["current_cart"]->cartItems()->get();
        return view('users.book.cart')->with('data',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CheckoutCartRequest $request, $cart_id)
    {
        $cart = $this->findCart($cart_id);
        $checkIfSuccess = $this->cartService->updateCart($request,$cart_id);
        if(!$checkIfSuccess) {
            return back()->with('data',$cart)->with('checkoutFailMessage','message.checkoutFail');
        }
        return redirect('home')->with('message',__('message.checkoutSuccess'));
    }

    public function currentCart() {
        $data = $this->cartService->getCurrentCartData();
        return view('users.book.cart')->with('data',$data);
    }

    public function checkout()
    {
        $data = $this->cartService->getCurrentCart(auth()->user()->id);
        return view('users.book.checkout')->with('data',$data);
    }

    public function cancel($id) {
        $data["current_cart"] = $this->findCart($id);
        $data["current_cart"]->status = CartStatus::CANCEL;
        $data["current_cart"]->update();
        $data["cart_item"] = $data["current_cart"]->cartItems()->get();
        return view('users.book.cart')->with('data',$data);
    }

    public function latestCart() {
        $data = $this->cartService->getLatestCart(auth()->user()->id);
        return view('users.book.checkout')->with('data',$data);
    }

    private function findCart($id){
        $cart = Cart::find($id);
        if($cart){
            return $cart;
        }else{
            $errors = 'message.no_cart';
            return back()->withErrors(__($errors));
        }
    }
}
