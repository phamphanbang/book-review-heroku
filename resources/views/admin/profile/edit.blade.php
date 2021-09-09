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
            <form class="forms-sample" method="POST" action="{{ route('profileadmin.update',[$user->id]) }}" enctype="multipart/form-data">
               @csrf
               @method('PUT')
               <div class="form-group">
                  <label for="exampleInputName1">{{__('message.Username')}}</label>
                  <input type="text" class="form-control" name="name" id="exampleInputName1" placeholder="{{__('message.Username')}}" value="{{$user->name}}">
               </div>
               <div class="form-group">
                  <label for="exampleInputEmail3">{{__('message.Email_Address')}}</label>
                  <input type="email" class="form-control" name="email" id="exampleInputEmail3" placeholder="{{__('message.Email_Address')}}" value="{{$user->email}}">
               </div>
               <div class="form-group">
                  <label for="exampleInputCity1">{{__('message.Image')}}</label>
                  <img class="imageprofile" src="upload/user/{{$user->image}}" >
               </div>
               <div class="form-group">
                  <label>{{__('message.Image')}}</label>
                  <input type="file" name="image" class="file-upload-default">
                  <div class="input-group col-xs-12">
                     <input type="text" name="image" class="form-control file-upload-info" disabled placeholder="{{__('message.Upload')}}">
                     <span class="input-group-append">
                     <button class="file-upload-browse btn btn-primary" type="button">{{__('message.Upload')}}</button>
                     </span>
                  </div>
               </div>
               <button type="submit" class="btn btn-primary mr-2">{{__('message.submit')}}</button>
            </form>
            <br>
            <br>
            <h4 class="card-title">{{__('message.Change_password')}}</h4>
            <p class="card-description">
               {{__('message.Change_password')}}
            </p>
            <form action="{{ route('change.password') }}" method="POST" class="password">
               @csrf
               @method('PUT')
               <div class="form-group">
                  <label for="exampleInputPassword4">{{__('message.Old_Password')}}</label>
                  <input type="password" class="form-control" name="current_password" id="exampleInputPassword4" placeholder="{{__('message.Password')}}">
               </div>
               <div class="form-group">
                  <label for="exampleInputPassword4">{{__('message.New_Password')}}</label>
                  <input type="password" class="form-control" name="password" id="exampleInputPassword4" placeholder="{{__('message.Password')}}">
               </div>
               <div class="form-group">
                  <label for="exampleInputPassword4">{{__('message.Confirm_New_Password')}}</label>
                  <input type="password" class="form-control" name="password_confirmation" id="exampleInputPassword4" placeholder="{{__('message.Password')}}">
               </div>
               <button type="submit" class="btn btn-primary mr-2">{{__('message.submit')}}</button>
            </form>
         </div>
      </div>
   </div>
</div>
@endsection