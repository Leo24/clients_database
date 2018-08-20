@extends('layouts.admin')


@section('content')

<div class="content animate-panel">
    <div class="row">
        <div class="col-lg-12">
            <div class="hpanel">
                <div class="panel-body">
                    <form method="POST" action="{{ route('admin.order.update', ['id' => $data->id]) }}" enctype="multipart/form-data" class="form-horizontal" novalidate>
                        {{ csrf_field() }}
                        <h3 class="text-center m-b">{{ trans('admin.order.create.title') }}</h3>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">{{ trans('admin.order.name') }}</label>
                            <div class="col-sm-10 {{ $errors->has('title') ? 'has-error' : '' }}">
                                <input name="name" type="text" value="{{ $data->name}}" class="form-control m-b">
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <label class="col-sm-2 control-label">{{ trans('admin.order.phone') }}</label>
                            <div class="col-sm-10 {{ $errors->has('title') ? 'has-error' : '' }}">
                                <input name="phone" type="text" value="{{ $data->phone}}" class="form-control m-b phone_us">
                                @if ($errors->has('phone'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <label class="col-sm-2 control-label">{{ trans('admin.order.email') }}</label>
                            <div class="col-sm-10 {{ $errors->has('email') ? 'has-error' : '' }}">
                                <input name="email" type="text" value="{{ $data->email}}" class="form-control m-b">
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
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

@include('admin.partials.js_remove_script')

@endsection