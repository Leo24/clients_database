@extends('layouts.admin')

@section('content')
<div class="content animate-panel">
    <div class="row">
        <div class="col-lg-12">
            <div class="hpanel">

                <div class="panel-body">
                    <form method="POST" action="{{ route('admin.category.create') }}" enctype="multipart/form-data" class="form-horizontal" novalidate>
                        {{ csrf_field() }}
                        <h3 class="text-center m-b">{{ trans('admin.category.create.title') }}</h3>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">{{ trans('admin.category.title') }}</label>
                            <div class="col-sm-10 {{ $errors->has('title') ? 'has-error' : '' }}">
                                <input name="title" type="text" value="{{ old('title') }}" placeholder="{{ trans('admin.category.title') }}" class="form-control m-b">
                                @if ($errors->has('title'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('title') }}</strong>
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
@endsection