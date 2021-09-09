@extends('users.layouts.index')
@section('content')
@include('users.title.header')
<h1>{{__('message.CartList')}}</h1>
@include('users.title.body')
<li> <span class="ion-ios-arrow-right"></span> {{__('message.CartList')}}</li>
@include('users.title.footer')
<div class="page-single movie_list">
   <div class="container">
      <div class="row ipad-width2">
         <div class="col-md-8 col-sm-12 col-xs-12">
            @if (session('msg'))
            <div class="alert alert-success">
               {{session('msg')}}
            </div>
            @endif 
            @foreach($data["carts"] as $cart)
            <div class="movie-item-style-2 custom-border">
               <div class="mv-item-infor">
                  <h6><a href="{{ url('cart/'.$cart->id) }}">{{customTime($cart->created_at)}}</a></h6>
                  <p class="run-time" lang="{{ session('language') }}"> {{ __('message.total_price') }}: {{ langCurency(1,$cart->total_price,session('language')) }} {{ langTypeOfCurency(session('language')) }} .  {{ __('message.update_at') }}: {{ langTime($cart->updated_at,session('language')) }}</p>
                  <p class="author"> {{ __('message.status') }} : {{$cart->status}}</p>
               </div>
            </div>
            @endforeach
            <div style="text-align:center">
               {{$data["carts"]->links("pagination::bootstrap-4")}}
            </div>
         </div>
      </div>
   </div>
</div>
@endsection