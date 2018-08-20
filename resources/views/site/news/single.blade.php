@extends('layouts.site')

@section('content')

    <section class="news-page container-fluid">
        <div class="news-header">
            <h2 class="col-sm-2 center-block">{{trans('main.site.news.page_title')}}</h2>
        </div>
    </section>
    <section class="news-block container-fluid">
        <div class="news-list col-sm-10 center-block">
            <div class="news-item col-sm-12">
                <div class="post-thumbnail col-sm-3">
                    <img class="img-responsive image" src="{{ asset('storage/'.$newsItem->picture) }}" alt="{{$newsItem->title}}">
                </div>
                <div class="content col-sm-9">
                    <p>{!! $newsItem->content !!}</p>
                </div>
            </div>
        </div>
    </section>

@endsection