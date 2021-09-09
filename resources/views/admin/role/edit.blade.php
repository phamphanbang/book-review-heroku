@extends('admin.layout.index')
@section('content1')
<div class="row">
   <div class="col-12 grid-margin stretch-card">
      <div class="card">
         <div class="card-body">
            <h4 class="card-title">{{__('message.Edit_Role')}}</h4>
            @if(session()->has('roleCreateSuccess'))
            <span class="success" role="alert">
               <strong>{{ session()->get('roleCreateSuccess') }}</strong>
            </span>
            @endif
            @if(session()->has('roleUpdateSuccess'))
            <span class="success" role="alert">
               <strong>{{ session()->get('roleUpdateSuccess') }}</strong>
            </span>
            @endif
            <p class="card-description">
               {{__('message.Role')}}
            </p>
            <form class="forms-sample" method="post" action="{{route('role.update',[$current_role->id])}}">
               @method('PUT')
               <div class="form-group">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <input type="hidden" name="roleid" value="{{$current_role->id}}">
                  <input type="text" name="name" class="form-control" id="exampleInputName1"
                     placeholder="{{$current_role->name}}" value="{{$current_role->name}}" readonly>
               </div>
               <div class="form-group">
                  <label for="parent">{{ __('message.Permission') }}</label>
                  <div class="permission-holder">
                     @if ($current_role->name == $super_admin->name)
                     {{ __('message.This role has all permission') }}
                     @else
                     @foreach($permissions as $item)
                     <div class="permission-container">
                        <input type="checkbox" class="permission" name="permissions[]" value="{{$item->id}}"
                           {{ $current_role->permissions->contains('name',$item->name)?'checked':'' }}>
                        <p>{{$item->name}}</p>
                     </div>
                     @endforeach
                     @endif
                  </div>
               </div>
               <button type="submit" {{ $current_role->name == $super_admin->name?'disabled':'' }}
                  class="btn btn-primary mr-2">{{__('message.submit')}}</button>
            </form>
         </div>
      </div>
   </div>
</div>
@endsection