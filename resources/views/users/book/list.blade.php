@extends('users.layouts.index')
@section('content')
@include('users.title.header')
<h1>{{__('message.Book_Listing_-_Grid_Fullwidth')}}</h1>
@include('users.title.body')
<li> <span class="ion-ios-arrow-right"></span> {{__('message.book_listing')}}</li>
@include('users.title.footer')
<div class="page-single">
   <div class="container">
      <div class="row">
         <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="topbar-filter fw">
               <p>{{__('message.Found')}} <span>{{count($books)}} {{__('message.Books')}}</span></p>
            </div>
            <div class="flex-wrap-movielist mv-grid-fw">
               @foreach($books as $book)
               <div class="movie-item-style-2 movie-item-style-1">
                  <img src="{{asset('/upload/book/'.$book->image)}}" class="output_image background-color-img" alt="">
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
               {{$books->links("pagination::bootstrap-4")}}
            </div>
         </div>
      </div>
   </div>
</div>
@endsection