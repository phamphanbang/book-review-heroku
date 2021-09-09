@extends('users.layouts.index')
@section('content')
@include('users.title.header')
<h1>{{__('message.Profile',['name' => $data['user']->name])}}</h1>
@include('users.title.body')
<li> <span class="ion-ios-arrow-right"></span>{{__('message.Profile',['name' => $data['user']->name])}}</li>
@include('users.title.footer')
<div class="page-single">
   <div class="container">
      <div class="row ipad-width">
         <div class="col-md-3 col-sm-12 col-xs-12">
            <div class="user-information">
               <form method="POST" action="{{ route('change.image') }}" enctype="multipart/form-data" class="user-img">
                  @csrf
                  @method('PUT')
                  <label for="image">
                     <img id="output"
                        src="{{ imgSrc($data["user"]->image) }}"
                        alt="" class="output_image">
                     <br>
                  </label>
                  @if(session()->has('imgChangeSuccess'))
                  <span class="success" role="alert">
                     <strong>{{ session()->get('imgChangeSuccess') }}</strong>
                  </span>
                  @endif
                  @if(session()->has('imageError'))
                  <span class="fail" role="alert">
                     <strong>{{ session()->get('imageError') }}</strong>
                  </span>
                  @endif
                  @if (auth()->user()->id == $data["user"]->id)
                  <input type="file" id="image" name="image" class="display_none">    
                  <input type="submit" class="redbtn border_none"  value="{{__('message.Change_avatar')}}">
                  @endif
               </form>
               <div class="user-fav">
                  <p>{{__('message.Account_Details')}}</p>
                  <ul>
                     <li class="active"><a
                           href="{{route('profile.show',[$data["user"]->id])}}">{{__('message.Profile',['name' => $data['user']->name])}}</a></li>
                     <li><a href="{{ route('profile.favorite',[$data["user"]->id]) }}">{{__('message.Favorite_Book')}}</a></li>
                     <li><a href="{{ route('profile.timeline',[$data["user"]->id]) }}">{{__('message.TimeLine_History')}}</a></li>
                  </ul>
               </div>
               @if (auth()->user()->id == $data["user"]->id)
               <div class="user-fav">
                  <p>{{__('message.Others')}}</p>
                  <ul>
                     <li><a href="#">{{__('message.Change_password')}}</a></li>
                     <li><a href="{{route('logout')}}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">{{__('message.Log_out')}}</a></li>
                     <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                     </form>
                  </ul>
               </div>
               @endif
            </div>
         </div>
         <div class="col-md-9 col-sm-12 col-xs-12">
            <div class="form-style-1 user-pro" action="#">
               <form action="{{ url('profile/'.$data["user"]->id) }}" method="POST" class="user">
                  @csrf
                  @method('PUT')
                  <h4>01. {{__('message.Profile_details')}}</h4>
                  @if(session()->has('profileChangeSuccess'))
                  <span class="success" role="alert">
                     <strong>{{ session()->get('profileChangeSuccess') }}</strong>
                  </span>
                  @endif
                  <div class="row">
                     <div class="col-md-6 form-it">
                        <label>{{__('message.Username')}}</label>
                        <input type="hidden" name="old_name" value="{{ $data["user"]->name }}">
                        <input type="text" name="name" placeholder="edwardkennedy" value="{{ $data["user"]->name }}" {{ auth()->user()->id != $data["user"]->id ? 'readonly':'' }}>
                        @error('name')
                        <span class="fail" role="alert">
                           <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                     </div>
                     <div class="col-md-6 form-it">
                        <label>{{__('message.Email_Address')}}</label>
                        <input type="hidden" name="old_email" value="{{ $data["user"]->email }}" >
                        <input type="email" name="email" placeholder="edward@kennedy.com"
                           value="{{ $data["user"]->email }}" {{ auth()->user()->id != $data["user"]->id ? 'readonly':'' }}>
                        @error('email')
                        <span class="fail" role="alert">
                           <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-md-2">
                        <input class="submit {{ auth()->user()->id != $data["user"]->id ? 'display_none':'' }}" type="submit" value="{{__('message.save')}}">
                     </div>
                  </div>
               </form>
               @if (auth()->user()->id == $data["user"]->id)
               <form action="{{ route('change.password') }}" method="POST" class="password">
                  @csrf
                  @method('PUT')
                  <h4>02. {{__('message.Change_password')}}</h4>
                  @if(session()->has('error'))
                  <span class="fail" role="alert">
                     <strong>{{ session()->get('error') }}</strong>
                  </span>
                  @endif
                  @if(session()->has('success'))
                  <span class="success" role="alert">
                     <strong>{{ session()->get('success') }}</strong>
                  </span>
                  @endif
                  <div class="row">
                     <div class="col-md-6 form-it">
                        <label>{{__('message.Old_Password')}}</label>
                        <input type="password" name="current_password" placeholder="**********">
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-md-6 form-it">
                        <label>{{__('message.New_Password')}}</label>
                        <input type="password" name="password" placeholder="***************">
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-md-6 form-it">
                        <label>{{__('message.Confirm_New_Password')}}</label>
                        <input type="password" name="password_confirmation" placeholder="*************** ">
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-md-2">
                        <input class="submit" type="submit" value="{{__('message.change')}}">
                     </div>
                  </div>
               </form>                   
               @endif
            </div>
         </div>
      </div>
   </div>
</div>
@endsection
