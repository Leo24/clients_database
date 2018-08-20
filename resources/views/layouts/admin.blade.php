<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Юридичне бюро') }}</title>

    <!-- Vendor styles -->
    <link rel="stylesheet" href="/vendor/fontawesome/css/font-awesome.css" />
    <link rel="stylesheet" href="/vendor/metisMenu/dist/metisMenu.css" />
    <link rel="stylesheet" href="/vendor/animate.css/animate.css" />
    <link rel="stylesheet" href="/vendor/bootstrap/dist/css/bootstrap.css" />
    <link rel="stylesheet" href="/vendor/select2-3.5.2/select2.css" />
    <link rel="stylesheet" href="/vendor/select2-bootstrap/select2-bootstrap.css" />

    <link rel="stylesheet" href="/vendor/summernote/dist/summernote.css" />
    <link rel="stylesheet" href="/vendor/summernote/dist/summernote-bs3.css" />

    <!-- App styles -->
    <link rel="stylesheet" href="/fonts/pe-icon-7-stroke/css/pe-icon-7-stroke.css" />
    <link rel="stylesheet" href="/fonts/pe-icon-7-stroke/css/helper.css" />
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/bootstrap-datepicker-1.6.4/css/bootstrap-datepicker.min.css">
    <link rel="stylesheet" href="/js/sweetalert/lib/sweet-alert.css">
    <link rel="stylesheet" href="/js/toastr/build/toastr.min.css">
    <link rel="stylesheet" href="/css/custom.css">

    <!-- Scripts -->
    <script>
        window.Laravel =<?php echo json_encode(['csrfToken' => csrf_token(),]); ?>
    </script>

</head>
<body class="fixed-navbar fixed-sidebar">

<div id="header">
    <div class="color-line">
    </div>
    <div id="logo" class="light-version">
            <span>{{ trans('admin.title') }}</span>
    </div>
    <nav role="navigation">
        <div class="header-link hide-menu"><i class="fa fa-bars"></i></div>
        <div class="small-logo">
            <span class="text-primary">{{ trans('admin.home.title') }}</span>
        </div>



        <div class="mobile-menu">
            <button type="button" class="navbar-toggle mobile-menu-toggle" data-toggle="collapse" data-target="#mobile-collapse">
                <i class="fa fa-chevron-down"></i>
            </button>
            <div class="collapse mobile-navbar" id="mobile-collapse">
                <ul class="nav navbar-nav">
                    <li>
                        <a class="" href="">{{ trans('menu.my_profile') }}</a>
                    </li>
                    <li>
                        <a onclick="event.preventDefault(); document.getElementById('logout').submit();" class="" href="">{{ trans('menu.logout') }}</a>
                    </li>
                </ul>
            </div>
        </div>
        {{--<div class="navbar-right">--}}
            {{--@include('admin._navbar-right')--}}
        {{--</div>--}}
    </nav>
</div>


<aside id="menu">
    @include('admin._side-menu')
</aside>

<div id="wrapper">
    @yield('content')
</div>

<!-- Right sidebar -->
<div id="right-sidebar" class="animated fadeInRight">

    <div class="p-m">
        <button id="sidebar-close" class="right-sidebar-toggle sidebar-button btn btn-default m-b-md"><i class="pe pe-7s-close"></i>
        </button>
        <div>
            <span class="font-bold no-margins"> Analytics </span>
            <br>
            <small> Lorem Ipsum is simply dummy text of the printing simply all dummy text.</small>
        </div>
        <div class="row m-t-sm m-b-sm">
            <div class="col-lg-6">
                <h3 class="no-margins font-extra-bold text-success">300,102</h3>

                <div class="font-bold">98% <i class="fa fa-level-up text-success"></i></div>
            </div>
            <div class="col-lg-6">
                <h3 class="no-margins font-extra-bold text-success">280,200</h3>

                <div class="font-bold">98% <i class="fa fa-level-up text-success"></i></div>
            </div>
        </div>
        <div class="progress m-t-xs full progress-small">
            <div style="width: 25%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="25" role="progressbar"
                 class=" progress-bar progress-bar-success">
                <span class="sr-only">35% Complete (success)</span>
            </div>
        </div>
    </div>
    <div class="p-m bg-light border-bottom border-top">
        <span class="font-bold no-margins"> Social talks </span>
        <br>
        <small> Lorem Ipsum is simply dummy text of the printing simply all dummy text.</small>
        <div class="m-t-md">
            <div class="social-talk">
                <div class="media social-profile clearfix">
                    <a class="pull-left">
                        <img src="images/a1.jpg" alt="profile-picture">
                    </a>

                    <div class="media-body">
                        <span class="font-bold">John Novak</span>
                        <small class="text-muted">21.03.2015</small>
                        <div class="social-content small">
                            Injected humour, or randomised words which don't look even slightly believable.
                        </div>
                    </div>
                </div>
            </div>
            <div class="social-talk">
                <div class="media social-profile clearfix">
                    <a class="pull-left">
                        <img src="images/a3.jpg" alt="profile-picture">
                    </a>

                    <div class="media-body">
                        <span class="font-bold">Mark Smith</span>
                        <small class="text-muted">14.04.2015</small>
                        <div class="social-content">
                            Many desktop publishing packages and web page editors.
                        </div>
                    </div>
                </div>
            </div>
            <div class="social-talk">
                <div class="media social-profile clearfix">
                    <a class="pull-left">
                        <img src="images/a4.jpg" alt="profile-picture">
                    </a>

                    <div class="media-body">
                        <span class="font-bold">Marica Morgan</span>
                        <small class="text-muted">21.03.2015</small>

                        <div class="social-content">
                            There are many variations of passages of Lorem Ipsum available, but the majority have
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="p-m">
        <span class="font-bold no-margins"> Sales in last week </span>
        <div class="m-t-xs">
            <div class="row">
                <div class="col-xs-6">
                    <small>Today</small>
                    <h4 class="m-t-xs">$170,20 <i class="fa fa-level-up text-success"></i></h4>
                </div>
                <div class="col-xs-6">
                    <small>Last week</small>
                    <h4 class="m-t-xs">$580,90 <i class="fa fa-level-up text-success"></i></h4>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-6">
                    <small>Today</small>
                    <h4 class="m-t-xs">$620,20 <i class="fa fa-level-up text-success"></i></h4>
                </div>
                <div class="col-xs-6">
                    <small>Last week</small>
                    <h4 class="m-t-xs">$140,70 <i class="fa fa-level-up text-success"></i></h4>
                </div>
            </div>
        </div>
        <small> Lorem Ipsum is simply dummy text of the printing simply all dummy text.
            Many desktop publishing packages and web page editors.
        </small>
    </div>

