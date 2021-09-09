@extends('admin.layout.index')
@section('content1')
<div class="row">
  <div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title display-inline-block">{{__('message.Add_Tag')}}</h4>
        <br>
        @if(session()->has('tagCreateSuccess'))
        <span class="success" role="alert">
          <strong>{{ session()->get('tagCreateSuccess') }}</strong>
        </span>
        @endif
        <br>
        @if(session()->has('tagCreateFail'))
        <span class="fail" role="alert">
          <strong>{{ session()->get('tagCreateFail') }}</strong>
        </span>
        @endif
        <form class="forms-sample" method="POST" action="{{ url('admin/tag') }}">
          <div class="form-group">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="text" name="name" class="form-control" id="exampleInputName1"
              placeholder="{{ __('message.Tag placeholder') }}">
          </div>
          <button type="submit" class="btn btn-primary mr-2">{{__('message.submit')}}</button>
        </form>
      </div>
      <div class="card-body">
        <h4 class="card-title display-inline-block">{{__('message.List_tag')}}</h4>
        <br>
        @if(session()->has('tagUpdateSuccess'))
        <span class="success" role="alert">
          <strong>{{ session()->get('tagUpdateSuccess') }}</strong>
        </span>
        @endif
        <br>
        @if(session()->has('tagDeleteSuccess'))
        <span class="success" role="alert">
          <strong>{{ session()->get('tagDeleteSuccess') }}</strong>
        </span>
        @endif
        <br>
        @if(session()->has('tagUpdateFail'))
        <span class="fail" role="alert">
          <strong>{{ session()->get('tagUpdateFail') }}</strong>
        </span>
        @endif
        <div class="table-responsive">
          <table class="table">
            <thead>
              <tr>
                <th>{{__('message.Tag_Id')}}</th>
                <th>{{__('message.Tag')}}</th>
                <th>{{__('message.Count')}}</th>
                <th>{{__('message.Action')}}</th>
              </tr>
            </thead>
            @foreach ($data["tags"] as $tag)
            <tbody>
              <form class="forms-sample" method="post" action="{{route('tag.update',[$tag->id])}}">
                @method('PUT')
                <tr>
                  <td>{{ $tag->id }}</td>
                  <td><input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="old_name" value="{{ $tag->name }}">
                    <input type="text" name="name" class="form-control height-10px" id="exampleInputName1"
                      placeholder="{{ __('message.Tag placeholder') }}" value="{{ $tag->name }}"></td>
                  <td>{{ $tag->count }}</td>
                  <td>
                    <button type="submit" class="btn btn-primary mr-2 submit-action">{{__('message.Edit')}}</button>
                    <a class="confirm" item-id="{{ $tag->id }}" item-type="tag" lang="{{ session('language') }}">
                      <label class="badge badge-danger">{{__('message.Delete')}}</label>
                    </a>
                  </td>
                </tr>
              </form>
            </tbody>
            @endforeach
          </table>
        </div>
        {{ $data["tags"]->links("pagination::bootstrap-4") }}
      </div>
    </div>
  </div>
</div>
@endsection