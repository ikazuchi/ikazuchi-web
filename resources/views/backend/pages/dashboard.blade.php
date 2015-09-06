@extends('backend.layout')

@section('title', "Dashboard")

@section('css')

@stop

@section('content')
  <div class="page-bar" style="margin-top: -25px;" data-ng-app="ikazuchi">
    <ul class="page-breadcrumb">
      <li>
        <i class="fa fa-home"></i>
        <a href="index.html">Home</a>
        <i class="fa fa-angle-right"></i>
      </li>
      <li>
        <a href="#">Dashboard</a>
      </li>
    </ul>
  </div>

  <h3 class="page-title">
    Dashboard
  </h3>
@stop

@section('jsPageLevelPlugins')
  <script src="{{ asset('js/vendor.js') }}" type="text/javascript"></script>
@stop

@section('jsFooter')

@stop
