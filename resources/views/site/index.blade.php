@extends('layouts.site')

@section('content')
    <section class="block-1 container-fluid">
        <div class="flexslider">
            <ul class="slides" >
                @foreach($mainSliderData as $slide)
                    <li>
                        <div class="slide-info-text col-sm-7 col-xs-7">
                            <a href="{{route('site.service', ['id' => $slide->services->first()->id])}}">{!! $slide->content !!}</a>
                        </div>
                        <a href="{{route('site.service', ['article_id' => $slide->services->first()->id])}}">
                            <div class="static-block col-sm-7 col-xs-12">
                                <p class="static-text">{{trans('main.site.slider_static_text')}}</p>
                                <i class="icon-hand"></i>
                            </div>
                        </a>
                        <img class="slide-image" src="{{ asset('storage/'.$slide->picture) }}" alt="{{$slide->title}}" />
                    </li>
                @endforeach
            </ul>
        </div>
        <div class="custom-navigation col-sm-12 col-xs-12">
            <a href="#" class="flex-prev"></a>
            <div class="custom-controls-container"></div>
            <a href="#" class="flex-next"></a>
        </div>
    </section>
    <section class="block-2 container-fluid">
        <div class="container">
            <div class="services-description col-sm-11 center-block">
                <p>
                    {!! $block2Data[0]->content !!}
                </p>
            </div>
            <div class="services col-sm-12 col-xs-12 text-center">
                <div class="service legal-services col-sm-3 col-xs-6">
                    <p class="center-block">
                        {{trans('main.site.block_2.legal_services')}}
                    </p>
                    <div class="shape"></div>
                </div>
                <div class="service accounting-services col-sm-3 col-xs-6">
                    <p class="center-block">
                        {{trans('main.site.block_2.account_services')}}
                    </p>
                    <div class="shape"></div>
                </div>
                <div class="service services-for-IT col-sm-3 col-xs-6">
                    <p class="center-block">
                        {{trans('main.site.block_2.services_for_it')}}
                    </p>
                    <div class="shape"></div>
                </div>
            </div>
        </div>
    </section>
    <section class="block-3 container-fluid">
        <div class="wrap">
            <div class="container">
                <div class="company-description col-sm-10 col-xs-12 center-block">
                    <p>
                        {!! $block2Data[1]->content !!}
                    </p>
                </div>
            </div>
        </div>
        <div class="team col-sm-12 center-block">
            <div class="container">
                <div class="team-header col-sm-12">
                    <p class="col-sm-4 center-block col-xs-offset-1 col-xs-11">
                        <span>{{trans('main.site.our_team')}}</span>
                    </p>
                </div>
                @foreach($teamData as $item)
                    <div class="team-person legal-services col-md-offset-0 col-sm-3 col-xs-offset-2 col-xs-6">
                        <img class="img-responsive image" src="{{ asset('storage/'.$item->picture) }}" alt="{{$item->title}}">
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <section class="block-4 container-fluid">
        <div class="office-slider">
            <ul class="bxslider" >
                @foreach($officeSliderData as $slide)
                    <li>
                        <div class="slide-info-text col-sm-7 col-xs-7">
                            <a href="#">
                            </a>
                        </div>
                        <a href="#">
                            <div class="static-block col-sm-5 col-xs-7">
                                <i class="line-office"></i>
                                <p class="static-text">{{$slide->title}}</p>
                            </div>
                        </a>
                        <img class="slide-image" src="{{ asset('storage/'.$slide->picture) }}" alt="{{$slide->title}}" />
                    </li>
                @endforeach
            </ul>
        </div>
        <div class="container">
            <div class="company-slogan col-sm-6 col-xs-8 center-block">
                <p class="text-center">
                    {{trans('main.site.company_slogan')}}
                </p>
                <p class="col-sm-12 col-xs-12"><span class="line col-sm-8 center-block"></span></p>
            </div>
        </div>
    </section>

@endsection