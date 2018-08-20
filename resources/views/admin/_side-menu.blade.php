<div id="navigation">
    <div class="profile-picture">
        @if(isset($photo))
            <a href="{{ route('profile.index') }}">
                <img src="{{ asset($photo) }}" class="img-circle m-b" alt="logo" style="max-width: 50%;">
            </a>
        @endif
        <div class="stats-label text-color">
            <span class="font-extra-bold font-uppercase">
            </span>

        </div>
    </div>


    <ul class="nav" id="side-menu">
        <li class="{{ Request::url() == route('cars.index') ? 'active' : '' }}" >
            <a href="{{route('cars.index')}}">
                <span class="nav-label">Автомобили</span>
            </a>
        </li>
        <li class="{{ Request::url() == route('visits.index') ? 'active' : '' }}" >
            <a href="{{route('visits.index')}}">
                <span class="nav-label">Визиты</span>
            </a>
        </li>
        {{--<li class="{{ Request::url() == route('admin.service.index') ? 'active' : '' }}" >--}}
            {{--<a href="{{route('admin.service.index')}}">--}}
                {{--<span class="nav-label">{{ trans('admin.dashboard.services') }}</span>--}}
            {{--</a>--}}
        {{--</li>--}}
        {{--<li class="{{ Request::url() == route('admin.article.index') ? 'active' : '' }}" >--}}
        {{--<a href="{{route('admin.article.index')}}">--}}
                {{--<span class="nav-label">{{ trans('admin.dashboard.articles') }}</span>--}}
            {{--</a>--}}
        {{--</li>--}}
        {{--<li class="{{ Request::url() == route('admin.category.index') ? 'active' : '' }}" >--}}
            {{--<a href="{{route('admin.category.index')}}">--}}
                {{--<span class="nav-label">{{ trans('admin.dashboard.categories') }}</span>--}}
            {{--</a>--}}
        {{--</li>--}}
        {{--<li class="{{ Request::url() == route('admin.contacts.index') ? 'active' : '' }}" >--}}
            {{--<a href="{{route('admin.contacts.index')}}">--}}
                {{--<span class="nav-label">{{ trans('admin.dashboard.contacts') }}</span>--}}
            {{--</a>--}}
        {{--</li>--}}

        {{--<li class="{{ Request::url() == route('admin.orders.index') ? 'active' : '' }}" >--}}
            {{--<a href="{{route('admin.orders.index')}}">--}}
                {{--<span class="nav-label">{{ trans('admin.dashboard.orders') }}</span>--}}
            {{--</a>--}}
        {{--</li>--}}

    </ul>
</div>
