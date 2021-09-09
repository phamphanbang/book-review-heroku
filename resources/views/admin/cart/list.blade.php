@extends('admin.layout.index')
@section('content1')
<div class="row">
  <div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title display-inline-block">{{__('message.CartList')}}</h4>
        <div class="display-inline-block float-right">
          <label for="cart-status">{{ __('message.status') }}</label>
          <select name="status" id="cart-status">
            <option value="pending" {{ $data["type"]=='pending'?'selected':'' }}>{{ __('message.pending') }}</option>
            <option value="cancel" {{ $data["type"]=='cancel'?'selected':'' }}>{{ __('message.cancel') }}</option>
            <option value="done" {{ $data["type"]=='done'?'selected':'' }}>{{ __('message.done') }}</option>
          </select>
        </div>
        <div class="table-responsive">
          <table class="table">
            <thead>
              <tr>
                <th>{{__('message.cartId')}}</th>
                <th>{{__('message.cartUsername')}}</th>
                <th>{{__('message.Status')}}</th>
                <th>{{__('message.total_price')}}</th>
                <th>{{__('message.Created_At')}}</th>
                <th>{{__('message.Action')}}</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($data["carts"] as $cart)
              <tr>
                <td>{{ $cart->getCartID() }}</td>
                <td>{{ $cart->user->name }}</td>
                <td>{{ __('message.'.$cart->status) }}</td>
                <td>{{ $cart->total_price?$cart->total_price:0 }}</td>
                <td>{{ $cart->created_at }}</td>
                <td class="display-flex">
                  <a href="{{url('admin/cart/'.$cart->id.'/edit')}}">
                    <label class="badge badge-info">{{__('message.Detail')}}</label>
                  </a>
                  <a class="confirm" item-id="{{ $cart->id }}" item-type="cart" lang="{{ session('language') }}">
                    <label class="badge badge-danger">{{__('message.Delete')}}</label>
                  </a>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
          {{ $data["carts"]->links("pagination::bootstrap-4") }}
        </div>
      </div>
    </div>
  </div>
</div>
@endsection