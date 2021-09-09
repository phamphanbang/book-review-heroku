@extends('users.layouts.index')
@section('content')
@include('users.title.header')
<h1>{{__('message.Profile',['name' => $user->name])}}</h1>
@include('users.title.body')
<li> <span class="ion-ios-arrow-right"></span>{{__('message.Favorite_Book')}}</li>
@include('users.title.footer')
<div class="page-single userfav_list">
   <div class="container">
      <div class="row ipad-width2">
         <div class="col-md-3 col-sm-12 col-xs-12">
            <div class="user-information">
               <form method="POST" action="{{ route('change.image') }}" enctype="multipart/form-data" class="user-img">
                  @csrf
                  @method('PUT')
                  <label for="image">
                     <img id="output"
                        src="{{ imgSrc($user->image) }}"
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
                  @if (auth()->user()->id == $user->id)
                  <input type="file" id="image" name="image" class="display_none">    
                  <input type="submit" class="redbtn border_none"  value="{{__('message.Change_avatar')}}">
                  @endif
               </form>
               <div class="user-fav">
                  <p>{{__('message.Account_Details')}}</p>
                  <ul>
                     <li><a
                           href="{{route('profile.show',[$user->id])}}">{{__('message.Profile',['name' => $user->name])}}</a></li>
                     <li class="active"><a href="{{ route('profile.favorite',[$user->id]) }}">{{__('message.Favorite_Book')}}</a></li>
                     <li><a href="{{ route('profile.timeline',[$user->id]) }}">{{__('message.TimeLine_History')}}</a></li>
                  </ul>
               </div>
               @if (auth()->user()->id == $user->id)
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
            <div class="topbar-filter user">
               <p>{{__('message.Found')}} <span>{{$count}} {{__('message.Books')}}</span> {{__('message.in_total')}}</p>
            </div>
            <div class="flex-wrap-movielist user-fav-list">
               @foreach($books as $book)
               <div class="movie-item-style-2 movie-item-style-1">
                  <img src="{{asset('/upload/book/'.$book->image)}}" class="output_image background-color-img width-100" alt="">
                  <div class="hvr-inner">
                     <a  href="{{route('book.show',[$book->id])}}"> {{__('message.Read_more')}} <i class="ion-android-arrow-dropright"></i> </a>
                  </div>
                  <div class="mv-item-infor">
                     <h6><a href="{{route('book.show',[$book->id])}}">{{$book->title}}</a></h6>
                     <p class="rate"><i class="ion-android-star"></i><span>{{$book->rate}}</span> /10</p>
                  </div>
               </div>
               @endforeach
            </div>
            <div class="topbar-filter">
               <div class="pagination2">
                  {{$books->links("pagination::bootstrap-4")}}
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection