@extends('users.layouts.index')
@section('content')
@include('users.title.header')
<h1>{{__('message.Profile',['name' => $data['user']->name])}}</h1>
@include('users.title.body')
<li> <span class="ion-ios-arrow-right"></span>{{__('message.Time_Line_History')}}</li>
@include('users.title.footer')
<div class="page-single">
   <div class="container">
      <div class="row ipad-width2">
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
                     <li><a
                           href="{{route('profile.show',[$data["user"]->id])}}">{{__('message.Profile',['name' => $data['user']->name])}}</a></li>
                     <li><a href="{{ route('profile.favorite',[$data["user"]->id]) }}">{{__('message.Favorite_Book')}}</a></li>
                     <li class="active"><a href="{{ route('profile.timeline',[$data["user"]->id]) }}">{{__('message.TimeLine_History')}}</a></li>
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
            {{ $data["activity"]->links() }}
            <div class="timeline">
               <ul>
                  @foreach ($data["activity"] as $activity)
                  <li>
                     <div class="timeline-content">
                        <h3>{{ __('message.atBook') }} : {{ $activity->book->title }}</h3>
                        <p>{{ __('message.'.$activity->type->type) }}</p>
                        <div class="time">
                           <h4>{{ langTime($activity->time,session('language')) }} </h4>
                        </div>
                     </div>
                  </li>
                  @endforeach
                  <div style="clear: both;"></div>
               </ul>
            </div>
            {{ $data["activity"]->links("pagination::bootstrap-4") }}
         </div>
      </div>
   </div>
</div>
@endsection