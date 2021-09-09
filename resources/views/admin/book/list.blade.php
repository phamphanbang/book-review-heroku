@extends('admin.layout.index')
@section('content1')
<div class="row">
   <div class="col-lg-12 grid-margin stretch-card">
      <div class="card">
         <div class="card-body">
            <h4 class="card-title">{{__('message.Books')}}</h4>
            <p class="card-description">
            </p>
            <div class="table-responsive">
               <table class="table">
                  <thead>
                     <tr>
                        <th>{{__('message.Id')}}</th>
                        <th>{{__('message.Name_Category')}}</th>
                        <th>{{__('message.Title')}}</th>
                        <th>{{__('message.Author')}}</th>
                        <th>{{__('message.Image')}}</th>
                        <th>{{__('message.price')}}</th>
                        <th>{{__('message.Action')}}</th>
                     </tr>
                  </thead>
                  <tbody>
                     @foreach($books as $book)
                     <tr>
                        <td>{{$book->id}}</td>
                        <td>
                           @foreach($book->categorys as $category)
                           {{$category->title}}
                           @endforeach
                        </td>
                        <td>{{$book->title}}</td>
                        <td>{{$book->author}}</td>
                        <td>
                           <img src="upload/book/{{$book->image}}">
                        </td>
                        <td>{{$book->price}}</td>
                        <td>
                           <a href="{{route('bookadmin.edit',[$book->id])}}" ">
                           <label class="badge badge-info">{{__('message.Edit')}}</label>
                           </a>
                           <a class="confirm" item-id="{{ $book->id }}" item-type="book" lang="{{ session('language') }}">
                           <label class="badge badge-danger">{{__('message.Delete')}}</label>
                           </a>
                        </td>
                     </tr>
                     @endforeach
                  </tbody>
               </table>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection