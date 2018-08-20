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
                            <div class="col-md-2 m-b">

                                <a href="
{{--{{ route('admin.article.create') }}--}}

                                        " class="btn w-xs btn-success">
                                    <i class="fa fa-plus"></i>
                                    <span class="bold">Добавить автомобиль</span>
                                </a>

                            </div>
                        </div>

                        {{--@if (session('success'))--}}
                        {{--<div class="alert alert-success">--}}
                        {{--{{ session('success') }}--}}
                        {{--</div>--}}
                        {{--@endif--}}

                        <div class="table-responsive">


                            <table cellpadding="1" cellspacing="1" class="table table-bordered table-striped table-hover">
                                <thead>
                                <tr>
                                    <th>#ID</th>
                                    <th>{{ trans('admin.article.title') }}</th>
                                    <th>{{ trans('admin.article.locale') }}</th>
                                    {{--<th class="col-md-3">{{ trans('admin.article.category') }}</th>--}}
                                    <th>{{ trans('admin.article.created') }}</th>
                                    <th>{{ trans('admin.article.action') }}</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>

                                    <form action="{{route('cars.search')}}" method="POST" id="employee-search">
                                        {{ csrf_field() }}
                                        <td>#ID</td>
                                        <td>
                                            <div class="">
                                                <input type="text" class="form-control input-sm m-b-md" placeholder="Название статьи" name="title">
                                            </div>
                                        </td>

                                        <td>
                                            <select class="selectpicker form-control m-b" name="categories[]" multiple>
{{--                                                @foreach($categories as $category)--}}
                                                    <option value="category->id">category->title</option>
                                                {{--@endforeach--}}
                                            </select>
                                        </td>
                                        <td>
                                            <div id="sandbox-container" class="col-sm-10">
                                                <label for="">Выберите период:</label>
                                                <div class="input-group date">
                                                    <input type="text" class="form-control" name="date_after" placeholder="Начало" value="{{ old('created_date') }}"><span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
                                                </div>
                                            </div>
                                            <div id="sandbox-container2" class="col-sm-10">
                                                <div class="input-group date">
                                                    <input type="text" class="form-control" name="date_before" placeholder="Конец" value="{{ old('created_date') }}"><span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
                                                </div>
                                            </div>

                                        </td>
                                        <td>
                                            <div class="col-sm-12">
                                                <button class="form-control btn-info submit-form" type="submit">Поиск</button>
                                                <button class="form-control btn-primary reset-form" type="reset">Сброс</button>
                                            </div>
                                        </td>
                                    </form>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <?php xdebug_break(); ?>
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