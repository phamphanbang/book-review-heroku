<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Library\Services\Contracts\CartServiceInterface;
use App\Models\CartItem;
use App\Models\Cart;
use App\Models\Book;
use stdClass;

class CartItemController extends Controller
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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $message = $this->cartService->storeCartItem($request);
        return response()->json(['message' => $message]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $cart_item_id)
    {
        $message = $this->cartService->updateCartItem($request,$cart_item_id);
        return response()->json(['message' => $message]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $old_cart = $this->cartService->getCurrentCartData();
        $cart = [];
        $index = 0;
        foreach ($old_cart["cart_item"] as $key => $item) {
            if($key != $id ) {
                $cart[$index] = $item;
                $index ++;
            }
        }
        session(['cart' => $cart]);
        $data["current_cart"] = null;
        $data["cart_item"] = $cart;
        return back()->with('data',$data);
    }
}
