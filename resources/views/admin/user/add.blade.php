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
        <form class="forms-sample" method="POST" action="{{ url('admin/user') }}" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
            <label for="name">{{__('message.Username')}}</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="{{__('message.Username')}}"
              value="{{ old('name')?old('name'):'' }}">
            @error('name')
            <span class="fail" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>
          <div class="form-group">
            <label for="exampleSelectGender">{{__('message.Role')}}</label>
            <select class="form-control" name="role" id="categorySelect2">
               @foreach($roles as $role)
               <option {{ $role->name == 'user'?'selected':'' }} value="{{$role->id}}">{{$role->name}}</option>
               @endforeach
            </select>
         </div>
          <div class="form-group">
            <label for="email">{{__('message.Email_Address')}}</label>
            <input type="email" class="form-control" name="email" placeholder="{{__('message.Email_Address')}}"
              id="email" value="{{ old('email')?old('email'):'' }}">
            @error('email')
            <span class="fail" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>
          <div class="form-group">
            <label for="password">{{__('message.Password')}}</label>
            <input type="password" class="form-control" id="password" name="password"
              placeholder="{{__('message.Password')}}">
            @error('password')
            <span class="fail" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>
          <div class="form-group">
            <label for="password_confirmation">{{__('message.Confirm_Password')}}</label>
            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation"
              placeholder="{{__('message.Password')}}">
            @error('password')
            <span class="fail" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>
          <div class="form-group">
            <label for="image">{{__('message.Upload')}} {{__('message.Image')}}</label>
            <input type="file" name="image" id="image" class="file-upload-default">
            <div class="input-group col-xs-12">
              <label for="image">
                <img id="output" src="{{ imgSrc(null) }}" alt="" class="output_image">
                <br>
              </label>
            </div>
          </div>
          <button type="submit" class="btn btn-primary mr-2">{{__('message.submit')}}</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection