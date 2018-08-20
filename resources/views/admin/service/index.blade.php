@extends('layouts.admin')

@section('content')
    <div class="content animate-panel">
        <div class="row">
            <div class="col-lg-12">
                <div class="hpanel">

                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-10 m-b">
                                <h2 class="margin0">{{ trans('admin.service.name') }}</h2>

                            </div>
                            <div class="col-md-2 m-b">

                                <a href="{{ route('admin.service.create') }}" class="btn w-xs btn-success">
                                    <i class="fa fa-plus"></i>
                                    <span class="bold">{{ trans('admin.service.create_title') }}</span>
                                </a>

                            </div>
                        </div>

                        {{--@if (session('success'))--}}
                        {{--<div class="alert alert-success">--}}
                        {{--{{ session('success') }}--}}
                        {{--</div>--}}
                        {{--@endif--}}
                        <div class="table-responsive">

                            @if (sizeof($services))

                                <table cellpadding="1" cellspacing="1" class="table table-bordered table-striped table-hover">
                                    <thead>
                                    <tr>
                                        <th>#ID</th>
                                        <th>{{ trans('admin.service.title') }}</th>
                                        <th>{{ trans('admin.service.locale') }}</th>
                                        <th>{{ trans('admin.service.category') }}</th>
                                        <th>{{ trans('admin.service.created') }}</th>
                                        <th>{{ trans('admin.service.action') }}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse ($services as $item)
                                        <tr>
                                            <td>{{ $item->id }}</td>
                                            <td>{{ $item->title }}</td>
                                            <td>{{ $item->language_code}}</td>
                                            <td>
{{--                                                @foreach($item->categories as $category)--}}
{{--                                                    <p>{{$category->title}}</p>--}}
                                                {{--@endforeach--}}
                                            </td>
                                            <td>{{ $item->created_at }}</td>
                                            <td class="table-button">
                                                <a class="btn btn-info" href="{{ route('admin.service.edit', $item->id) }}" title="{{ trans('service.edit.name') }}">
                                                    <i class="fa fa-paste"></i>
                                                </a>
                                                <form method="POST" action="{{ route('admin.service.delete', $item->id) }}">
                                                    {{ csrf_field() }}
                                                    <button class="btn btn-danger alert-delete-item" type="submit" title="{{ trans('service.delete') }}">
                                                        <i class="fa fa-trash-o"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>No services</tr>
                                    @endforelse
                                    </tbody>
                                </table>
                                {!! $services->render() !!}
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('admin.partials.js_remove_script')

@endsection