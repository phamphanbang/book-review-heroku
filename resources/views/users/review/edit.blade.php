@extends('users.layouts.index')
@section('content')
@include('users.title.review.header')
<h1> {{__('message.Edit_Review')}}</h1>
@include('users.title.body')
<li><span class="ion-ios-arrow-right"></span> {{__('message.Edit_Review')}}</li>
@include('users.title.footer')
<div class="page-single">
   <div class="container">
      <div class="row ipad-width">
         <div class="col-md-9 col-sm-12 col-xs-12">
            <div class="form-style-1 user-pro" action="#">
               <div>
                  <h2 class="color-gray">{{__('message.Name_Book')}}: {{$book->title}}</h2>
               </div>
               <br>
               @if(count($errors)>0)
               <div class="alert alert-danger">
                  @foreach($errors->all() as $err)
                  {{$err}}<br>
                  @endforeach
               </div>
               @endif
               @if (Session::has('message'))
               <div class="flash alert-info">
                  <p class="panel-body">
                     {{ __(Session::get('message')) }}
                  </p>
               </div>
               @endif
               <form action="{{route('review.update',[$review->id])}}" class="user border-bottom-none" method="post">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  @method('PUT')
                  <h4>{{__('message.Review_Book')}}</h4>
                  <input type="hidden" name="bookId" value="{{$book->id}}">
                  <div class="row">
                     <div class="col-md-12 form-it">
                        <label>{{__('message.Title')}}</label>
                        <input type="text" placeholder="" name="title" value="{{$review->title}}">
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-md-12 form-it">
                        <label>{{__('message.Body')}}</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" name="body" value="{{$review->body}}" rows="3">{{$review->body}}</textarea>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-md-6 form-it">
                        <label>{{__('message.Rated_books')}} </label>
                        <div class="container1">
                           <h5 class="oldrate">Old rating</h5>
                           <div class="star-widget">
                              {{oldrate($review->rate)}}
                           </div>
                           <h5 class="newrate">New rating</h5>
                           <div class="star-widget">
                              {{rateform()}}
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-md-2">
                        <input class="submit" type="submit" value="{{__('message.Update')}}">
                     </div>
                     <div class="col-md-2">
                        <input class="submit" type="submit" value="{{__('message.Delete')}}" form="delete-review">
                     </div>
                  </div>
               </form>
               <form action="{{route('review.destroy',[$review->id])}}" class="user display_none" id="delete-review" method="post">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  @method('DELETE')
               </form>      
            </div>
         </div>
      </div>
   </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
@include('users.config.ratejs')
@endsection