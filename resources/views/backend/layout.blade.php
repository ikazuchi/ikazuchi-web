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
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/>
    <link href="{{ cdn('themes/metronic410/assets/global/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ cdn('themes/metronic410/assets/global/plugins/fontawesome/css/fontawesome.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ cdn('themes/metronic410/assets/global/plugins/uniform/css/uniform.default.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ cdn('themes/metronic410/assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css') }}" rel="stylesheet" type="text/css"/>
    <!-- END GLOBAL MANDATORY STYLES -->

    <!-- BEGIN PAGE LEVEL PLUGIN STYLES -->
    @yield('cssPageLevelPlugin')
            <!-- END PAGE LEVEL PLUGIN STYLES -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css"/>
    <!-- BEGIN THEME STYLES -->
    <link href="{{ cdn('themes/metronic410/assets/global/css/components.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ cdn('themes/metronic410/assets/global/css/plugins.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ cdn('themes/metronic410/assets/admin/layout/css/layout.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ cdn('themes/metronic410/assets/admin/layout/css/themes/default.css') }}" rel="stylesheet" type="text/css" id="style_color"/>
    <link href="{{ cdn('themes/metronic410/assets/admin/layout/css/custom.css') }}" rel="stylesheet" type="text/css"/>

    <link href="{{ asset('css/vendor.css') }}" rel="stylesheet" type="text/css"/>
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
<body class="page-header-fixed page-quick-sidebar-over-content page-full-width">
<!-- BEGIN HEADER -->
<div class="page-header navbar navbar-fixed-top">
    <!-- BEGIN HEADER INNER -->
    <div class="page-header-inner">
        <!-- BEGIN LOGO -->
        <div class="page-logo">
            <a href="/">
                <img src="{{ asset('img/logo.png') }}" alt="logo" class="logo-default" style="margin-top: 6px; height: 35px;">
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
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                        <span class="username username-hide-on-mobile">{{ 'Hi, ' . Auth::user()->name }}</span>
                        <i class="fa fa-angle-down"></i>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="{{ url('auth/logout') }}">
                                <i class="fa fa-key"></i> Log Out </a>
                        </li>
                    </ul>
                </li>
                <!-- END USER LOGIN DROPDOWN -->
            </ul>
        </div>
        <!-- END TOP NAVIGATION MENU -->
    </div>
    <!-- END HEADER INNER -->
</div>
<!-- END HEADER -->
<div class="clearfix">
</div>
<!-- BEGIN CONTAINER -->
<div class="page-container">

    <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper">
        <div class="page-content">

            @include('backend.flash')

            @yield('content')

        </div>
    </div>
    <!-- END CONTENT -->
</div>
<!-- END CONTAINER -->
<!-- BEGIN FOOTER -->
<div class="page-footer">
    <div class="page-footer-inner">
        {{ date('Y') }} &copy; {{ env('APP_NAME', 'Platform') }} by <a href="https://github.com/coreproc" target="_blank">@coreproc</a>
    </div>
    <div class="scroll-to-top">
        <i class="icon-arrow-up"></i>
    </div>
</div>
<!-- END FOOTER -->

<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<!-- BEGIN CORE PLUGINS -->
<!--[if lt IE 9]>
<script src="{{ cdn('themes/metronic410/assets/global/plugins/respond.min.js') }}"></script>
<script src="{{ cdn('themes/metronic410/assets/global/plugins/excanvas.min.js') }}"></script>
<![endif]-->
<script src="{{ cdn('themes/metronic410/assets/global/plugins/jquery-migrate.min.js') }}" type="text/javascript"></script>
<script src="{{ cdn('themes/metronic410/assets/global/plugins/bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script>
<script src="{{ cdn('themes/metronic410/assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js') }}" type="text/javascript"></script>
<script src="{{ cdn('themes/metronic410/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js') }}" type="text/javascript"></script>
<script src="{{ cdn('themes/metronic410/assets/global/plugins/jquery.blockui.min.js') }}" type="text/javascript"></script>
<script src="{{ cdn('themes/metronic410/assets/global/plugins/jquery.cokie.min.js') }}" type="text/javascript"></script>
<script src="{{ cdn('themes/metronic410/assets/global/plugins/uniform/jquery.uniform.min.js') }}" type="text/javascript"></script>
<script src="{{ cdn('themes/metronic410/assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js') }}" type="text/javascript"></script>
<script src="{{ cdn('themes/metronic410/assets/global/plugins/select2/select2.min.js') }}" type="text/javascript"></script>
<script src="{{ cdn('themes/metronic410/assets/global/plugins/datatables/media/js/jquery.dataTables.min.js') }}" type="text/javascript"></script>
<script src="{{ cdn('themes/metronic410/assets/global/plugins/datatables/extensions/TableTools/js/dataTables.tableTools.min.js') }}" type="text/javascript"></script>
<script src="{{ cdn('themes/metronic410/assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js') }}" type="text/javascript"></script>
<script src="{{ cdn('themes/metronic410/assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}" type="text/javascript"></script>
<!-- END CORE PLUGINS -->

<!-- BEGIN PAGE LEVEL PLUGINS -->
<!-- IMPORTANT! fullcalendar depends on jquery-ui-1.10.3.custom.min.js for drag & drop support -->
@yield('jsPageLevelPlugins')
        <!-- END PAGE LEVEL PLUGINS -->

<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="{{ cdn('themes/metronic410/assets/global/scripts/metronic.js') }}" type="text/javascript"></script>
<script src="{{ cdn('themes/metronic410/assets/admin/layout/scripts/layout.js') }}" type="text/javascript"></script>
@yield('jsPageLevelScripts')
        <!-- END PAGE LEVEL SCRIPTS -->
<script>
    jQuery(document).ready(function () {
        // initiate layout and plugins
        Metronic.init(); // init metronic core components
        Layout.init(); // init metronic core components
    });
</script>
@yield('jsFooter')
<script src="{{ asset('js/vendor.js') }}" type="text/javascript"></script>
<!-- END JAVASCRIPTS -->

</body>
<!-- END BODY -->
</html>
