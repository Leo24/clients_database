@extends('layouts.site')

@section('content')
    <section class="block-1 container-fluid">
        <div class="container contact-header">
            <h2 class="col-sm-2 center-block">{{trans('main.site.contacts.page_title')}}</h2>
        </div>
    </section>

    <section class="google-map container-fluid">
        <div id="google_map">
            <div id="map" style="width: 100%; height: 500px;"></div>
            <script src='http://maps.googleapis.com/maps/api/js?sensor=false&key={{ Config::get('auth.googleMapApiKey')}}' type='text/javascript'></script>
            <script type="text/javascript">
                //<![CDATA[
                function load() {
                    var lat = '{{$contact->lat}}';
                    var lng = '{{$contact->lng}}';
                    // coordinates to latLng
                    var latlng = new google.maps.LatLng(lat, lng);
                    // map Options
                    var myOptions = {
                        zoom: 16,
                        center: latlng,
                        mapTypeId: google.maps.MapTypeId.ROADMAP,
                        scrollwheel: false
                    };
                    //draw a map
                    var map = new google.maps.Map(document.getElementById("map"), myOptions);
                    var marker = new google.maps.Marker({
                        position: map.getCenter(),
                        map: map
                    });
                }
                // call the function
                load();
                //]]>
            </script>
        </div>
        <div class="block-5 col-sm-4">
            <div class="contact-info col-sm-11 center-block">
                <p class="title">
                    <span>{{trans('main.site.contacts.block_title')}}</span>
                </p>
                <p class="address">
                    <span>{!! $contact->city !!}</span>
                </p>
                <p class="address">
                    <span class="col-sm-12">{!! $contact->address !!}</span>
                </p>
                <p class="phone">
                    <span>{{trans('main.site.contacts.phone')}}</span>
                    <span class="phone-number">{!! $contact->phone !!}</span>
                </p>
                <p class="email">
                    <span>{{trans('main.site.contacts.email')}}</span>
                    <span>{!! $contact->email !!}</span>
                </p>
            </div>
            <div class="social-linls col-sm-12">
                <a class="facebook-icon col-sm-5" href="{{$contact->facebook_link}}">
                    <i class="facebook-footer-icon pull-right"></i>
                </a>
                <a class="vk-icon col-sm-offset-1 col-sm-4" href="{{$contact->vk_link}}">
                    <i class="vk-footer-icon pull-left"></i>
                </a>
            </div>
        </div>
    </section>



    @include('partials.contact_form')



@endsection