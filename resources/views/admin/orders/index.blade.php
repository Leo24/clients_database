@extends('layouts.admin')

@section('content')
    <div class="content animate-panel">
        <div class="row">
            <div class="col-lg-12">
                <div class="hpanel">

                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-10 m-b">
                                <h2 class="margin0">{{ trans('admin.order.title') }}</h2>

                            </div>

                        </div>

                        {{--@if (session('success'))--}}
                        {{--<div class="alert alert-success">--}}
                        {{--{{ session('success') }}--}}
                        {{--</div>--}}
                        {{--@endif--}}
                        <div class="table-responsive">

                            @if (sizeof($orders))

                                <table cellpadding="1" cellspacing="1" class="table table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th>#ID</th>
                                        <th>{{ trans('admin.order.checked') }}</th>
                                        <th>{{ trans('admin.order.name') }}</th>
                                        <th>{{ trans('admin.order.phone') }}</th>
                                        <th>{{ trans('admin.order.email') }}</th>
                                        <th>{{ trans('admin.order.created') }}</th>
                                        <th>{{ trans('admin.order.action') }}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse ($orders as $item)
                                        <tr class="{{($item->checked != false ) ? 'checked ' : '' }}">
                                            <td>{{ $item->id }}</td>
                                            <td><form action="" method="POST">
                                                    <div class="text-center">
                                                        <input class="order-checkbox" type="checkbox" data-url="{{route('admin.order.check', ['id' => $item->id]) }}" name="checked" {{($item->checked != false ) ? 'checked ' : '' }}>
                                                    </div>
                                                </form>
                                            </td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->phone}}</td>
                                            <td>{{ $item->email}}</td>
                                            <td>{{ $item->created_at }}</td>
                                            <td class="table-button">
                                                <a class="btn btn-info" href="{{ route('admin.order.edit', $item->id) }}" title="{{ trans('admin.edit') }}">
                                                    <i class="fa fa-paste"></i>
                                                </a>
                                                <form method="POST" action="{{ route('admin.order.delete', $item->id) }}">
                                                    {{ csrf_field() }}
                                                    <button class="btn btn-danger alert-delete-item" type="submit" title="{{ trans('admin.delete') }}">
                                                        <i class="fa fa-trash-o"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>No orders</tr>
                                    @endforelse
                                    </tbody>
                                </table>
                                {!! $orders->render() !!}
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('admin.partials.js_remove_script')

    <script>

        window.onload = function () {
            $('.order-checkbox').on('change', function () {


                jQuery.ajax({
                    url: $(this).attr('data-url'),
                    type: "GET",
                    success: function (data) {
                        console.log(data);
                    }
                });




            });

        };
    </script>
    
@endsection