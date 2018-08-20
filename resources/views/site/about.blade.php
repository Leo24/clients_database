@extends('layouts.site')

@section('content')

    <section class="about-company container-fluid">
        <div class="container ">
            <div class="about-image col-md-offset-0 col-sm-3 col-xs-offset-0 col-xs-12">
                <img class="img-responsive image" src="{{ asset('storage/'.$data->picture) }}" alt="{{$data->title}}">
            </div>
            <div class="about-text col-sm-8 col-xs-12">
                <p>{{$data->content}}</p>
            </div>
        </div>
    </section>


    <section class="certificates container-fluid">
        <div class="header col-sm-3 col-xs-8 center-block">
            <p>{{trans('main.site.about.certificates_title')}}</p>
        </div>
        <div class="container">
            <div id="certificates" style="display:none;">

                @foreach($certificates as $certificate)
                        <img class=" img-responsive image" alt="{{$certificate->title}}" src="{{ asset('storage/'.$certificate->picture) }}"
                             data-image="{{ asset('storage/'.$certificate->picture) }}"
                             data-description="{{ asset('storage/'.$certificate->picture) }}">
                @endforeach
            </div>
        </div>

    </section>

@endsection