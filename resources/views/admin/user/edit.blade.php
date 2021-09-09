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
        @if(session()->has('registerSuccess'))
        <span class="success" role="alert">
          <strong>{{ session()->get('registerSuccess') }}</strong>
        </span>
        @endif
        <form class="forms-sample" method="POST" action="{{ url('admin/user/'.$data["user"]->id) }}"
          enctype="multipart/form-data">
          @csrf
          @method('PUT')
          <div class="form-group">
            <label for="name">{{__('message.Username')}}</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="{{__('message.Username')}}"
              value="{{ $data["user"]->name }}">
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
               <option {{ $data["user"]->hasRole($role->name)?'selected':'' }} value="{{$role->id}}">{{$role->name}}</option>
               @endforeach
               @if($data["user"]->hasRole($super_admin->name))
               <option selected value="{{$super_admin->id}}">{{$super_admin->name}}</option>
               @endif
            </select>
         </div>
          <div class="form-group">
            <label for="email">{{__('message.Email_Address')}}</label>
            <input type="email" class="form-control" name="email" placeholder="{{__('message.Email_Address')}}"
              id="email" value="{{ $data["user"]->email }}">
            <input type="email" class="display-hidden" name="old_email" value="{{ $data["user"]->email }}">
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
          </div>
          <div class="form-group">
            <label for="image">{{__('message.Upload')}} {{__('message.Image')}}</label>
            <input type="file" name="image" id="image" class="file-upload-default">
            <div class="input-group col-xs-12">
              <label for="image">
                <img id="output" src="{{ imgSrc($data["user"]->image) }}" alt="" class="output_image">
                <br>
              </label>
            </div>
          </div>
          <button type="submit" class="btn btn-primary mr-2">{{__('message.submit')}}</button>
          @if(session()->has('profileChangeSuccess'))
          <span class="success" role="alert">
            <strong>{{ session()->get('profileChangeSuccess') }}</strong>
          </span>
          @endif
        </form>
      </div>
    </div>
  </div>
</div>
@endsection