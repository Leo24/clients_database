@extends('layouts.admin')

@section('content')
<div class="content animate-panel">
    <div class="row">
        <div class="col-lg-12">
            <div class="hpanel">

                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-10 m-b">
                            <h2 class="margin0">{{ trans('admin.contact.name') }}</h2>

                        </div>
                        <div class="col-md-2 m-b">

                            <a href="{{ route('admin.contact.create') }}" class="btn w-xs btn-success">
                                <i class="fa fa-plus"></i>
                                <span class="bold">{{ trans('admin.contact.create') }}</span>
                            </a>

                        </div>
                    </div>

                    {{--@if (session('success'))--}}
                        {{--<div class="alert alert-success">--}}
                            {{--{{ session('success') }}--}}
                        {{--</div>--}}
                    {{--@endif--}}
                    <div class="table-responsive">

                        @if (sizeof($data))

                        <table cellpadding="1" cellspacing="1" class="table table-bordered table-striped table-hover">
                            <thead>
                            <tr>
                                <th>#ID</th>
                                <th>{{ trans('contact.title') }}</th>
                                <th>{{ trans('contact.locale') }}</th>
                                <th>{{ trans('contact.created') }}</th>
                                <th>{{ trans('contact.action') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse ($data as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td><a class="text-info" href="{{ route('admin.contact.edit', $item->id) }}">{{ substr($item->title, 0, 50) }}</a></td>
                                    <td>{{ $item->language_code}}</td>
                                    <td>{{ $item->created_at }}</td>
                                    <td class="table-button">
                                        <a class="btn btn-info" href="{{ route('admin.contact.edit', $item->id) }}" title="{{ trans('contact.edit.name') }}">
                                            <i class="fa fa-paste"></i>
                                        </a>
                                        <form method="POST" action="{{ route('admin.contact.delete', $item->id) }}">
                                            {{ csrf_field() }}
                                            <button class="btn btn-danger alert-delete-item" type="submit" title="{{ trans('contact.delete') }}">
                                                <i class="fa fa-trash-o"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>No data</tr>
                            @endforelse
                            </tbody>
                        </table>
                        {!! $data->render() !!}
                        @endif
                    </div>
                </div>
                <div class="panel-footer">
                    {{ trans('admin.table.footer.table') }} - {{ trans('admin.table.footer.doc') }} ({{ count($data) }})
                </div>
            </div>
        </div>
    </div>
</div>

@include('admin.partials.js_remove_script')

@endsection