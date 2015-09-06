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

  <div data-ng-app="ikazuchi" data-ng-controller="DashboardCtrl as ctrl">
    <h3 class="page-title">
      Dashboard
    </h3>

    <div class="row">
      <div class="col-lg-6">
        <div class="portlet light">
          <div class="portlet-title">
            <div class="caption">
              <i class="icon-bar-chart font-green-sharp hide"></i>
              <span class="caption-subject font-green-sharp bold uppercase">Devices</span>
              <span class="caption-helper" data-ng-if="!ctrl.devices.$resolved">loading&hellip;</span>
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
            <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 300px;"><div class="scroller" style="height: 300px; overflow: hidden; width: auto;" data-always-visible="1" data-rail-visible="0" data-initialized="1">
                <ul class="feeds">
                  <li data-ng-repeat="device in ctrl.devices">
                    <a href="#" data-ng-click="ctrl.getDevice(device.id)">
                      <div class="col1">
                        <div class="cont">
                          <div class="cont-col1">
                            <div class="label label-sm label-info">
                              <i class="fa fa-check"></i>
                            </div>
                          </div>
                          <div class="cont-col2">
                            <div class="desc" data-ng-bind="device.serial_no"></div>
                          </div>
                        </div>
                      </div>
                      <div class="col2">
                        <div class="date" data-ng-bind="device.updated_at"></div>
                      </div>
                    </a>
                  </li>
                </ul>
              </div><div class="slimScrollBar" style="width: 7px; position: absolute; top: 0px; opacity: 0.4; display: block; border-radius: 7px; z-index: 99; right: 1px; height: 166.358595194085px; background: rgb(187, 187, 187);"></div><div class="slimScrollRail" style="width: 7px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; opacity: 0.2; z-index: 90; right: 1px; background: rgb(234, 234, 234);"></div></div>
          </div>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="portlet light" data-ng-if="!ctrl.currentDevice">
          <div class="portlet-body">
            Please select a device.
          </div>
        </div>
        <div class="portlet light" data-ng-if="!!ctrl.currentDevice">
          <div class="portlet-title">
            <div class="caption">
              <i class="icon-equalizer font-purple-plum hide"></i>
              <span class="caption-subject font-red-sunglo bold uppercase">Device Info</span>
              <span class="caption-helper" data-ng-if="!ctrl.currentDevice.$resolved">loading&hellip;</span>
            </div>
            <div class="actions">
              <div class="btn-group">
                <a href="" class="btn grey-salsa btn-circle btn-sm dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true" aria-expanded="false">
                  @{{ ctrl.periods[ctrl.params.period] }}
                  <span class="fa fa-angle-down"></span>
                </a>
                <ul class="dropdown-menu pull-right">
                  <li data-ng-repeat="(value, label) in ctrl.periods" data-ng-class="{ 'active': ctrl.params.period === value }"><a data-ng-click="ctrl.changePeriod(value)" data-ng-bind="label"></a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="portlet-body">
            <div class="row">
              <div class="col-md-4">
                  {{--<div class="number" id="sparkline_bar"><canvas width="113" height="55" style="display: inline-block; width: 113px; height: 55px; vertical-align: top;"></canvas></div>--}}
                <flot width="100%" height="150px" dataset="ctrl.chartData['Temperature']"></flot>
                <a class="title" href="javascript:;">
                  Temperature <i class="icon-arrow-right"></i>
                </a>
              </div>
              <div class="margin-bottom-10 visible-sm">
              </div>
              <div class="col-md-4">
                  {{--<div class="number" id="sparkline_bar2"><canvas width="107" height="55" style="display: inline-block; width: 107px; height: 55px; vertical-align: top;"></canvas></div>--}}
                <flot width="100%" height="150px" dataset="ctrl.chartData['Humidity']"></flot>
                <a class="title" href="javascript:;">
                  Humidity <i class="icon-arrow-right"></i>
                </a>
              </div>
              <div class="margin-bottom-10 visible-sm">
              </div>
              <div class="col-md-4">
                  {{--<div class="number" id="sparkline_line"><canvas width="100" height="55" style="display: inline-block; width: 100px; height: 55px; vertical-align: top;"></canvas></div>--}}
                <flot width="100%" height="150px" dataset="ctrl.chartData['Water Level']"></flot>
                <a class="title" href="javascript:;">
                  Water Level (meters) <i class="icon-arrow-right"></i>
                </a>
              </div>
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
