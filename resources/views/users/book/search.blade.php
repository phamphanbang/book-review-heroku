@extends('users.layouts.index')
@section('content')
@include('users.title.header')
<h1>{{__('message.Search_book')}}</h1>
@include('users.title.body')
<li> <span class="ion-ios-arrow-right"></span> {{__('message.Search_book')}}</li>
@include('users.title.footer')
<div class="page-single movie_list">
   <div class="container">
      <div class="row ipad-width2">
         <div class="col-md-8 col-sm-12 col-xs-12">
            @if (session('msg'))
            <div class="alert alert-success">
               {{session('msg')}}
            </div>
            @endif
            <div class="topbar-filter">
               <p>{{__('message.Found')}} <span>{{$total}} {{__('message.Books')}}</span> {{__('message.in_total')}}</p>
            </div>
            @foreach($books as $book)
            <div class="movie-item-style-2">
            <img src="{{asset('/upload/book/'.$book->image)}}" class="output_image" alt="">
               <div class="mv-item-infor">
                  <h6><a href="{{ route('book.show',[$book->id]) }}">{{$book->title}}</a></h6>
                  <p class="run-time"> {{__('message.number_of_page')}}: {{$book->num_of_page}}    .     <span>{{__('message.price')}}: {{$book->price}} </span>    .     <span>{{__('message.Release')}}: {{$book->publish_at}}</span></p>
                  <p class="author">{{__('message.Author')}}: <a href="#">{{$book->author}}</a></p>
               </div>
            </div>
            @endforeach
            <div class="topbar-filter">
               <label>{{__('message.Book_per_page')}}:</label>
               <select>
                  <option value="range">5 {{__('message.Books')}}</option>
                  <option value="saab">10 {{__('message.Books')}}</option>
               </select>
               <div style="text-align:center">
                  {{$books->links()}}
               </div>
            </div>
         </div>
         <div class="col-md-4">
            <div class="sidebar">
               <div class="ads">
                  <img src="images/uploads/ads1.png" alt="" width="336" height="296">
               </div>
               <div class="celebrities">
                  <h4 class="sb-title">{{__('message.Tag')}}</h4>
                  <div class="tag-container">
                     @foreach ($tags as $tag)
                     <div class="tag">
                        <a href="{{ url('tag/'.$tag->name) }}">
                           {{ '#'.$tag->name }}
                        </a>
                     </div>
                     @endforeach
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection