@component('mail::message')
# {{ __('email.YOUR REQUEST HAS BEEN ACCEPTED',[],$cart->lang) }}

@component('mail::panel')
{{ __('email.Hello',[],$cart->lang) }} {{ $cart->user->name }},<br>
{{ __('email.Content',['time' => langTime($cart->created_at,$cart->lang)],$cart->lang) }}.
@endcomponent

@component('mail::table')
|{{ __('email.Book',[],$cart->lang) }}|{{ __('email.Quantity',[],$cart->lang) }}|{{ __('email.Price',[],$cart->lang) }}|{{ __('email.Total Price',[],$cart->lang) }}|
| ------------- |:-------------:| :--------:| :--------:|
@foreach ($cart->cartItems as $item)
| {{ $item->book->title }}|{{ $item->quantity }}|{{ langCurency(1,$item->book->price,$cart->lang) }}|{{ langCurency(1,$item->total_price,$cart->lang) }}|
@endforeach
@endcomponent

{{ __('email.Cart Total',[],$cart->lang) }} {{ langCurency(1,$cart->total_price,$cart->lang) }} {{ langTypeOfCurency($cart->lang) }}

{{ __('email.Thank you for shopping',[],$cart->lang) }},<br>
Rikai Book Review 
@endcomponent
