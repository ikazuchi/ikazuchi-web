@extends('backend.layout')

@section('title', "Dashboard")

@section('css')
  <link rel="stylesheet" type="text/css" href="{{ asset('css/nv.d3.min.css') }}">
@stop

@section('content')
  {{--<div class="page-bar" style="margin-top: -25px;">--}}
  {{--<ul class="page-breadcrumb">--}}
  {{--<li>--}}
  {{--<i class="fa fa-home"></i>--}}
  {{--<a href="index.html">Home</a>--}}
  {{--<i class="fa fa-angle-right"></i>--}}
  {{--</li>--}}
  {{--<li>--}}
  {{--<a href="#">Dashboard</a>--}}
  {{--</li>--}}
  {{--</ul>--}}
  {{--</div>--}}

  <div data-ng-app="ikazuchi" data-ng-controller="AlertsCtrl as ctrl">
    <h3 class="page-title">
      Alerts
    </h3>

    <div class="row">
      <div class="col-lg-12">
        <div class="portlet light">
          <div class="portlet-title">
            <div class="caption">
              <i class="icon-bar-chart font-green-sharp hide"></i>
              <span class="caption-subject font-green-sharp bold uppercase">Thresholds</span>
              <span class="caption-helper" data-ng-if="!ctrl.alerts.$resolved">loading&hellip;</span>
            </div>
            {{--<div class="actions">--}}
            {{--<div class="btn-group btn-group-devided" data-toggle="buttons">--}}
            {{--<label class="btn btn-transparent grey-salsa btn-circle btn-sm active">--}}
            {{--<input type="radio" name="options" class="toggle" id="option1">New</label>--}}
            {{--<label class="btn btn-transparent grey-salsa btn-circle btn-sm">--}}
            {{--<input type="radio" name="options" class="toggle" id="option2">Returning</label>--}}
            {{--</div>--}}
            {{--</div>--}}
          </div>
          <div class="portlet-body">
                <div class="row">
                  <div class="col-md-4">
                    <div class="dashboard-stat blue-madison">
                      <div class="visual">
                        {{--<i class="fa fa-comments"></i>--}}
                      </div>
                      <div class="details">
                        <div class="number" data-ng-bind="ctrl.alerts[0].threshold + '&#xB0;C'"></div>
                        <div class="desc">Max Temperature</div>
                      </div>
                      {{--<a class="more" href="javascript:;">--}}
                        {{--View more <i class="m-icon-swapright m-icon-white"></i>--}}
                      {{--</a>--}}
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="dashboard-stat red-intense">
                      <div class="visual">
                        {{--<i class="fa fa-bar-chart-o"></i>--}}
                      </div>
                      <div class="details">
                        <div class="number" data-ng-bind="ctrl.alerts[1].threshold + '%'"></div>
                        <div class="desc">Max Humidity</div>
                      </div>
                      {{--<a class="more" href="javascript:;">--}}
                        {{--View more <i class="m-icon-swapright m-icon-white"></i>--}}
                      {{--</a>--}}
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="dashboard-stat green-haze">
                      <div class="visual">
                        {{--<i class="fa fa-shopping-cart"></i>--}}
                      </div>
                      <div class="details">
                        <div class="number" data-ng-bind="ctrl.alerts[2].threshold + ' cm'"></div>
                        <div class="desc">Max Water Level</div>
                      </div>
                      {{--<a class="more" href="javascript:;">--}}
                        {{--View more <i class="m-icon-swapright m-icon-white"></i>--}}
                      {{--</a>--}}
                    </div>
                  </div>
                  {{--<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">--}}
                    {{--<div class="dashboard-stat purple-plum">--}}
                      {{--<div class="visual">--}}
                        {{--<i class="fa fa-globe"></i>--}}
                      {{--</div>--}}
                      {{--<div class="details">--}}
                        {{--<div class="number">--}}
                          {{--+89%--}}
                        {{--</div>--}}
                        {{--<div class="desc">--}}
                          {{--Brand Popularity--}}
                        {{--</div>--}}
                      {{--</div>--}}
                      {{--<a class="more" href="javascript:;">--}}
                        {{--View more <i class="m-icon-swapright m-icon-white"></i>--}}
                      {{--</a>--}}
                    {{--</div>--}}
                  {{--</div>--}}
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-12">
        <div class="portlet light">
          <div class="portlet-title">
            <div class="caption">
              <i class="icon-bar-chart font-green-sharp hide"></i>
              <span class="caption-subject font-green-sharp bold uppercase">Top Measures</span>
              <span class="caption-helper" data-ng-if="!ctrl.top.$resolved">loading&hellip;</span>
            </div>
            {{--<div class="actions">--}}
            {{--<div class="btn-group btn-group-devided" data-toggle="buttons">--}}
            {{--<label class="btn btn-transparent grey-salsa btn-circle btn-sm active">--}}
            {{--<input type="radio" name="options" class="toggle" id="option1">New</label>--}}
            {{--<label class="btn btn-transparent grey-salsa btn-circle btn-sm">--}}
            {{--<input type="radio" name="options" class="toggle" id="option2">Returning</label>--}}
            {{--</div>--}}
            {{--</div>--}}
          </div>
          <div class="portlet-body">
            <div class="row">
              <div class="col-md-4">
                <div class="dashboard-stat blue-madison">
                  <div class="visual">
                    {{--<i class="fa fa-comments"></i>--}}
                  </div>
                  <div class="details">
                    <div class="number" data-ng-bind="ctrl.top.temperature.temperature + '&#xB0;C'"></div>
                    <div class="desc">Temperature</div>
                  </div>
                  {{--<a class="more" href="javascript:;">--}}
                  {{--View more <i class="m-icon-swapright m-icon-white"></i>--}}
                  {{--</a>--}}
                </div>
              </div>
              <div class="col-md-4">
                <div class="dashboard-stat red-intense">
                  <div class="visual">
                    {{--<i class="fa fa-bar-chart-o"></i>--}}
                  </div>
                  <div class="details">
                    <div class="number" data-ng-bind="ctrl.top.humidity.humidity + '%'"></div>
                    <div class="desc">Humidity</div>
                  </div>
                  {{--<a class="more" href="javascript:;">--}}
                  {{--View more <i class="m-icon-swapright m-icon-white"></i>--}}
                  {{--</a>--}}
                </div>
              </div>
              <div class="col-md-4">
                <div class="dashboard-stat green-haze">
                  <div class="visual">
                    {{--<i class="fa fa-shopping-cart"></i>--}}
                  </div>
                  <div class="details">
                    <div class="number" data-ng-bind="ctrl.top.water_level.water_level + ' cm'"></div>
                    <div class="desc">Water Level</div>
                  </div>
                  {{--<a class="more" href="javascript:;">--}}
                  {{--View more <i class="m-icon-swapright m-icon-white"></i>--}}
                  {{--</a>--}}
                </div>
              </div>
              {{--<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">--}}
              {{--<div class="dashboard-stat purple-plum">--}}
              {{--<div class="visual">--}}
              {{--<i class="fa fa-globe"></i>--}}
              {{--</div>--}}
              {{--<div class="details">--}}
              {{--<div class="number">--}}
              {{--+89%--}}
              {{--</div>--}}
              {{--<div class="desc">--}}
              {{--Brand Popularity--}}
              {{--</div>--}}
              {{--</div>--}}
              {{--<a class="more" href="javascript:;">--}}
              {{--View more <i class="m-icon-swapright m-icon-white"></i>--}}
              {{--</a>--}}
              {{--</div>--}}
              {{--</div>--}}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@stop

@section('jsPageLevelPlugins')
  <script src="{{ asset('js/vendor.js') }}" type="text/javascript"></script>
@stop

@section('jsFooter')
  <script src="{{ asset('js/app.js') }}" type="text/javascript"></script>
@stop
