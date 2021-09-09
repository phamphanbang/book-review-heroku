@extends('admin.layout.index')
@section('content1')
<div class="row">
  <div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <div class="custom-chart-holder">
          {!! $chart["cart"]->container() !!}
          <a href="{{ url('admin/export/carts') }}" class="export-button">{{ __('excel.Export Excel') }}</a>
        </div>
        <div class="custom-chart-holder">
          {!! $chart["revenue"]->container() !!}
          <a href="{{ url('admin/export/revenue') }}" class="export-button">{{ __('excel.Export Excel') }}</a>
        </div>
        <div class="custom-chart-holder">
          {!! $chart["tag"]->container() !!}
          <a href="{{ url('admin/export/tag') }}" class="export-button">{{ __('excel.Export Excel') }}</a>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@section('js')
<script src="{{ asset('/admin/js/Chart.min.js') }}" charset="utf-8"></script>
{!! $chart["cart"]->script() !!}
{!! $chart["revenue"]->script() !!}
{!! $chart["tag"]->script() !!}
@endsection