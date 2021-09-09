@extends('users.layouts.index')
@section('content')
@include('users.title.review.header')
<h1> {{__('message.Create_Review')}}</h1>
@include('users.title.body')
<li><span class="ion-ios-arrow-right"></span> {{__('message.Create_Review')}}</li>
@include('users.title.footer')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.3/css/fontawesome.min.css">
<div class="page-single">
   <div class="container">
      <div class="row ipad-width">
         <div class="col-md-9 col-sm-12 col-xs-12">
            <div class="form-style-1 user-pro" action="#">
               <div>
                  <h2>{{__('message.Name_Book')}}: {{$book->title}}</h2>
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
               <form action="{{route('review.store')}}" class="user" method="post">
                  <h4>{{__('message.Review_Book')}}</h4>
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <input type="hidden" name="bookid" value="{{ $book->id }}">
                  <div class="row">
                     <div class="col-md-12 form-it">
                        <label>{{__('message.Title')}}</label>
                        <input type="text" placeholder="" name="title">
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-md-12 form-it">
                        <label>{{__('message.Body')}}</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="body"></textarea>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-md-6 form-it">
                        <label>{{__('message.Rated_books')}} </label>
                        <div class="container1">
                           <div class="star-widget">
                              {{rateform()}}
                           </div> 
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-md-2">
                        <input class="submit" type="submit" value="{{__('message.save')}}">
                     </div>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
</div>
<script src="js/jquery-3.6.0.min.js"></script>
@include('users.config.ratejs')
@endsection