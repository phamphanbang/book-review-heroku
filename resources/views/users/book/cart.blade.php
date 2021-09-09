@extends('users.layouts.index')
@section('content')
@include('users.title.header')
<h1> {{__('message.Cart')}}</h1>
@include('users.title.body')
<li> <span class="ion-ios-arrow-right"></span> {{__('message.Cart')}}</li>
@include('users.title.footer')
<div class="page-single movie_list">
   <div class="container">
      <div class="row ipad-width2">
         <div class="col-md-12 col-sm-12 col-xs-12">
            <table>
               <tr>
                  <th class="book">{{__('message.Books')}}</th>
                  <th class="quantity">{{__('message.Quantity')}}</th>
                  <th class="subtotal">{{__('message.Subtotal')}} / {{ langTypeOfCurency(session('language')) }}</th>
               </tr>
               @if (!empty($data["cart_item"]))
               @foreach ($data["cart_item"] as $key=>$item)
               <tr>
                  <td class="col-md-8 col-sm-12 col-xs-12">
                     <div class="book-info">
                        <img src="images/uploads/mv1.jpg" alt="">
                        <div class="mv-item-infor">
                           <h6><a href="{{ url('book/'.$item->book->id) }}">{{ $item->book->title }}</a></h6>
                           <p class="rate"><i class="ion-android-star"></i><span>{{ $item->book->rate }}</span> /10</p>
                           <p class="describe">Earth's mightiest heroes must come together and learn to fight as a team
                              if they are to stop the mischievous Loki and his alien army from enslaving humanity...</p>
                           <p>{{__('message.Author')}}: <a href="#">{{ $item->book->author }}</a></p>
                        </div>
                        <br>
                        @if ($data["current_cart"])
                        @if ($data["current_cart"]->status == "shopping")
                        <form action="{{ url('cartItem/'.$key) }}" method="post">
                           @csrf
                           @method('DELETE')
                           <input type="submit" class="remove-cart" value="{{__('message.Remove')}}" />
                        </form>
                        @endif
                        @endif
                     </div>
                  </td>
                  <td>
                     <input type="number" min="1" max="{{ $item->book->quantity }}" class="cart-item-input" lang="{{ session('language') }}"
                        cartItemId="{{ $item->book->id }}" cartPrice="{{ $item->book->price }}" value="{{ $item->quantity }}"
                        @if ($data["current_cart"])
                        {{ $data["current_cart"]->status != "shopping" ? "readonly" : "" }}
                        @endif>
                  </td>
                  <td class="unit-total">{{ langCurency($item->quantity,$item->book->price,session('language')) }}</td>
               </tr>
               @endforeach
               @endif
            </table>
         </div>
         <div class="total-price total-price-disable">
            <table class="custom_table">
               <tr>
                  <td><b>{{__('message.Total')}}</b></td>
                  <td id="sum" lang="{{ session('language') ?? 'vi' }}"></td>
               </tr>
               <tr>
                  <td colspan="2" class="checkoutbtn" style="text-align:center">
                     {!! customCheckout($data["current_cart"]) !!}
                  </td>
               </tr>
            </table>
         </div>
      </div>
   </div>
</div>
@endsection

