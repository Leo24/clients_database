<ul class="nav navbar-nav no-borders">
    <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            {{ Config::get('languages')[App::getLocale()] }}
        </a>
        <ul class="dropdown-menu">
            @foreach (Config::get('languages') as $lang => $language)
                @if ($lang != App::getLocale())
                    <li>
                        <a href="{{ route('lang.switch', $lang) }}">{{$language}}</a>
                    </li>
                @endif
            @endforeach
        </ul>
    </li>
    <li>
        {{--<a href="#" id="sidebar" class="right-sidebar-toggle">--}}
            {{--<i class="pe-7s-upload pe-7s-news-paper"></i>--}}
        {{--</a>--}}
    </li>
    <li class="dropdown">
        <a onclick="event.preventDefault(); document.getElementById('logout').submit();" href="{{ url('/logout') }}">
            <i class="pe-7s-upload pe-rotate-90"></i>
        </a>
    </li>
</ul>
