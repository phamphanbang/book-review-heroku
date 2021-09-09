@extends('admin.layout.index')
@section('content1')
<div class="row">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">{{__('message.Add_Role')}}</h4>
                <p class="card-description">
                    {{__('message.Role')}}
                </p>
                <form class="forms-sample" method="POST" action="{{ url('admin/role') }}">
                    <div class="form-group">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="text" name="name" class="form-control" id="exampleInputName1"
                            placeholder="{{ __('message.Role placeholder') }}">
                    </div>
                    <div class="form-group">
                        <label for="parent">{{ __('message.Permission') }}</label>
                        <div class="permission-holder">
                            @foreach($permissions as $item)
                            <div class="permission-container">
                                <input type="checkbox" class="permission" name="permissions[]" value="{{$item->id}}">
                                <p>{{$item->name}}</p>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary mr-2">{{__('message.submit')}}</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection