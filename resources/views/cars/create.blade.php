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

                        <h2 class="m-b-lg">Создать новый автомобиль</h2>
                        <form id="create-car" class="form-horizontal add_job_form" method="post" action="{{route('car.create')}}" enctype="multipart/form-data">
                            {{ csrf_field() }}

                            {{--<input id="company" name="company_id" value="{{ $company_id }}" hidden>--}}
                            {{--<input id="author" name="author_id" value="{{ $user->id }}" hidden>--}}

                            <div class="row">

                                <div class="col-lg-12 ">
                                    <div class="row">
                                        <label class="control-label col-md-2 m-b text-align-left" for="make">Марка</label>
                                        <div class="col-md-4 {{ $errors->has('make') ? 'has-error' : '' }}">
                                            <input id="make" type="text" class="form-control" name="make" value="{{ old('make') }}">

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
                                            <input id="model" type="text" class="form-control" name="model" value="{{ old('model') }}">

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
                                            <input id="year" type="text" class="form-control" name="year" value="{{ old('year') }}">

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
                                            <input id="state_number" type="text" class="form-control" name="state_number" value="{{ old('state_number') }}">

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
                                            <input id="ecu_name" type="text" class="form-control" name="ecu_name" value="{{ old('ecu_name') }}">

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
                                                <option value="0" selected>Нет</option>
                                                <option value="1">Да</option>
                                            </select>
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
