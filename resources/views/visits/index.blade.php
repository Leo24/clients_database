@extends('layouts.admin')

@section('content')
    <div class="content animate-panel">
        <div class="row">
            <div class="col-lg-12">
                <div class="hpanel">

                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-10 m-b">
                                <h2 class="margin0">Список визитов</h2>
                            </div>
                        </div>

                        {{--@if (session('success'))--}}
                        {{--<div class="alert alert-success">--}}
                        {{--{{ session('success') }}--}}
                        {{--</div>--}}
                        {{--@endif--}}

                        @include('admin.partials.visits', ['data' => $visits])

                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('admin.partials.js_remove_script')


    <script>

        window.onload = function () {
            $('#employee-search').on('submit', function (event) {
                event.preventDefault();
                $.ajax({
                    url: $(this).attr('action'),
                    type: 'POST',
                    data: $(this).serialize(),
                    success: function(result) {
                        $('.table-articles').html(result);
                    }
                });
            });


            $('#employee-search .reset-form').on('click', function () {
                event.preventDefault();
                var self = $(this);
                $('#employee-search')[0].reset();
                $.ajax({
                    url: self.closest('form').attr('action'),
                    type: 'POST',
                    data: self.closest('form').serialize(),
                    success: function(result) {
                        $('.table').html(result);
                    }
                });
            });

        }
    </script>

@endsection