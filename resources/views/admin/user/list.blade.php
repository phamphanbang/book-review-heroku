@extends('admin.layout.index')
@section('content1')
<div class="row">
  <div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title display-inline-block">{{__('message.List_User')}}</h4>
        <form class="display-inline-block float-right" method="POST" action="{{ route('admin.user.search') }}">
          @csrf
          <label for="search">{{ __('message.search') }}</label>
          <input type="text" name="search" id="search" class="custom-input">
          <select name="by" id="search-by">
            <option value="id" >{{__('message.Id')}}</option>
            <option value="name">{{__('message.Username')}}</option>
            <option value="email">{{__('message.Email')}}</option>
            <option value="role">{{__('message.Role')}}</option>
          </select>
          <button type="submit" class="display-hidden"></button>
        </form>
        <div class="table-responsive">
          <table class="table">
            <thead>
              <tr>
                <th>{{__('message.Id')}}</th>
                <th>{{__('message.Username')}}</th>
                <th>{{__('message.Image')}}</th>
                <th>{{__('message.Email')}}</th>
                <th>{{__('message.Action')}}</th>
              </tr>
            </thead>
            @foreach ($data["users"] as $user)
            <tbody>
              <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td><img src="{{ imgSrc($user->image) }}" alt=""></td>
                <td>{{ $user->email }}</td>
                <td>
                  <a href="{{url('admin/user/'.$user->id.'/edit')}}">
                    <label class="badge badge-info">{{__('message.Edit')}}</label>
                  </a>
                  <a class="confirm" item-id="{{ $user->id }}" item-type="user" lang="{{ session('language') }}">
                    <label class="badge badge-danger">{{__('message.Delete')}}</label>
                  </a>
                </td>
              </tr>
            </tbody>
            @endforeach
          </table>
        </div>
        {{ $data["users"]->links("pagination::bootstrap-4") }}
      </div>
    </div>
  </div>
</div>
@endsection