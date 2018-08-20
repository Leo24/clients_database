@extends('layouts.site')

@section('content')

    <section class="services-page container-fluid" style="background-image: url({{ asset('storage/'.$service->service_block_picture) }})">
        <div class="serives-block-1-background">
        </div>
        <div class="text-container col-sm-10 center-block">
            <div class="text  center-block">
                <p class="bold">

                    {!! $service->service_block_text !!}

                </p>
            </div>
            <div class="arrow col-sm-1 col-xs-1 center-block">
                <div class="arrow-container col-sm-12 col-xs-12">

                    <div class="vertical-line col-sm-2"></div>
                    <div class="vertical-line col-sm-2"></div>

                    <div class="triangle-container col-sm-5">
                        <div class="one line"></div>
                        <div class="two line"></div>
                        <div class="three line"></div>
                        <div class="four line"></div>
                        <div class="five line"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="services-block container-fluid">
        <div class="col-sm-4 col-xs-12 services-menu">
            <div class="col-sm-offset-0 col-xs-12 menu-block">
                <ul id="menu-services-menu" class="menu" role="tablist">
                    @foreach($services as $k => $item)
                        <li class="menu-item">
                            <div class="link-wrapper">
                                <span>
                                    <a href="{{route('site.service', ['id' => $item->id])}}">{{$item->title}}</a>
                                </span>
                            </div>
                            <ul class="sub-menu">
                                @foreach($item->articles as $a)
                                    <li class="menu-item menu-item-type-post_type menu-item-object-post ">
                                        <a href="{{route('site.article', ['id' => $a->id])}}"><span>{{$a->service_title ? $a->service_title: $a->title }}</span></a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>

        <div class="col-sm-6 col-xs-12 services-content">
            @if(isset($article))
                {!! $article->service_content ? $article->service_content : $article->content!!}
            @else
                {!! $service->articles->first()->service_content ? $service->articles->first()->service_content : $service->articles->first()->content!!}
            @endif
        </div>

    </section>

    @include('partials.contact_form')


    <section class="reasons container-fluid">
        <h2 class="col-sm-5 center-block reasons-title">
            {!! $service->reasons_block_title !!}
        </h2>
        <div class="container">
            <div class="border-left"></div>
            <div class="reasons-block col-sm-4">
                <div class="image">
                    <img class="img-responsive" src="{{ asset('storage/'.$service->reason_1_picture) }}" alt="">
                </div>
                <div class="reasons-text">
                    <p>{!! $service->reason_1 !!}</p>
                </div>
            </div>

            <div class="reasons-block col-sm-offset-4 col-sm-4">
                <div class="image">
                    <img class="img-responsive" src="{{ asset('storage/'.$service->reason_2_picture) }}" alt="">
                </div>
                <div class="reasons-text">{!! $service->reason_2 !!}</div>
            </div>

            <div class="reasons-block col-sm-12">
                <div class="col-sm-offset-4 col-sm-4 center-block">
                    <div class="image">
                        <img class="img-responsive" src="{{ asset('storage/'.$service->reason_3_picture) }}" alt="">
                    </div>
                    <div class="reasons-text">{!! $service->reason_3 !!}</div>
                </div>
            </div>

            <div class="reasons-block col-sm-4">
                <div class="image">
                    <img class="img-responsive" src="{{ asset('storage/'.$service->reason_4_picture) }}" alt="">
                </div>
                <div class="reasons-text">{!! $service->reason_4 !!}</div>
            </div>

            <div class="reasons-block col-sm-offset-4 col-sm-4">
                <div class="image">
                    <img class="img-responsive" src="{{ asset('storage/'.$service->reason_5_picture) }}" alt="">
                </div>
                <div class="reasons-text">{!! $service->reason_5 !!}</div>
            </div>
        </div>
    </section>


    <script>

        // accordion
        window.onload = function () {
            var icons = {
                header: "ui-icon-circle-arrow-e",
                activeHeader: "ui-icon-circle-arrow-s"
            };
            $("#menu-services-menu").accordion({
                collapsible: true,
                icons: icons
            });
            $( "#menu-services-menu").accordion( "option", "active", parseInt({{ !empty($active) ? $active : 0}}) );

        }
    </script>

@endsection