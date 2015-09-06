<!DOCTYPE html>
<!--[if IE 8]>
<html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]>
<html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
    <meta charset="utf-8"/>
    <title>
        @section('title')
            {{ env('APP_NAME', 'Platform') }}
        @show
    </title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8">
    <meta content="Kryo" name="description"/>
    <meta content="Kryo" name="author"/>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    {{--<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/>--}}
    <link href="{{ cdn('themes/metronic362/global/plugins/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ cdn('themes/metronic362/global/plugins/simple-line-icons/simple-line-icons.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ cdn('themes/metronic362/global/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ cdn('themes/metronic362/global/plugins/uniform/css/uniform.default.css') }}" rel="stylesheet" type="text/css"/>
    <!-- END GLOBAL MANDATORY STYLES -->
    <!-- BEGIN PAGE LEVEL STYLES -->
    <link href="{{ cdn('themes/metronic362/admin/pages/css/login.css') }}" rel="stylesheet" type="text/css"/>
    <!-- END PAGE LEVEL SCRIPTS -->
    <!-- BEGIN THEME STYLES -->
    <link href="{{ cdn('themes/metronic362/global/css/components.css') }}" id="style_components" rel="stylesheet" type="text/css"/>
    <link href="{{ cdn('themes/metronic362/global/css/plugins.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ cdn('themes/metronic362/admin/layout/css/layout.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ cdn('themes/metronic362/admin/layout/css/themes/default.css') }}" rel="stylesheet" type="text/css" id="style_color"/>
    <link href="{{ cdn('themes/metronic362/admin/layout/css/custom.css') }}" rel="stylesheet" type="text/css"/>
    <!-- END THEME STYLES -->
    @yield('css')
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}"/>
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="login">
<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
<div class="menu-toggler sidebar-toggler">
</div>
<!-- END SIDEBAR TOGGLER BUTTON -->
<!-- BEGIN LOGO -->
<div class="logo">
    <a href="{{ url('/') }}">
        <img src="{{ asset('img/logo.png') }}" alt="logo" class="logo-default" style="margin-top: 8px; height: 75px;">
    </a>
</div>
<!-- END LOGO -->
<!-- BEGIN LOGIN -->
<div class="content">
    @yield('content')
</div>
<div class="copyright">
    {{ date('Y') }} &copy; {{ env('APP_NAME', 'Platform') }}
</div>
<!-- END LOGIN -->
<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<!-- BEGIN CORE PLUGINS -->
<!--[if lt IE 9]>
<script src="{{ cdn('themes/metronic362/global/plugins/respond.min.js') }}"></script>
<script src="{{ cdn('themes/metronic362/global/plugins/excanvas.min.js') }}"></script>
<![endif]-->
<script src="{{ cdn('themes/metronic362/global/plugins/jquery.min.js') }}" type="text/javascript"></script>
<script src="{{ cdn('themes/metronic362/global/plugins/jquery-migrate.min.js') }}" type="text/javascript"></script>
<script src="{{ cdn('themes/metronic362/global/plugins/bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script>
<script src="{{ cdn('themes/metronic362/global/plugins/jquery.blockui.min.js') }}" type="text/javascript"></script>
<script src="{{ cdn('themes/metronic362/global/plugins/uniform/jquery.uniform.min.js') }}" type="text/javascript"></script>
<script src="{{ cdn('themes/metronic362/global/plugins/jquery.cokie.min.js') }}" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="{{ cdn('themes/metronic362/global/plugins/jquery-validation/js/jquery.validate.min.js') }}" type="text/javascript"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="{{ cdn('themes/metronic362/global/scripts/metronic.js') }}" type="text/javascript"></script>
<script src="{{ cdn('themes/metronic362/admin/layout/scripts/layout.js') }}" type="text/javascript"></script>
<script src="{{ cdn('themes/metronic362/admin/layout/scripts/demo.js') }}" type="text/javascript"></script>
<script src="{{ cdn('themes/metronic362/admin/pages/scripts/login.js') }}" type="text/javascript"></script>
<!-- END PAGE LEVEL SCRIPTS -->
<script>
    jQuery(document).ready(function () {
        Metronic.init(); // init metronic core components
        Layout.init(); // init current layout
        Login.init();
    });
</script>
<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>
