@extends('layouts.admin')

@section('content')

    <div class="content normalheader">
        <div class="row">
            <div class="col-lg-12">
                <div class="hpanel">

                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    {{--@if ($errors->any())--}}
                    {{--<div class="alert alert-danger">--}}
                    {{--@foreach($errors->all() as $error)--}}
                    {{--<strong>{{ $loop->iteration }} - {{ $error }}</strong><br>--}}
                    {{--@endforeach--}}
                    {{--</div>--}}
                    {{--@endif--}}

                    <div class="panel-body">

                        <h2 class="m-b-lg">Редактирование автомобиля</h2>
                        <form id="car-edit-form" class="form-horizontal add_job_form" method="post" action="{{ route('car.edit', [ 'id' => $data->id ]) }}" enctype="multipart/form-data">
                            {{ csrf_field() }}

                            {{--<input id="company" name="company_id" value="{{ $company_id }}" hidden>--}}
                            {{--<input id="author" name="author_id" value="{{ $user->id }}" hidden>--}}

                            <div class="row">

                                <div class="col-lg-12 ">
                                    <div class="row">
                                        <label class="control-label col-md-2 m-b text-align-left" for="make">Марка</label>
                                        <div class="col-md-4 {{ $errors->has('make') ? 'has-error' : '' }}">
                                            <input id="make" type="text" class="form-control" name="make" value="{{ $data->make }}">

                                            {{--@if ($errors->has('title'))--}}
                                            {{--<span class="help-block">--}}
                                            {{--<strong>{{ $errors->first('title') }}</strong>--}}
                                            {{--</span>--}}
                                            {{--@endif--}}

                                        </div>

                                    </div>

                                    <div class="hr-line-dashed"></div>

                                </div>

                                <div class="col-lg-12 ">
                                    <div class="row">
                                        <label class="control-label col-md-2 m-b text-align-left " for="model">Модель</label>
                                        <div class="col-md-4 {{ $errors->has('model') ? 'has-error' : '' }}">
                                            <input id="model" type="text" class="form-control" name="model" value="{{ $data->model }}">

                                            {{--@if ($errors->has('title'))--}}
                                            {{--<span class="help-block">--}}
                                            {{--<strong>{{ $errors->first('title') }}</strong>--}}
                                            {{--</span>--}}
                                            {{--@endif--}}

                                        </div>

                                    </div>

                                    <div class="hr-line-dashed"></div>

                                </div>

                                <div class="col-lg-12 ">
                                    <div class="row">
                                        <label class="control-label col-md-2 m-b text-align-left " for="title">Год выпуска</label>
                                        <div class="col-md-4 {{ $errors->has('year') ? 'has-error' : '' }}">
                                            <input id="year" type="text" class="form-control" name="year" value="{{ $data->year }}">

                                            {{--@if ($errors->has('title'))--}}
                                            {{--<span class="help-block">--}}
                                            {{--<strong>{{ $errors->first('title') }}</strong>--}}
                                            {{--</span>--}}
                                            {{--@endif--}}

                                        </div>

                                    </div>

                                    <div class="hr-line-dashed"></div>

                                </div>


                                <div class="col-lg-12 ">
                                    <div class="row">
                                        <label class="control-label col-md-2 m-b text-align-left " for="title">Гос.номер</label>
                                        <div class="col-md-4 {{ $errors->has('state_number') ? 'has-error' : '' }}">
                                            <input id="state_number" type="text" class="form-control" name="state_number" value="{{ $data->state_number }}">

                                            {{--@if ($errors->has('title'))--}}
                                            {{--<span class="help-block">--}}
                                            {{--<strong>{{ $errors->first('title') }}</strong>--}}
                                            {{--</span>--}}
                                            {{--@endif--}}

                                        </div>

                                    </div>

                                    <div class="hr-line-dashed"></div>

                                </div>

                                <div class="col-lg-12 ">
                                    <div class="row">
                                        <label class="control-label col-md-2 m-b text-align-left " for="ecu_name">Блок управления</label>
                                        <div class="col-md-4 {{ $errors->has('ecu_name') ? 'has-error' : '' }}">
                                            <input id="ecu_name" type="text" class="form-control" name="ecu_name" value="{{ $data->ecu_name }}">

                                            {{--@if ($errors->has('title'))--}}
                                            {{--<span class="help-block">--}}
                                            {{--<strong>{{ $errors->first('title') }}</strong>--}}
                                            {{--</span>--}}
                                            {{--@endif--}}

                                            <p>*Только для автомобилей ВАЗ</p>
                                        </div>
                                    </div>
                                    <div class="hr-line-dashed"></div>

                                </div>

                                <div class="col-lg-12 ">
                                    <div class="row">
                                        <label class="control-label col-md-2 m-b text-align-left " for="chiptuned">"Чипованная"</label>
                                        <div class="col-md-4 {{ $errors->has('chiptuned') ? 'has-error' : '' }}">
                                            <select id="chiptuned" class="form-control country-selector" name="chiptuned">
                                                <option value="0" {{ ($data->chiptuned === 0) ? 'selected' : '' }}>Нет</option>
                                                <option value="1" {{ ($data->chiptuned === 1) ? 'selected' : '' }}>Да</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="hr-line-dashed"></div>
                                </div>

                                <div class="col-sm-12">
                                    <div class="row text-center">
                                        <button class="btn btn-success" type="submit">Отредактировать</button>
                                        <button class="btn btn-primary alert-delete-item" type="submit" name="delete">Удалить</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>

    </div>

    <script>
        //set car delete url
        var carDeleteUrl = '{{route('car.delete', [ 'id' => $data->id ]) }}';
    </script>

@include('admin.partials.js_remove_script')

@endsection

@section('bottomScripts')
    <script>
        $(function() {

            $('#city_select').select2();


            var renderWithErrorCity = "{{ old('city_id') }}";

            $('#countries_select').on('change', function() {

                var self = $(this);

                    var countryId = self.find(":selected").val(),
{{--                        url = '{{ route("country.get_cities_by_country", ":id") }}',--}}
                        url = url.replace(':id', countryId);

                $('#city_select').find('option').remove();

                    $.ajax({
                        type: "POST",
                        url: url,
                        success: function(data) {
                            $('#city_select').append($('<option default>'));
                            $.each(data, function(key, value) {
                                $('#city_select').append($('<option>', { value : value.id }).text(value.name));
                            });

                            $("#city_select").select2("val", "");

                            if(renderWithErrorCity) {
                                $('#city_select option[value=' + renderWithErrorCity + ']').prop('selected',true).trigger('change');
                            }
                        },
                        dataType: 'json'
                    });

            });

            if(renderWithErrorCity) {
                $('#countries_select').change();
            }

        });

    </script>

@endsection