@extends('users.layouts.index')
@section('content')
@include('users.title.header')
@include('users.title.body')
<li> <span class="ion-ios-arrow-right"></span>{{__('message.Favorite_Book')}}</li>
@include('users.title.footer')
<!-- celebrity list section-->
<div class="page-single">
   <div class="container">
      <div class="row ipad-width2">
         <div class="col-md-9 col-sm-12 col-xs-12">
            <div class="topbar-filter">
               <p class="pad-change">{{__('message.Found')}} <span>{{$count}} {{__('message.Users')}}</span></p>
            </div>
            <div class="row">
               @foreach($users as $user)
               <div class="col-md-12">
                  <div class="user-item-container">
                     <img src="{{asset('/upload/user/'.$user->image)}}" class="output_imageprofile" alt="">
                     <div class="right-half">
                        <h2><a href="{{ url('profile/'.$user->id) }}">{{ $user->name }}</a></h2>
                        <span>Email: {{$user->email}}</span>
                        <h3><a href="{{route('profile.favorite',[$user->id])}}">{{__('message.Favorite_Book')}}</a>
                        </h3>
                     </div>
                     <div class="left-half">
                        @if(!Auth::guest() && (Auth::user()->id != $user->id ))
                        <ul class="nav nav-pills">
                           <li role="presentation">
                              <a href="{{route('follow',[$user->id,Auth::user()->id])}}" class="follow">
                                 {{follow($user)}}
                              </a>
                           </li>
                           <li role="presentation">
                              <a href="{{route('unfollow',[$user->id,Auth::user()->id])}}" class="follow">
                                 {{__('message.Unfollow')}}
                              </a>
                           </li>
                        </ul>
                        @endif
                        <ul class="nav nav-pills">
                           <li class="followed">
                              <p class="Following">{{__('message.Following')}}:{{$user->follow()->count()}}</p>
                           </li>
                           &nbsp;
                           <li class="followed">
                              <p class="Following">{{__('message.now_follow')}}:{{$user->beFollowed()->count()}}</p>
                           </li>
                        </ul>
                     </div>
                  </div>
               </div>
               @endforeach
            </div>
            <div class="topbar-filter">
               {{$users->links("pagination::bootstrap-4")}}
            </div>
         </div>
      </div>
   </div>
</div>
@endsection