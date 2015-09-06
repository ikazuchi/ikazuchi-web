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
<div class="page-header navbar navbar-fixed-top">
  <!-- BEGIN HEADER INNER -->
  <div class="page-header-inner">
    <!-- BEGIN LOGO -->
    <div class="page-logo">
      <a href="#">
        <img src="{{ asset('img/posible_logo.png') }}" alt="logo" class="logo-default" style="margin-top: 6px; height: 35px;">
      </a>

      <div class="menu-toggler sidebar-toggler hide">
        <!-- DOC: Remove the above "hide" to enable the sidebar toggler button on header -->
      </div>
    </div>
    <!-- END LOGO -->
    <!-- BEGIN RESPONSIVE MENU TOGGLER -->
    <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
    </a>
    <!-- END RESPONSIVE MENU TOGGLER -->
    <!-- BEGIN TOP NAVIGATION MENU -->
    <div class="top-menu">
      <ul class="nav navbar-nav pull-right">
        <!-- BEGIN USER LOGIN DROPDOWN -->
        <li class="dropdown dropdown-user">
          <a href="#modal-login" data-toggle="modal" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
            <span class="username username-hide-on-mobile">Login</span>
            <i class="fa fa-angle-down"></i>
          </a>
        </li>
        <!-- END USER LOGIN DROPDOWN -->
      </ul>
    </div>
    <!-- END TOP NAVIGATION MENU -->
  </div>
  <!-- END HEADER INNER -->
</div>
<div class="fullpage" id="home-fullPage">
  <div class="section">
    <div class="slide" style="background: url('{{ asset('img/slide1.jpg') }}') center; background-size: cover;">
      <div class="slide-fg">
        <div class="slide-center">
          <h2>Production.</h2>
          <p>Conserve our precious resources.</p>
        </div>
      </div>
    </div>
    <div class="slide" style="background: url('{{ asset('img/slide2op1.jpg') }}') center; background-size: cover;">
      <div class="slide-fg">
        <div class="slide-center">
          <h2>Protection.</h2>
          <p>Protect home and family.</p>
        </div>
      </div>
    </div>
    <div class="slide" style="background: url('{{ asset('img/slide2op2.jpg') }}') center; background-size: cover;">
      <div class="slide-fg">
        <div class="slide-center">
          <h2>Precision</h2>
          <p>Subtitle.</p>
        </div>
      </div>
    </div>
  </div>
</div>

<div id="modal-login" class="modal">

</div>
<!-- END CONTAINER -->

<script src="{{ asset('js/home.js') }}"></script>
<!-- END JAVASCRIPTS -->

</body>
<!-- END BODY -->
</html>

