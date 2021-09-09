@extends('admin.layout.index')
@section('content1')
<div class="row">
   <div class="col-12 grid-margin stretch-card">
      <div class="card">
         <div class="card-body">
            <h4 class="card-title">{{__('message.Users')}}</h4>
            <p class="card-description">
               {{__('message.Users')}}
            </p>
            <form class="forms-sample">
               <div class="form-group">
                  <label for="exampleInputName1">{{__('message.Username')}}</label>
                  <input type="text" class="form-control" id="exampleInputName1" placeholder="{{__('message.Username')}}" value="{{$user->name}}"  readonly>
               </div>
               <div class="form-group">
                  <label for="exampleInputEmail3">{{__('message.Email_Address')}}</label>
                  <input type="email" class="form-control" id="exampleInputEmail3" placeholder="{{__('message.Email_Address')}}" value="{{$user->email}}"  readonly>
               </div>
               <div class="form-group">
                  <label for="exampleInputPassword4">{{__('message.Password')}}</label>
                  <input type="password" class="form-control" id="exampleInputPassword4" placeholder="{{__('message.Password')}}" value="{{$user->password}}"  readonly>
               </div>
               <div class="form-group">
                  <label>{{__('message.Image_Profile')}}</label>
                  <img class="imageprofile" src="{{asset('/upload/user/'.Auth::user()->image)}}" alt="Italian Trulli">
               </div>
            </form>
         </div>
      </div>
   </div>
</div>
@endsection