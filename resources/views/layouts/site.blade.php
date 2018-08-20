<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{trans('seo.name')}}</title>
    <meta name="Description" content="{{trans('seo.description')}}">
    <meta name="Keywords" content="{{trans('seo.keywords')}}">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">



    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="shortcut icon" href="{{asset('css/img/favicon.png')}}">
    <link rel="stylesheet" href="{{asset('/css/bootstrap/css/bootstrap.css')}}" />
    <link rel="stylesheet" href="{{asset('/js/FlexSlider/flexslider.css')}}" />
    <link rel="stylesheet" href="{{asset('/js/bxslider/dist/jquery.bxslider.min.css')}}" />
    <link rel="stylesheet" href="{{asset('/js/unitegallery/dist/css/unite-gallery.css')}}" />
    <link rel="stylesheet" href="{{asset('/js/unitegallery/dist/themes/default/ug-theme-default.css')}}" />
    <link rel="stylesheet" href="{{asset('/js/slickNav/dist/slicknav.min.css')}}" />
    <link rel="stylesheet" href="{{asset('css/jurburo-styles.css')}}" />
    <link rel="stylesheet" href="{{asset('css/custom.css')}}" />

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>

    <!-- google -->
    <script type="text/javascript" async="" src="http://mc.yandex.ru/metrika/watch.js"></script>
    <script async="" src="//www.google-analytics.com/analytics.js"></script>
    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
                m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-51702049-1', 'jurburo.com.ua');
        ga('send', 'pageview');

    </script>

</head>

<body>
<h1 class="site-main-header">{{trans('seo.name')}}</h1>
<div id="page" class="hfeed site">
    <div id="menu2"></div>
    <header class="site-header container-fluid">
        <div class="container">
            <div class="col-md-6 col-sm-7 col-xs-9">
                <span class="address ">
                       {!! $contact->city !!} {!! $contact->address !!}
                </span>
            </div>
            <div class="col-md-offset-2 col-md-2 col-sm-5 col-xs-12">
                <span class="phone">{!! $contact->phone !!}</span>
            </div>
            <div class="socials col-md-2 col-sm-5 col-xs-12">
                <a class="facebook-icon" href="{!! $contact->facebook_link !!}">
                    <img src="{{asset('css/img/facebook-icon.png')}}" alt="facebook-icon">
                </a>
                <a class="vk-icon" href="{!! $contact->vk_link !!}">
                    <img src="{{asset('css/img/vk-icon.png')}}" alt="vk-icon">
                </a>
            </div>


            <div class="language-select">
                <div class="btn-group language-select-picker">
                    <a class=" dropdown-toggle" data-toggle="dropdown" href="#">{{ App::getLocale()}}<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        @foreach (Config::get('languages') as $lang => $language)
                            @if ($lang != App::getLocale())
                                <li>
                                    <a href="{{ route('lang.switch', $lang) }}">{{$lang}}</a>
                                </li>
                            @endif
                        @endforeach
                    </ul>
                </div>


            </div>


        </div>
    </header>
    <section class="site-menu container-fluid">
        <div class="container">
            <img class="site-logo" src="{{asset('css/img/site-logo.png')}}" alt="site-logo">

            <div class="menu-main-menu-container">
                <ul id="menu-main-menu" class="menu">
                    <li class="{{ Request::url() == route('site.index') ? 'current-menu-item ' : '' }}"><a href="{{route('site.index')}}">{{trans('main.menu.main_page')}}</a></li>
                    <li class="{{ Request::url() == route('site.services') ? 'current-menu-item ' : '' }}"><a href="{{route('site.services')}}">{{trans('main.menu.services')}}</a></li>
                    {{--                    <li class="{{ Request::url() == route('site.events') ? 'current-menu-item ' : '' }}"><a href="{{route('site.events')}}">{{trans('main.menu.events')}}</a></li>--}}
                    <li class="{{ Request::url() == route('site.contact') ? 'current-menu-item ' : '' }}"><a href="{{route('site.contact')}}">{{trans('main.menu.contacts')}}</a></li>
                    <li class="{{ Request::url() == route('site.about') ? 'current-menu-item ' : '' }}"><a href="{{route('site.about')}}">{{trans('main.menu.about')}}</a></li>
                    <li class="{{ Request::url() == route('site.news') ? 'current-menu-item ' : '' }}"><a href="{{route('site.news')}}">{{trans('main.menu.news')}}</a></li>
                </ul></div>
        </div>
    </section>

    @yield('content')

    @if(Request::url() != route('site.contact') )
        <footer class="block-5 container-fluid">
            <div class="container">
                <div class="social-linls col-sm-5 col-xs-12">
                    <a class="facebook-icon col-sm-12 col-xs-6" href="{!! $contact->facebook_link !!}">
                        <i class="facebook-footer-icon center-block"></i>
                    </a>
                    <a class="vk-icon col-sm-12 col-xs-6" href="{!! $contact->vk_link !!}">
                        <i class="vk-footer-icon center-block"></i>
                    </a>
                </div>
                <div class="contact-info col-sm-7 col-xs-12">
                    <div class="wrapper col-sm-9 center-block">
                        <p class="title">
                        <span>
                            {{trans('main.site.footer_contact_title')}}
                        </span>
                        </p>
                        <p class="address">
                        <span>
                            {!! $contact->city !!}
                        </span>
                        </p>
                        <p class="address">
                        <span>
                            {!! $contact->address !!}
                        </span>
                        </p>
                        <p class="phone">
                        <span>
                            {{trans('main.site.contacts.phone')}}
                        </span>
                            <span class="phone-number">
                            {!! $contact->phone !!}
                        </span>
                        </p>
                        <p class="email">
                            <span>
                            email:
                        </span>
                            <span>
                            {!! $contact->email !!}
                        </span>
                        </p>
                    </div>
                </div>
            </div>
        </footer>
    @endif
</div>

<script src="{{asset('/js/jquery-3.2.0.min.js')}}"></script>
<script src="{{asset('/js/jquery-ui-1.12.1/jquery-ui.min.js')}}"></script>
<script src="{{asset('/css/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{asset('/js/FlexSlider/jquery.flexslider-min.js')}}"></script>
<script src="{{asset('/js/bxslider/dist/jquery.bxslider.min.js')}}"></script>
<script src="{{asset('/js/unitegallery/dist/js/unitegallery.min.js')}}"></script>
<script src="{{asset('/js/unitegallery/dist/themes/carousel/ug-theme-carousel.js')}}"></script>
<script src="{{asset('/js/jQuery-Mask-Plugin/src/jquery.mask.js')}}"></script>
<script src="{{asset('/js/slickNav/dist/jquery.slicknav.min.js')}}"></script>
<script src="{{asset('js/main.js')}}"></script>

<script type="text/javascript">(function (d, w, c) { (w[c] = w[c] || []).push(function() { try { w.yaCounter25187639 = new Ya.Metrika({id:25187639, webvisor:true, clickmap:true, trackLinks:true, accurateTrackBounce:true}); } catch(e) { } }); var n = d.getElementsByTagName("script")[0], s = d.createElement("script"), f = function () { n.parentNode.insertBefore(s, n); }; s.type = "text/javascript"; s.async = true; s.src = (d.location.protocol == "https:" ? "https:" : "http:") + "//mc.yandex.ru/metrika/watch.js"; if (w.opera == "[object Opera]") { d.addEventListener("DOMContentLoaded", f, false); } else { f(); } })(document, window, "yandex_metrika_callbacks");</script>

</body>
</html>
