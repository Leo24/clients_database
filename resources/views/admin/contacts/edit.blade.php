@extends('layouts.admin')


@section('content')

<div class="content animate-panel">
    <div class="row">
        <div class="col-lg-12">
            <div class="hpanel">
                <div class="panel-body">
                    <form method="POST" action="{{ route('admin.contact.update', ['id' => $data->id]) }}" enctype="multipart/form-data" class="form-horizontal" novalidate>
                        {{ csrf_field() }}
                        <h3 class="text-center m-b">{{ trans('admin.contact.create.title') }}</h3>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">{{ trans('admin.contact.title') }}</label>
                            <div class="col-sm-10 {{ $errors->has('title') ? 'has-error' : '' }}">
                                <input name="title" type="text" value="{{ $data->title }}" class="form-control m-b">
                                @if ($errors->has('title'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <label class="col-sm-2 control-label">{{ trans('admin.contact.address') }}</label>
                            <div class="col-sm-10 {{ $errors->has('address') ? 'has-error' : '' }}">
                                <input name="address" type="text" value="{{ $data->address }}" placeholder="{{ trans('admin.contact.address') }}" class="form-control m-b">
                            @if ($errors->has('address'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <label class="col-sm-2 control-label">{{ trans('admin.contact.phone') }}</label>
                            <div class="col-sm-10 {{ $errors->has('phone') ? 'has-error' : '' }}">
                                <input name="phone" type="text" value="{{ $data->phone}}" placeholder="{{ trans('admin.contact.phone') }}" class="form-control m-b">
                                @if ($errors->has('phone'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <label class="col-sm-2 control-label">{{ trans('admin.contact.email') }}</label>
                            <div class="col-sm-10 {{ $errors->has('email') ? 'has-error' : '' }}">
                                <input name="email" type="text" value="{{ $data->email}}" placeholder="{{ trans('admin.contact.email') }}" class="form-control m-b">
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>


                            <label class="col-sm-2 control-label">{{ trans('admin.contact.city') }}</label>
                            <div class="col-sm-10 {{ $errors->has('city') ? 'has-error' : '' }}">
                                <input name="city" type="text" value="{{ $data->city}}" placeholder="{{ trans('admin.contact.city') }}" class="form-control m-b">
                                @if ($errors->has('city'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('city') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <label class="col-sm-2 control-label">{{ trans('admin.contact.facebook_link') }}</label>
                            <div class="col-sm-10 {{ $errors->has('facebook_link') ? 'has-error' : '' }}">
                                <input name="facebook_link" type="text" value="{{ $data->facebook_link }}" placeholder="{{ trans('admin.facebook.title') }}" class="form-control m-b">
                                @if ($errors->has('facebook_link'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('facebook_link') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <label class="col-sm-2 control-label">{{ trans('admin.contact.vk_link') }}</label>
                            <div class="col-sm-10 {{ $errors->has('vk_link') ? 'has-error' : '' }}">
                                <input name="vk_link" type="text" value="{{ $data->vk_link }}" placeholder="{{ trans('admin.vk.title') }}" class="form-control m-b">
                                @if ($errors->has('vk_link'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('vk_link') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <label class="col-sm-2 control-label">{{ trans('admin.contact.language') }}</label>
                            <div class="col-sm-10">
                                <select class="selectpicker form-control m-b" name="language_code">
                                    @foreach($languages as $language)
                                        <option value="{{$language->code}}" {{($language->code == $data->language_code) ? 'selected' : '' }} >{{$language->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            {{--<label class="col-sm-2 control-label">{{ trans('admin.contact.photo.name') }}</label>--}}
                            {{--<div class="col-sm-10 {{ $errors->has('picture') ? 'has-error' : '' }}">--}}

                                {{--@if ($errors->has('photo'))--}}
                                    {{--<div class="help-block">--}}
                                        {{--<strong>{{ $errors->first('picture') }}</strong>--}}
                                    {{--</div>--}}
                                {{--@endif--}}
                                {{--@if(isset($data->picture))--}}
                                    {{--<div class="form-control m-b">--}}

                                        {{--<div id="profile-photo">--}}
                                            {{--<div class="image-holder">--}}
                                                {{--<img class=""  src="{{ asset($data->picture) }}" />--}}
                                                {{--<div style="background: url({{ asset($data->picture) }}) no-repeat center;background-size: cover;" class="img"></div>--}}
                                            {{--</div>--}}
                                            {{--<a href="#" id="remove-photo" class="btn btn-danger alert-delete-photo">--}}
                                                {{--<i class="fa fa-trash-o"></i>--}}
                                            {{--</a>--}}
                                        {{--</div>--}}

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
                </div>
                </div>
            </div>
        </div>
    </div>

@include('admin.partials.js_remove_script')

@endsection