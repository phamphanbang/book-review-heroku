@extends('admin.layout.index')
@section('content1')
<div class="row">
  <div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title display-inline-block">{{__('message.List_Role')}}</h4>
        <div class="table-responsive">
          <table class="table">
            <thead>
              <tr>
                <th>{{__('message.Role_Id')}}</th>
                <th>{{__('message.Role')}}</th>
                <th>{{__('message.Action')}}</th>
              </tr>
            </thead>
            @foreach ($data["roles"] as $role)
            <tbody>
              <tr>
                <td>{{ $role->id }}</td>
                <td>{{ $role->name }}</td>
                <td>
                  <a href="{{url('admin/role/'.$role->id.'/edit')}}">
                    <label class="badge badge-info">{{__('message.Edit')}}</label>
                  </a>
                  <a class="confirm {{ $role->name=='Super Admin'?'disabled':'' }}" item-id="{{ $role->id }}" item-type="role" lang="{{ session('language') }}">
                    <label class="badge badge-danger">{{__('message.Delete')}}</label>
                  </a>
                </td>
              </tr>
            </tbody>
            @endforeach
          </table>
        </div>
        {{ $data["roles"]->links("pagination::bootstrap-4") }}
      </div>
    </div>
  </div>
</div>
@endsection