</div>

<form id="data-url" action="">
    {{ csrf_field() }}
</form>

<!-- Vendor scripts -->
<script src="/vendor/jquery/dist/jquery.min.js"></script>
<script src="/vendor/jquery-ui/jquery-ui.min.js"></script>
<script src="/vendor/slimScroll/jquery.slimscroll.min.js"></script>
<script src="/vendor/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="/vendor/jquery-flot/jquery.flot.js"></script>
<script src="/vendor/jquery-flot/jquery.flot.resize.js"></script>
<script src="/vendor/jquery-flot/jquery.flot.pie.js"></script>
<script src="/vendor/flot.curvedlines/curvedLines.js"></script>
<script src="/vendor/jquery.flot.spline/index.js"></script>
<script src="/vendor/metisMenu/dist/metisMenu.min.js"></script>
<script src="/vendor/iCheck/icheck.min.js"></script>
<script src="/vendor/peity/jquery.peity.min.js"></script>
<script src="/vendor/sparkline/index.js"></script>
<script src="/vendor/select2-3.5.2/select2.min.js"></script>
<script src="/vendor/summernote/dist/summernote.min.js"></script>

<!-- App scripts -->
<script src="{{asset('/js/homer.js')}}"></script>
<script src="{{asset('/js/bootstrap-datepicker-1.6.4/js/bootstrap-datepicker.min.js')}}"></script>
<script src="{{asset('/js/jQuery-Mask-Plugin/src/jquery.mask.js')}}"></script>
<script src="{{asset('/js/bootstrap3-typeahead.js')}}"></script>
<script src="{{asset('/js/sweetalert/lib/sweet-alert.min.js')}}"></script>
<script src="{{asset('/js/toastr/build/toastr.min.js')}}"></script>
<script src="{{asset('/js/tinymce/js/tinymce/tinymce.min.js')}}"></script>
<script>tinymce.init({
        selector: "textarea",
        height: 150,
        plugins: [
            "advlist autolink autosave link image lists charmap print preview hr anchor pagebreak spellchecker",
            "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
            "table contextmenu directionality emoticons template textcolor paste fullpage textcolor colorpicker textpattern"
        ],

        toolbar1: "newdocument fullpage | bold italic underline strikethrough | alignleft aligncenter alignright alignjustify | styleselect formatselect fontselect fontsizeselect",
        toolbar2: "cut copy paste | searchreplace | bullist numlist | outdent indent blockquote | undo redo | link unlink anchor image media code | insertdatetime preview | forecolor backcolor",
        toolbar3: "table | hr removeformat | subscript superscript | charmap emoticons | print fullscreen | ltr rtl | spellchecker | visualchars visualblocks nonbreaking template pagebreak restoredraft",

        menubar: false,
        toolbar_items_size: 'small',

        style_formats: [{
            title: 'Bold text',
            inline: 'b'
        }, {
            title: 'Red text',
            inline: 'span',
            styles: {
                color: '#ff0000'
            }
        }, {
            title: 'Red header',
            block: 'h1',
            styles: {
                color: '#ff0000'
            }
        }, {
            title: 'Example 1',
            inline: 'span',
            classes: 'example1'
        }, {
            title: 'Example 2',
            inline: 'span',
            classes: 'example2'
        }, {
            title: 'Table styles'
        }, {
            title: 'Table row 1',
            selector: 'tr',
            classes: 'tablerow1'
        }],

        templates: [{
            title: 'Test template 1',
            content: 'Test 1'
        }, {
            title: 'Test template 2',
            content: 'Test 2'
        }],
        content_css: [
            '//fast.fonts.net/cssapi/e6dc9b99-64fe-4292-ad98-6974f93cd2a2.css',
            '//www.tinymce.com/css/codepen.min.css'
        ]
    });</script>

</body>
</html>



