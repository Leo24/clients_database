@extends('layouts.site')

@section('content')

    <section class="news-page container-fluid">
        <div class="news-header">
            <h2 class="col-sm-2 center-block">{{trans('main.site.news.page_title')}}</h2>
        </div>
    </section>
    <section class="news-block container-fluid">
        <div class="news-list col-sm-10 center-block">
            @foreach($data as $item)
                <div class="news-item col-sm-12">
                    <div class="row">
                    <div class="post-thumbnail col-sm-3">
                        <img class="img-responsive image" src="{{ asset('storage/'.$item->picture) }}" alt="{{$item->title}}">
                    </div>
                    <div class="content col-sm-9">
                        {!! $item->content !!}
                    </div>
                    <div class="more col-sm-12 col-xs-12">
                        <a class="btn col-sm-2  pull-right" href="{{route('site.news.single', ['id' => $item->id])}}">{{trans('main.site.news.read_more')}}</a>
                    </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
@endsection