@extends('users.layouts.index')
@section('content')
@include('users.title.review.header')
<h1> {{__('message.Update_Comment')}}</h1>
@include('users.title.body')
<li> <span class="ion-ios-arrow-right"></span> {{__('message.Update_Comment')}}</li>
@include('users.title.footer')
<div class="page-single">
   <div class="container">
      <div class="row ipad-width">
         <div class="row">
            <div class="col-md-9 col-sm-12 col-xs-12">
               <div class="blog-detail-ct">
                  <div class="comment-form">
                     <h4>{{__('message.Update_Comment')}}</h4>
                     <form action="{{route('comment.update',[$comment->id])}}" method="post">
                        @method('PUT')
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="reviewid" value="{{ $comment->review()->value('id') }}">
                        <input type="hidden" name="userid" value="{{ $comment->user()->value('id') }}">
                        <div class="row">
                           <div class="col-md-12">
                              <textarea name="body" id="" placeholder="{{__('message.Comments')}}">{{$comment->body}}</textarea>
                           </div>
                        </div>
                        <button class="submit" type="submit" placeholder="update">{{__('message.Update')}}</button>
                     </form>
                  </div>
                  <!-- comment form -->
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection