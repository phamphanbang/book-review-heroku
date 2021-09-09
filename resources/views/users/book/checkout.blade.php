@extends('users.layouts.index')
@section('content')
@include('users.title.header')
<h1>{{__('message.Checkout')}}</h1>
@include('users.title.body')
<li> <span class="ion-ios-arrow-right"></span>{{__('message.Checkout')}}</li>
@include('users.title.footer')
<div class="page-single">
   <div class="container">
      <div class="row ipad-width">
         <div class="col-md-9 col-sm-12 col-xs-12">
            <div class="form-style-1 user-pro" action="#">
               @if(session()->has('checkoutFailMessage'))
               <span class="fail" role="alert">
                  <strong>{{ session()->get('checkoutFailMessage') }}</strong>
               </span>
               @endif
               <form action="{{ url('cart/'.$data->id) }}" method="POST">
                  @csrf
                  @method('PUT')
                  <input type="hidden" name="lang" value="{{ session('language') ?? 'vi' }}">
                  <h4>{{__('message.Checkout')}}</h4>
                  <div class="row">
                     <div class="col-md-6 form-it">
                        <label>{{__('message.Username')}}</label>
                        <input type="text" name="username" readonly value="{{ $data->user->name }}">
                     </div>
                     <div class="col-md-6 form-it">
                        <label>{{__('message.Email_Address')}}</label>
                        <input type="text" name="useremail" readonly value="{{ $data->user->email }}">
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-md-6 form-it">
                        <label>{{__('message.First_Name')}}</label>
                        <input type="text" name="first_name" value="{{ old('first_name')?old('first_name'):$data->first_name }}">
                     </div>
                     <div class="col-md-6 form-it">
                        <label>{{__('message.Last_Name')}}</label>
                        <input type="text" name="last_name" value="{{ old('last_name')?old('last_name'):$data->last_name }}">
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-md-6 form-it">
                        <label>{{__('message.Name_on_Card')}}</label>
                        <input type="text" name="name_of_card" value="{{ old('name_of_card')?old('name_of_card'):$data->name_of_card }}">
                     </div>
                     <div class="col-md-6 form-it">
                        <label>{{__('message.Credit_card_number')}}</label>
                        <input type="password" name="credit_card_number" value="{{ old('credit_card_number')?old('credit_card_number'):$data->credit_card_number }}">
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-md-2">
                        <input type="hidden" name="status" value="pending">
                        <button class="submit" type="submit" placeholder="update">{{__('message.Checkout')}}</button>
                     </div>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
</div>
</div>
</div>
</div>
@endsection