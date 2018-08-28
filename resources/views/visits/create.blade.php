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

                        <h2 class="m-b-lg">Создать визит</h2>
                        <form class="form-horizontal add_job_form" method="post" action="{{route('visit.create')}}" enctype="multipart/form-data">
                            {{ csrf_field() }}

                            {{--<input id="company" name="company_id" value="{{ $company_id }}" hidden>--}}
                            {{--<input id="author" name="author_id" value="{{ $user->id }}" hidden>--}}

                            <div class="row">

                                <div class="col-lg-12 ">
                                    <div class="row">
                                        <label class="control-label col-md-2 m-b text-align-left" for="state_number">Автомобиль</label>
                                        <div class="col-md-4 {{ $errors->has('state_number') ? 'has-error' : '' }}">
                                            <input id="state_number" type="text" class="form-control" name="state_number" placeholder="Поиск по цифрам номерного знака">
                                            <input id="car_id" type="hidden" class="form-control" name="car_id" value="{{ old('car_id') }}">
                                            <p id="car-info"></p>

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
                                        <label class="control-label col-md-2 m-b text-align-left " for="odometer_reading">Показания одометра</label>
                                        <div class="col-md-4 {{ $errors->has('odometer_reading') ? 'has-error' : '' }}">
                                            <input id="odometer_reading" type="text" class="form-control" name="odometer_reading" value="{{ old('odometer_reading') }}">

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
                                        <label class="control-label col-md-2 m-b text-align-left " for="errors_petrol">Ошибки бензин</label>
                                        <div class="col-md-4 {{ $errors->has('errors_petrol') ? 'has-error' : '' }}">
                                            <input id="errors_petrol" type="text" class="form-control" name="errors_petrol" value="{{ old('errors_petrol') }}">

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
                                        <label class="control-label col-md-2 m-b text-align-left " for="errors_gas">Ошибки газ</label>
                                        <div class="col-md-4 {{ $errors->has('errors_gas') ? 'has-error' : '' }}">
                                            <input id="errors_gas" type="text" class="form-control" name="errors_gas" value="{{ old('errors_gas') }}">

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
                                        <label class="control-label col-md-2 m-b text-align-left " for="work_petrol">Работы по бензину</label>
                                        <div class="col-md-4 {{ $errors->has('work_petrol') ? 'has-error' : '' }}">
                                            <input id="work_petrol" type="text" class="form-control" name="work_petrol" value="{{ old('work_petrol') }}">

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
                                        <label class="control-label col-md-2 m-b text-align-left " for="work_gas">Работы по газу</label>
                                        <div class="col-md-4 {{ $errors->has('work_gas') ? 'has-error' : '' }}">
                                            <input id="work_gas" type="text" class="form-control" name="work_gas" value="{{ old('work_gas') }}">

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
                                        <label class="control-label col-md-2 m-b text-align-left " for="notes">Заметки</label>
                                        <div class="col-md-4 {{ $errors->has('notes') ? 'has-error' : '' }}">
                                            <input id="notes" type="text" class="form-control" name="notes" value="{{ old('notes') }}">

                                            {{--@if ($errors->has('title'))--}}
                                            {{--<span class="help-block">--}}
                                            {{--<strong>{{ $errors->first('title') }}</strong>--}}
                                            {{--</span>--}}
                                            {{--@endif--}}

                                        </div>
                                    </div>
                                    <div class="hr-line-dashed"></div>

                                </div>

                                <div class="col-sm-12">
                                    <div class="row text-center">
                                        <button class="btn btn-success" type="submit">Создать</button>
                                    </div>
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

