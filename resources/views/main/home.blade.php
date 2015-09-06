<!DOCTYPE html>
<!--[if IE 8]>
<html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]>
<html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en" class="no-js">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
  <meta charset="utf-8"/>
  <title>@yield('title') | {{ env('APP_NAME', 'Platform') }}</title>
  <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
  <meta content="width=device-width, initial-scale=1" name="viewport"/>
  <meta content="" name="description"/>
  <meta content="" name="author"/>
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/>
  <link href="{{ cdn('themes/metronic410/assets/global/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css"/>
  <link href="{{ cdn('themes/metronic410/assets/global/css/components.css') }}" rel="stylesheet" type="text/css"/>
  <link href="{{ cdn('themes/metronic410/assets/global/css/plugins.css') }}" rel="stylesheet" type="text/css"/>
  <link href="{{ cdn('themes/metronic410/assets/admin/layout/css/layout.css') }}" rel="stylesheet" type="text/css"/>
  <link href="{{ cdn('themes/metronic410/assets/admin/layout/css/themes/default.css') }}" rel="stylesheet" type="text/css" id="style_color"/>
  <link href="{{ cdn('themes/metronic410/assets/admin/layout/css/custom.css') }}" rel="stylesheet" type="text/css"/>
  <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css"/>
  <link href="{{ asset('css/jquery.fullPage.css') }}" rel="stylesheet" type="text/css">
  @yield('css')
    <!-- END THEME STYLES -->
  <script src="{{ cdn('themes/metronic410/assets/global/plugins/jquery.min.js') }}" type="text/javascript"></script>
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<!-- DOC: Apply "page-header-fixed-mobile" and "page-footer-fixed-mobile" class to body element to force fixed header or footer in mobile devices -->
<!-- DOC: Apply "page-sidebar-closed" class to the body and "page-sidebar-menu-closed" class to the sidebar menu element to hide the sidebar by default -->
<!-- DOC: Apply "page-sidebar-hide" class to the body to make the sidebar completely hidden on toggle -->
<!-- DOC: Apply "page-sidebar-closed-hide-logo" class to the body element to make the logo hidden on sidebar toggle -->
<!-- DOC: Apply "page-sidebar-hide" class to body element to completely hide the sidebar on sidebar toggle -->
<!-- DOC: Apply "page-sidebar-fixed" class to have fixed sidebar -->
<!-- DOC: Apply "page-footer-fixed" class to the body element to have fixed footer -->
<!-- DOC: Apply "page-sidebar-reversed" class to put the sidebar on the right side -->
<!-- DOC: Apply "page-full-width" class to the body element to have full width page without the sidebar menu -->
<body>
<div class="fullpage" id="home-fullPage">
  <div class="section">
    <div class="slide" style="background: url('{{ asset('img/slide1.jpg') }}') center; background-size: cover;">
      <div class="slide-fg">
        <div class="slide-center">
          <h2>EFFICIENCY</h2>
          <p>Maximum production throughput by realtime metrics and improved business intelligence</p>
        </div>
      </div>
    </div>
    <div class="slide" style="background: url('{{ asset('img/slide2op1.jpg') }}') center; background-size: cover;">
      <div class="slide-fg">
        <div class="slide-center">
          <h2>MOBILITY</h2>
          <p>Designed for Portability and quick deployment</p>
        </div>
      </div>
    </div>
    <div class="slide" style="background: url('{{ asset('img/server.jpg') }}') center; background-size: cover;">
      <div class="slide-fg">
        <div class="slide-center">
          <h2>PRECISION</h2>
          <p>Weather analytics for maximum affordability</p>
        </div>
      </div>
    </div>
  </div>
</div>
<img src="{{ asset('img/logo.png') }}" style="position: fixed; top: 25px; left: 25px; height: 60px;">
<div style="position: fixed; bottom: 25%; left: 0; width: 100%; text-align: center">
  <a href="/dashboard" class="btn btn-primary btn-lg">Start Now</a>
</div>
<!-- END CONTAINER -->

<script src="{{ asset('js/home.js') }}"></script>
<!-- END JAVASCRIPTS -->

</body>
<!-- END BODY -->
</html>

