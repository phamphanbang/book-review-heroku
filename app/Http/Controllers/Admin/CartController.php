<?php

namespace App\Http\Controllers\Admin;

use App\Enums\CartStatus;
use App\Http\Controllers\Controller;
use App\Models\Cart;
use Illuminate\Http\Request;
use App\Library\Services\Contracts\CartServiceInterface;
use App\Mail\RequestAccepted;
use App\Jobs\SendEmailJob;


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
        $data["carts"] = $this->cartService->getCart(CartStatus::PENDING);
        $data["type"] = CartStatus::PENDING;
        return view('admin.cart.list')->with('data', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data["cart"] = $this->findCart($id);
        if (isset($data["cart"]["errors"])) {
            return redirect()->route('homeadmin.index')->withErrors(__($data["cart"]["errors"]));
        }
        return view('admin.cart.detail')->with('data', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $cart_id)
    {
        $cart = $this->findCart($cart_id);
        if (isset($cart["errors"])) {
            return redirect()->route('homeadmin.index')->withErrors(__($cart["errors"]));
        }
        $checkIfSuccess = $this->cartService->updateCart($request, $cart_id);
        if (!$checkIfSuccess) {
            return back()->with('data', $cart)->with('checkoutFailMessage', 'message.checkoutFail');
        }
        dispatch(new SendEmailJob($cart));
        return back()->with('data', $cart)->with('requestResolve', __('message.requestResolve'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cart = $this->findCart($id);
        if (isset($cart["errors"])) {
            $data["carts"] = $this->cartService->getCart(CartStatus::PENDING);
            return back()->with('data', $data)->withErrors(__($cart["errors"]));
        }
        $cart_type = $cart->status;
        $cart->delete();
        $data["carts"] = $this->cartService->getCart($cart_type);
        return back()->with('data', $data);
    }

    public function cartType($cart_type)
    {
        $data["carts"] = $this->cartService->getCart($cart_type);
        $data["type"] = $cart_type;
        return view('admin.cart.list')->with('data', $data);
    }

    private function findCart($id)
    {
        $cart = Cart::find($id);
        if ($cart) {
            return $cart;
        } else {
            $cart["errors"] = 'message.no_cart';
            return $cart;
        }
    }
}
