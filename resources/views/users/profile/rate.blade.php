@extends('users.layouts.index')
@section('content')
@include('users.title.header')
<h1>Edward kennedy’s {{__('message.Profile')}}</h1>
@include('users.title.body')
<li> <span class="ion-ios-arrow-right"></span>{{__('message.Rated_books')}}</li>
@include('users.title.footer')
<div class="page-single">
   <div class="container">
      <div class="row ipad-width2">
         <div class="col-md-3 col-sm-12 col-xs-12">
            <div class="user-information">
               <form method="POST" action="{{ route('change.image') }}" enctype="multipart/form-data" class="user-img">
                  @csrf
                  @method('PUT')
                  <input type="file" id="image" name="image" class="display_none">
                  <label for="image">
                     <img id="output"
                        src="{{ $data["user"]->image?asset('storage/image/'.$data["user"]->image):'images/uploads/user-img.png' }}"
                        alt="" class="output_image">
                     <br>
                  </label>
                  @if(session()->has('imgChangeSuccess'))
                  <span class="success" role="alert">
                     <strong>{{ session()->get('imgChangeSuccess') }}</strong>
                  </span>
                  @endif
                  @error('image')
                  <span class="fail" role="alert">
                     <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                  @if(session()->has('imageError'))
                  <span class="fail" role="alert">
                     <strong>{{ session()->get('imageError') }}</strong>
                  </span>
                  @endif
                  <input type="submit" class="redbtn border_none"  value="{{__('message.Change_avatar')}}">
               </form>
               <div class="user-fav">
                  <p>{{__('message.Account_Details')}}</p>
                  <ul>
                     <li class="active"><a
                           href="{{route('profile.show',[$data["user"]->id])}}">{{__('message.Profile',['name' => $data['user']->name])}}</a></li>
                     <li><a href="{{ route('profile.favorite',[$data["user"]->id]) }}">{{__('message.Favorite_Book')}}</a></li>
                     <li><a href="{{ route('profile.ratebook',[auth()->user()->id]) }}">{{__('message.Rated_books')}}</a></li>
                     <li><a href="{{ route('profile.timeline',[auth()->user()->id]) }}">{{__('message.TimeLine_History')}}</a></li>
                  </ul>
               </div>
               <div class="user-fav">
                  <p>{{__('message.Others')}}</p>
                  <ul>
                     <li><a href="#">{{__('message.Change_password')}}</a></li>
                     <li><a href="#">{{__('message.Log_out')}}</a></li>
                  </ul>
               </div>
            </div>
         </div>
         <div class="col-md-9 col-sm-12 col-xs-12">
            <div class="topbar-filter">
               <p>{{__('message.Found')}} <span>3 {{__('message.rates')}}</span> {{__('message.in_total')}}</p>
            </div>
            <div class="movie-item-style-2 userrate">
               <img src="images/uploads/mv1.jpg" alt="">
               <div class="mv-item-infor">
                  <h6><a href="#">oblivion <span>(2012)</span></a></h6>
                  <p class="time sm-text">{{__('message.your_rate')}}:</p>
                  <p class="rate"><i class="ion-android-star"></i><span>9.0</span> /10</p>
                  <p class="time sm-text">{{__('message.your_reviews')}}:</p>
                  <h6>Best Marvel movie in my opinion</h6>
                  <p class="time sm">02 {{__('message.April')}} 2017</p>
                  <p>“This is by far one of my favorite movies from the MCU. The introduction of new Characters both good and bad also makes the movie more exciting. giving the characters more of a back story can also help audiences relate more to different characters better, and it connects a bond between the audience and actors or characters. Having seen the movie three times does not bother me here as it is as thrilling and exciting every time I am watching it. In other words, the movie is by far better than previous movies (and I do love everything Marvel), the plotting is splendid (they really do out do themselves in each film, there are no problems watching it more than once.”</p>
               </div>
            </div>
            <div class="movie-item-style-2 userrate">
               <img src="images/uploads/mv2.jpg" alt="">
               <div class="mv-item-infor">
                  <h6><a href="#">into the wild <span>(2014)</span></a></h6>
                  <p class="time sm-text">{{__('message.your_rate')}}:</p>
                  <p class="rate"><i class="ion-android-star"></i><span>7.0</span> /10</p>
               </div>
            </div>
            <div class="movie-item-style-2 userrate last">
               <img src="images/uploads/mv3.jpg" alt="">
               <div class="mv-item-infor">
                  <h6><a href="#">blade runner<span>(2015)</span></a></h6>
                  <p class="time sm-text">{{__('message.your_rate')}}:</p>
                  <p class="rate"><i class="ion-android-star"></i><span>10.0</span> /10</p>
                  <p class="time sm-text">{{__('message.your_reviews')}}:</p>
                  <h6>A masterpiece!</h6>
                  <p class="time sm">01 {{__('message.February')}} 2017</p>
                  <p>“To put it simply, the movie is fascinating, exciting and fantastic. The dialog, the fight choreography, the way the story moves, the characters charisma, all and much more are combined together to deliver this masterpiece. Such an amazing flow, providing a fusion between the 90s and the new century, it's like the assassins are living in another world, with another mindset, without people understanding it. Just one advice for you though: Don't build an expectation of what you want to watch in this movie, if you do, then you will ruin it. This movie has it's own flow and movement, so watch it with a clear mind, and have fun.”</p>
               </div>
            </div>
            <div class="topbar-filter">
               <label>{{__('message.Movies_per_page')}}:</label>
               <select>
                  <option value="range">20 {{__('message.Books')}}</option>
                  <option value="saab">10 {{__('message.Books')}}</option>
               </select>
               <div class="pagination2">
                  <span>{{__('message.pages')}} 1 {{__('message.of')}} 1:</span>
                  <a class="active" href="#">1</a>
                  <a href="#"><i class="ion-arrow-right-b"></i></a>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection