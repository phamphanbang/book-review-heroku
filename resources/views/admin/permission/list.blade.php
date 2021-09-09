@extends('admin.layout.index')
@section('content1')
<div class="row">
  <div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title display-inline-block">{{__('message.Add_permission')}}</h4>
        <br>
        @if(session()->has('permissionCreateSuccess'))
        <span class="success" role="alert">
          <strong>{{ session()->get('permissionCreateSuccess') }}</strong>
        </span>
        @endif
        <br>
        @if(session()->has('permissionCreateFail'))
        <span class="fail" role="alert">
          <strong>{{ session()->get('permissionCreateFail') }}</strong>
        </span>
        @endif
        <form class="forms-sample" method="POST" action="{{ url('admin/permission') }}">
          <div class="form-group">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="text" name="name" class="form-control" id="exampleInputName1"
              placeholder="{{ __('message.Permission placeholder') }}">
          </div>
          <button type="submit" class="btn btn-primary mr-2">{{__('message.submit')}}</button>
        </form>
      </div>
      <div class="card-body">
        <h4 class="card-title display-inline-block">{{__('message.List_permission')}}</h4>
        <br>
        @if(session()->has('permissionUpdateSuccess'))
        <span class="success" role="alert">
          <strong>{{ session()->get('permissionUpdateSuccess') }}</strong>
        </span>
        @endif
        <br>
        @if(session()->has('permissionDeleteSuccess'))
        <span class="success" role="alert">
          <strong>{{ session()->get('permissionDeleteSuccess') }}</strong>
        </span>
        @endif
        <br>
        @if(session()->has('permissionUpdateFail'))
        <span class="fail" role="alert">
          <strong>{{ session()->get('permissionUpdateFail') }}</strong>
        </span>
        @endif
        <div class="table-responsive">
          <table class="table">
            <thead>
              <tr>
                <th>{{__('message.Permission_Id')}}</th>
                <th>{{__('message.Permission')}}</th>
                <th>{{__('message.Action')}}</th>
              </tr>
            </thead>
            @foreach ($data["permissions"] as $permission)
            <tbody>
              <form class="forms-sample" method="post" action="{{route('permission.update',[$permission->id])}}">
                @method('PUT')
                <tr>
                  <td>{{ $permission->id }}</td>
                  <td><input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="old_name" value="{{ $permission->name }}">
                    <input type="text" name="name" class="form-control height-10px" id="exampleInputName1"
                      placeholder="{{ __('message.Role placeholder') }}" value="{{ $permission->name }}"></td>
                  <td>
                    <button type="submit" class="btn btn-primary mr-2 submit-action">{{__('message.Edit')}}</button>
                    <a class="confirm" item-id="{{ $permission->id }}" item-type="permission"
                      lang="{{ session('language') }}">
                      <label class="badge badge-danger">{{__('message.Delete')}}</label>
                    </a>
                  </td>
                </tr>
              </form>
            </tbody>
            @endforeach
          </table>
        </div>
        {{ $data["permissions"]->links("pagination::bootstrap-4") }}
      </div>
    </div>
  </div>
</div>
@endsection