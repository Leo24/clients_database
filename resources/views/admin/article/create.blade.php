@extends('layouts.admin')

@section('content')
    <div class="content animate-panel">
        <div class="row">
            <div class="col-lg-12">
                <div class="hpanel">

                    <div class="panel-body">
                        <form method="POST" action="@if(isset($article) && isset($article->id)) {{ route('admin.article.update', $article->id) }} @else {{ route('admin.article.create') }} @endif" enctype="multipart/form-data" class="form-horizontal" novalidate>
                            {{ csrf_field() }}
                            <h3 class="text-center m-b">{{ trans('admin.article.create_title') }}</h3>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ trans('admin.article.title') }}</label>
                                <div class="col-sm-10 {{ $errors->has('title') ? 'has-error' : '' }}">
                                    <input name="title" type="text" value="@if(isset($article) && isset($article->id)) {{$article->title}} @else {{ old('title') }} @endif" placeholder="{{ trans('admin.article.title') }}" class="form-control m-b">
                                    @if ($errors->has('title'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                <label class="col-sm-2 control-label">{{ trans('admin.article.content') }}</label>
                                <div class="col-sm-10 {{ $errors->has('content') ? 'has-error' : '' }}">
                                <textarea name="content" placeholder="{{ trans('admin.article.title') }}" class="form-control m-b">@if(isset($article) && isset($article->id)) {{$article->content}} @else {{ old('content') }} @endif</textarea>
                                    @if ($errors->has('content'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <label class="col-sm-2 control-label">{{ trans('admin.article.service_title') }}</label>
                                <div class="col-sm-10 {{ $errors->has('title') ? 'has-error' : '' }}">
                                    <input name="service_title" type="text" value="@if(isset($article) && isset($article->id)) {{$article->service_title}} @else {{ old('service_title') }} @endif" placeholder="{{ trans('admin.article.service_title') }}" class="form-control m-b">
                                    @if ($errors->has('service_title'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('service_title') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <label class="col-sm-2 control-label">{{ trans('admin.article.service_content') }}</label>
                                <div class="col-sm-10 {{ $errors->has('content') ? 'has-error' : '' }}">
                                    <textarea name="service_content" placeholder="{{ trans('admin.article.title') }}" class="form-control m-b">@if(isset($article) && isset($article->id)) {{$article->service_content}} @else {{ old('service_content') }} @endif</textarea>
                                    @if ($errors->has('service_content'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('service_content') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                <label class="col-sm-2 control-label">{{ trans('admin.article.language') }}</label>
                                <div class="col-sm-10">
                                    <select class="selectpicker form-control m-b" name="language_code">
                                        @foreach($languages as $language)
                                            <option value="{{$language->code}}" @if(isset($article) && isset($article->id)) {{($language->code == $article->language_code) ? 'selected' : '' }} @endif>{{$language->name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <label class="col-sm-2 control-label">{{ trans('admin.article.category') }}</label>
                                <div class="col-sm-10">
                                    <select class="selectpicker form-control m-b" name="categories[]" multiple>
                                    @foreach($categories as $category)
                                            <option value="{{$category->id}}" @if(isset($article) && isset($article->id)) {{(in_array($category->id, $article->categoryList())) ? 'selected' : '' }} @endif>{{$category->title}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <label class="col-sm-2 control-label">{{ trans('admin.article.service') }}</label>
                                <div class="col-sm-10">
                                    <select class="selectpicker form-control m-b" name="service">
                                        <option value="0" default></option>
                                        @foreach($services as $service)
                                            <option value="{{$service->id}}" @if(isset($article) && isset($article->id)) {{(in_array($service->id, $article->servicesList())) ? 'selected' : '' }} @endif>{{$service->title}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <label class="col-sm-2 control-label">{{ trans('admin.article.picture') }}</label>
                                <div class="col-sm-10 {{ $errors->has('picture') ? 'has-error' : '' }}">

                                    @if ($errors->has('picture'))
                                        <div class="help-block">
                                            <strong>{{ $errors->first('picture') }}</strong>
                                        </div>
                                    @endif



                                        <div class="col-sm-10 m-b">
                                            @if(isset($article->picture))
                                                <div class=" m-b">

                                                    <div id="thumbnail">
                                                        <div class="image-holder">
                                                            <img class="fake-img"  src="{{ asset('storage/'.$article->picture) }}" />
                                                            <div style="background: url({{ asset('storage/'.$article->picture) }}) no-repeat center;background-size: cover;" class="img"></div>
                                                        </div>
                                                        <a href="{{ route('article.remove.picture', $article->id) }}" id="remove-photo" class="btn btn-danger alert-delete-photo">
                                                            <i class="fa fa-trash-o"></i>
                                                        </a>
                                                    </div>

                                                </div>
                                            @endif
                                            <input name="picture" type="file" class="form-control">
                                        </div>

                                </div>

                                <div class="col-sm-8 col-sm-offset-2">
                                    <button class="btn btn-primary" type="submit">{{ trans('admin.save') }}</button>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection