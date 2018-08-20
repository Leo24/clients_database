@extends('layouts.admin')

@section('content')
    <div class="content animate-panel">
        <div class="row">
            <div class="col-lg-12">
                <div class="hpanel">

                    <div class="panel-body">
                        <form method="POST" action="{{ route('admin.contact.create') }}" enctype="multipart/form-data" class="form-horizontal" novalidate>
                            {{ csrf_field() }}
                            <h3 class="text-center m-b">{{ trans('admin.contact.create_title') }}</h3>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ trans('admin.contact.title') }}</label>
                                <div class="col-sm-10 {{ $errors->has('title') ? 'has-error' : '' }}">
                                    <input name="title" type="text" value="{{ old('title') }}" placeholder="{{ trans('admin.contact.title') }}" class="form-control m-b">
                                    @if ($errors->has('title'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                <label class="col-sm-2 control-label">{{ trans('admin.contact.facebook_link') }}</label>
                                <div class="col-sm-10 {{ $errors->has('facebook_link') ? 'has-error' : '' }}">
                                    <input name="facebook_link" type="text" value="{{ old('facebook_link') }}" placeholder="{{ trans('admin.facebook.title') }}" class="form-control m-b">
                                    @if ($errors->has('facebook_link'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('facebook_link') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                <label class="col-sm-2 control-label">{{ trans('admin.contact.vk_link') }}</label>
                                <div class="col-sm-10 {{ $errors->has('vk_link') ? 'has-error' : '' }}">
                                    <input name="vk_link" type="text" value="{{ old('vk_link') }}" placeholder="{{ trans('admin.vk.title') }}" class="form-control m-b">
                                    @if ($errors->has('vk_link'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('vk_link') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                <label class="col-sm-2 control-label">{{ trans('admin.map.title') }}</label>
                                <div class="col-sm-10 {{ $errors->has('map') ? 'has-error' : '' }}">

                                    <input id="pac-input" type="text" placeholder="Search Box" class="form-control m-b">
                                    <input name="lat" type="text">
                                    <input name="lng" type="text">

                                    @if ($errors->has('map'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('map') }}</strong>
                                    </span>
                                    @endif
                                </div>


                                <label class="col-sm-2 control-label">{{ trans('admin.contact.address') }}</label>
                                <div class="col-sm-10 {{ $errors->has('address') ? 'has-error' : '' }}">
                                <input name="address" type="text" value="{{ old('address') }}" placeholder="{{ trans('admin.contact.address') }}" class="form-control m-b">

                                @if ($errors->has('content'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                <label class="col-sm-2 control-label">{{ trans('admin.contact.phone') }}</label>
                                <div class="col-sm-10 {{ $errors->has('phone') ? 'has-error' : '' }}">
                                    <input name="phone" type="text" value="{{ old('phone') }}" placeholder="{{ trans('admin.contact.phone') }}" class="form-control m-b">
                                    @if ($errors->has('phone'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <label class="col-sm-2 control-label">{{ trans('admin.contact.email') }}</label>
                                <div class="col-sm-10 {{ $errors->has('phone') ? 'has-error' : '' }}">
                                    <input name="email" type="text" value="{{ old('email') }}" placeholder="{{ trans('admin.contact.email') }}" class="form-control m-b">
                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                <label class="col-sm-2 control-label">{{ trans('admin.contact.city') }}</label>
                                <div class="col-sm-10 {{ $errors->has('city') ? 'has-error' : '' }}">
                                    <input name="city" type="text" value="{{ old('city') }}" placeholder="{{ trans('admin.contact.city') }}" class="form-control m-b">
                                    @if ($errors->has('city'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('city') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                <label class="col-sm-2 control-label">{{ trans('admin.contact.language') }}</label>
                                <div class="col-sm-10">
                                    <select class="selectpicker form-control m-b" name="language_code">
                                        @foreach($languages as $language)
                                            <option value="{{$language->code}}" >{{$language->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                {{--<label class="col-sm-2 control-label">{{ trans('admin.contact.picture.name') }}</label>--}}
                                {{--<div class="col-sm-10 {{ $errors->has('picture') ? 'has-error' : '' }}">--}}

                                    {{--@if ($errors->has('picture'))--}}
                                        {{--<div class="help-block">--}}
                                            {{--<strong>{{ $errors->first('picture') }}</strong>--}}
                                        {{--</div>--}}
                                    {{--@endif--}}

                                    {{--<div class="">--}}
                                        {{--<input name="picture" type="file" class="form-control m-b">--}}
                                    {{--</div>--}}

                                {{--</div>--}}

                                <div class="col-sm-8 col-sm-offset-2">
                                    <button class="btn btn-primary" type="submit">{{ trans('admin.save') }}</button>
                                </div>

                            </div>
                        </form>















                        <div class="pac-card" id="pac-card">
                            <div>
                                <div id="title">
                                    Autocomplete search
                                </div>
                                <div id="type-selector" class="pac-controls">
                                    <input type="radio" name="type" id="changetype-all" checked="checked">
                                    <label for="changetype-all">All</label>

                                    <input type="radio" name="type" id="changetype-establishment">
                                    <label for="changetype-establishment">Establishments</label>

                                    <input type="radio" name="type" id="changetype-address">
                                    <label for="changetype-address">Addresses</label>

                                    <input type="radio" name="type" id="changetype-geocode">
                                    <label for="changetype-geocode">Geocodes</label>
                                </div>
                                <div id="strict-bounds-selector" class="pac-controls">
                                    <input type="checkbox" id="use-strict-bounds" value="">
                                    <label for="use-strict-bounds">Strict Bounds</label>
                                </div>
                            </div>
                            <div id="pac-container">
                                <input id="pac-input" type="text"
                                       placeholder="Enter a location">
                            </div>
                        </div>
                        <div id="map"></div>
                        <div id="infowindow-content">
                            <img src="" width="16" height="16" id="place-icon">
                            <span id="place-name"  class="title"></span><br>
                            <span id="place-address"></span>
                        </div>

                        <script>
                            // This example requires the Places library. Include the libraries=places
                            // parameter when you first load the API. For example:
                            // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">

                            function initMap() {
                                var map = new google.maps.Map(document.getElementById('map'), {
                                    center: {lat: -33.8688, lng: 151.2195},
                                    zoom: 13
                                });
                                var card = document.getElementById('pac-card');
                                var input = document.getElementById('pac-input');
                                var types = document.getElementById('type-selector');
                                var strictBounds = document.getElementById('strict-bounds-selector');

                                map.controls[google.maps.ControlPosition.TOP_RIGHT].push(card);

                                var autocomplete = new google.maps.places.Autocomplete(input);


                                // Bind the map's bounds (viewport) property to the autocomplete object,
                                // so that the autocomplete requests use the current map bounds for the
                                // bounds option in the request.
                                autocomplete.bindTo('bounds', map);

                                var infowindow = new google.maps.InfoWindow();
                                var infowindowContent = document.getElementById('infowindow-content');
                                infowindow.setContent(infowindowContent);
                                var marker = new google.maps.Marker({
                                    map: map,
                                    anchorPoint: new google.maps.Point(0, -29)
                                });

                                autocomplete.addListener('place_changed', function() {
                                    infowindow.close();
                                    marker.setVisible(false);
                                    var place = autocomplete.getPlace();
                                    if (!place.geometry) {
                                        // User entered the name of a Place that was not suggested and
                                        // pressed the Enter key, or the Place Details request failed.
                                        window.alert("No details available for input: '" + place.name + "'");
                                        return;
                                    }

                                    // If the place has a geometry, then present it on a map.
                                    if (place.geometry.viewport) {
                                        map.fitBounds(place.geometry.viewport);
                                    } else {
                                        map.setCenter(place.geometry.location);
                                        map.setZoom(17);  // Why 17? Because it looks good.
                                    }
                                    marker.setPosition(place.geometry.location);
                                    marker.setVisible(true);

                                    var address = '';
                                    if (place.address_components) {
                                        address = [
                                            (place.address_components[0] && place.address_components[0].short_name || ''),
                                            (place.address_components[1] && place.address_components[1].short_name || ''),
                                            (place.address_components[2] && place.address_components[2].short_name || '')
                                        ].join(' ');
                                    }

                                    infowindowContent.children['place-icon'].src = place.icon;
                                    infowindowContent.children['place-name'].textContent = place.name;
                                    infowindowContent.children['place-address'].textContent = address;
                                    infowindow.open(map, marker);
                                });

                                // Sets a listener on a radio button to change the filter type on Places
                                // Autocomplete.
                                function setupClickListener(id, types) {
                                    var radioButton = document.getElementById(id);
                                    radioButton.addEventListener('click', function() {
                                        autocomplete.setTypes(types);
                                    });
                                }

                                setupClickListener('changetype-all', []);
                                setupClickListener('changetype-address', ['address']);
                                setupClickListener('changetype-establishment', ['establishment']);
                                setupClickListener('changetype-geocode', ['geocode']);

                                document.getElementById('use-strict-bounds')
                                        .addEventListener('click', function() {
                                            console.log('Checkbox clicked! New state=' + this.checked);
                                            autocomplete.setOptions({strictBounds: this.checked});
                                        });
                            }
                        </script>
                        <script src="https://maps.googleapis.com/maps/api/js?key={{ Config::get('auth.googleMapApiKey')}}&libraries=places&callback=initMap"
                                async defer></script>


                    </div>
                </div>
            </div>
        </div>
    </div>













































@endsection