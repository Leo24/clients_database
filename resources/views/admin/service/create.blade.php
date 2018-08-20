@extends('layouts.admin')

@section('content')
    <div class="content animate-panel">
        <div class="row">
            <div class="col-lg-12">
                <div class="hpanel">

                    <div class="panel-body">
                        <form method="POST" action="@if(isset($service) && isset($service->id)) {{ route('admin.service.update', $service->id) }} @else {{ route('admin.service.create') }} @endif" enctype="multipart/form-data" class="form-horizontal" novalidate>
                            {{ csrf_field() }}
                            <h3 class="text-center m-b">@if(isset($service) && isset($service->id)) {{trans('admin.service.edit_title')}} @else {{trans('admin.service.create_title')}} @endif</h3>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ trans('admin.service.title') }}</label>
                                <div class="col-sm-10 {{ $errors->has('title') ? 'has-error' : '' }}">
                                    <input name="title" type="text" value="@if(isset($service) && isset($service->id)) {{$service->title}} @else {{ old('title') }} @endif" placeholder="{{ trans('admin.service.title') }}" class="form-control m-b">
                                    @if ($errors->has('title'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                <label class="col-sm-2 control-label">{{ trans('admin.service.service_block_picture') }}</label>
                                <div class="col-sm-10 m-b">
                                    @if(isset($service->service_block_picture))
                                        <div class=" m-b">

                                            <div id="thumbnail">
                                                <div class="image-holder">
                                                    <img class="fake-img"  src="{{ asset('storage/'.$service->service_block_picture) }}" />
                                                    <div style="background: url({{ asset('storage/'.$service->service_block_picture) }}) no-repeat center;background-size: cover;" class="img"></div>
                                                </div>
                                                <a href="{{ route('service.remove.picture', ['id' => $service->id, 'attribute' => 'service_block_picture']) }}" id="remove-photo" class="btn btn-danger alert-delete-photo">
                                                    <i class="fa fa-trash-o"></i>
                                                </a>
                                            </div>

                                        </div>
                                    @endif
                                    <input name="service_block_picture" type="file" class="form-control">
                                </div>


                                <label class="col-sm-2 control-label">{{ trans('admin.service.service_block_text') }}</label>
                                <div class="col-sm-10 {{ $errors->has('service_block_text') ? 'has-error' : '' }}">
                                    <textarea name="service_block_text" placeholder="{{ trans('admin.service.service_block_text') }}" class="form-control m-b">@if(isset($service) && isset($service->id)) {{$service->service_block_text}} @else {{ old('service_block_text') }} @endif</textarea>
                                    @if ($errors->has('service_block_text'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('service_block_text') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                <label class="col-sm-2 control-label">{{ trans('admin.service.reasons_block_title') }}</label>
                                <div class="col-sm-10 {{ $errors->has('reasons_block_title') ? 'has-error' : '' }}">
                                    <textarea name="reasons_block_title" placeholder="{{ trans('admin.service.reason') }}" class="form-control m-b">@if(isset($service) && isset($service->id)) {{$service->reasons_block_title}} @else {{ old('reasons_block_title') }} @endif</textarea>
                                    @if ($errors->has('reasons_block_title'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('reasons_block_title') }}</strong>
                                    </span>
                                    @endif
                                </div>



                                {{--<p class="col-sm-2 control-label">{{ trans('admin.service.reasons') }}</p>--}}


                                <label class="col-sm-2 control-label">{{ trans('admin.service.reason_1') }}</label>
                                <div class="col-sm-10 {{ $errors->has('reason_1') ? 'has-error' : '' }}">
                                    <textarea name="reason_1" placeholder="{{ trans('admin.service.reason') }}" class="form-control m-b">@if(isset($service) && isset($service->id)) {{$service->reason_1}} @else {{ old('reason_1') }} @endif</textarea>
                                    @if ($errors->has('reason_1'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('reason_1') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                <label class="col-sm-2 control-label">{{ trans('admin.service.reason_1_picture') }}</label>
                                <div class="col-sm-10 m-b">
                                    @if(isset($service->reason_1_picture))
                                        <div class=" m-b">

                                            <div id="thumbnail">
                                                <div class="image-holder">
                                                    <img class="fake-img"  src="{{ asset('storage/'.$service->reason_1_picture) }}" />
                                                    <div style="background: url({{ asset('storage/'.$service->reason_1_picture) }}) no-repeat center;background-size: cover;" class="img"></div>
                                                </div>
                                                <a href="{{ route('service.remove.picture', ['id' => $service->id, 'attribute' => 'reason_1_picture']) }}" id="remove-photo" class="btn btn-danger alert-delete-photo">
                                                    <i class="fa fa-trash-o"></i>
                                                </a>
                                            </div>

                                        </div>
                                    @endif
                                    <input name="reason_1_picture" type="file" class="form-control">
                                </div>

                                <label class="col-sm-2 control-label">{{ trans('admin.service.reason_2') }}</label>
                                <div class="col-sm-10 {{ $errors->has('reason_2') ? 'has-error' : '' }}">
                                    <textarea name="reason_2" placeholder="{{ trans('admin.service.reason') }}" class="form-control m-b">@if(isset($service) && isset($service->id)) {{$service->reason_2}} @else {{ old('reason_2') }} @endif</textarea>
                                    @if ($errors->has('reason_2'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('reason_2') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                <label class="col-sm-2 control-label">{{ trans('admin.service.reason_2_picture') }}</label>
                                <div class="col-sm-10 m-b">
                                    @if(isset($service->reason_2_picture))
                                        <div class=" m-b">

                                            <div id="thumbnail">
                                                <div class="image-holder">
                                                    <img class="fake-img"  src="{{ asset('storage/'.$service->reason_2_picture) }}" />
                                                    <div style="background: url({{ asset('storage/'.$service->reason_2_picture) }}) no-repeat center;background-size: cover;" class="img"></div>
                                                </div>
                                                <a href="{{ route('service.remove.picture', ['id' => $service->id, 'attribute' => 'reason_2_picture']) }}" id="remove-photo" class="btn btn-danger alert-delete-photo">
                                                    <i class="fa fa-trash-o"></i>
                                                </a>
                                            </div>

                                        </div>
                                    @endif
                                    <input name="reason_2_picture" type="file" class="form-control">
                                </div>

                                <label class="col-sm-2 control-label">{{ trans('admin.service.reason_3') }}</label>
                                <div class="col-sm-10 {{ $errors->has('reason_3') ? 'has-error' : '' }}">
                                    <textarea name="reason_3" placeholder="{{ trans('admin.service.reason') }}" class="form-control m-b">@if(isset($service) && isset($service->id)) {{$service->reason_3}} @else {{ old('reason_3') }} @endif</textarea>
                                    @if ($errors->has('reason_3'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('reason_3') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                <label class="col-sm-2 control-label">{{ trans('admin.service.reason_3_picture') }}</label>
                                <div class="col-sm-10 m-b">
                                    @if(isset($service->reason_3_picture))
                                        <div class=" m-b">

                                            <div id="thumbnail">
                                                <div class="image-holder">
                                                    <img class="fake-img"  src="{{ asset('storage/'.$service->reason_3_picture) }}" />
                                                    <div style="background: url({{ asset('storage/'.$service->reason_3_picture) }}) no-repeat center;background-size: cover;" class="img"></div>
                                                </div>
                                                <a href="{{ route('service.remove.picture', ['id' => $service->id, 'attribute' => 'reason_3_picture']) }}" id="remove-photo" class="btn btn-danger alert-delete-photo">
                                                    <i class="fa fa-trash-o"></i>
                                                </a>
                                            </div>

                                        </div>
                                    @endif
                                    <input name="reason_3_picture" type="file" class="form-control">
                                </div>


                                <label class="col-sm-2 control-label">{{ trans('admin.service.reason_4') }}</label>
                                <div class="col-sm-10 {{ $errors->has('reason_4') ? 'has-error' : '' }}">
                                    <textarea name="reason_4" placeholder="{{ trans('admin.service.reason') }}" class="form-control m-b">@if(isset($service) && isset($service->id)) {{$service->reason_4}} @else {{ old('reason_4') }} @endif</textarea>
                                    @if ($errors->has('reason_4'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('reason_4') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                <label class="col-sm-2 control-label">{{ trans('admin.service.reason_4_picture') }}</label>
                                <div class="col-sm-10 m-b">
                                    @if(isset($service->reason_4_picture))
                                        <div class=" m-b">

                                            <div id="thumbnail">
                                                <div class="image-holder">
                                                    <img class="fake-img"  src="{{ asset('storage/'.$service->reason_4_picture) }}" />
                                                    <div style="background: url({{ asset('storage/'.$service->reason_4_picture) }}) no-repeat center;background-size: cover;" class="img"></div>
                                                </div>
                                                <a href="{{ route('service.remove.picture', ['id' => $service->id, 'attribute' => 'reason_4_picture']) }}" id="remove-photo" class="btn btn-danger alert-delete-photo">
                                                    <i class="fa fa-trash-o"></i>
                                                </a>
                                            </div>

                                        </div>
                                    @endif
                                    <input name="reason_4_picture" type="file" class="form-control">
                                </div>

                                <label class="col-sm-2 control-label">{{ trans('admin.service.reason_5') }}</label>
                                <div class="col-sm-10 {{ $errors->has('reason_5') ? 'has-error' : '' }}">
                                    <textarea name="reason_5" placeholder="{{ trans('admin.service.reason') }}" class="form-control m-b">@if(isset($service) && isset($service->id)) {{$service->reason_5}} @else {{ old('reason_5') }} @endif</textarea>
                                    @if ($errors->has('reason_5'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('reason_5') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                <label class="col-sm-2 control-label">{{ trans('admin.service.reason_5_picture') }}</label>


                                <div class="col-sm-10 m-b">
                                    @if(isset($service->reason_5_picture))
                                        <div class=" m-b">

                                            <div id="thumbnail">
                                                <div class="image-holder">
                                                    <img class="fake-img"  src="{{ asset('storage/'.$service->reason_5_picture) }}" />
                                                    <div style="background: url({{ asset('storage/'.$service->reason_5_picture) }}) no-repeat center;background-size: cover;" class="img"></div>
                                                </div>
                                                <a href="{{ route('service.remove.picture', ['id' => $service->id, 'attribute' => 'reason_5_picture']) }}" id="remove-photo" class="btn btn-danger alert-delete-photo">
                                                    <i class="fa fa-trash-o"></i>
                                                </a>
                                            </div>

                                        </div>
                                    @endif
                                    <input name="reason_5_picture" type="file" class="form-control">
                                </div>


                                <label class="col-sm-2 control-label">{{ trans('admin.service.language') }}</label>
                                <div class="col-sm-10">
                                    <select class="selectpicker form-control m-b" name="language_code">

                                        @if(isset($service) && isset($service->id)) {{$service->reason_5}}
                                            @foreach($languages as $language)
                                                <option value="{{$language->code}}" {{($language->code == $service->language_code) ? 'selected' : '' }} >{{$language->name}}</option>
                                            @endforeach
                                        @else
                                            @foreach($languages as $language)
                                                <option value="{{$language->code}}" {{$language->code == old('language_code') ? 'selected' : '' }}>{{$language->name}}</option>
                                            @endforeach
                                        @endif

                                    </select>
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