@extends('layouts.panels')

@section('content')
    <div class="content normalheader animate-panel">
        <div class="row">
            <div class="col-lg-12">
                <div class="hpanel hgreen">
                    <div class="panel-heading">
                        <div class="panel-tools">
                            <a class="showhide"><i class="fa fa-chevron-up"></i></a>
                            <a class="closebox"><i class="fa fa-times"></i></a>
                        </div>
                        <h2>Поиск вакансий</h2>
                    </div>
                    <div class="panel-body">


                        <form class="m-t" name="filter" multiple="multiple" method="POST" action="{{ route('filter.ajax') }}">
                            {{ csrf_field() }}
                            {{--
                            <div class="row ">
                                <div class="col-md-9 inline-layout">
                                    <div class="form-search-input m-b">
                                        <input name="search" type="text" class="form-control js-search">
                                    </div>
                                    <div class="button-search">
                                        <button class="btn btn-primary" type="submit"><i class="fa fa-2x pe-7s-search"></i></button>
                                    </div>
                                </div>

                                <div class="col-md-3 button-right m-b">

                                    <button type="button" class="btn w-xs btn-success" data-url="{{ route('vacancies.create') }}">
                                        <i class="fa fa-plus"></i>
                                        <span class="bold">Добавить вакансию</span>
                                    </button>
                                </div>
                            </div>
                            --}}
                            <div class="row">
                                <div class="col-md-3 col-sm-6 m-b">
                                    <label>{{trans('vacancies.create.job_scope')}}</label>
                                    <select name="scope[]" class="form-control " >
                                        <option></option>
                                        @foreach ($scopes as $scope)
                                            <option value="{{ $scope->id }}">{{ trans('scope.'.$scope->title) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-3 col-sm-6 m-b">
                                    <label>{{trans('vacancies.vacancy_country')}}</label>
                                    <select data-url="{{ route('filter.ajax.cities') }}" name="country[]" class="form-control js-source-states get-country" id="get-country" multiple="multiple" style="width: 100%; " >
                                        <option></option>
                                        @foreach ($countries as $country)
                                            <option value="{{ $country->id }}">{{ $country->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-3 col-sm-6 m-b">
                                    <label>{{trans('vacancies.vacancy_city')}}</label>
                                    <select data-url="{{ route('ajax.city.autocomplete') }}" name="city[]" class="form-control js-source-states get-cities" id="get-cities" multiple="multiple" style="width: 100%; "  disabled="disabled">
                                        <option></option>
                                    </select>
                                </div>
                                <div class="col-md-3 col-sm-6 m-b">
                                    <label>{{trans('vacancies.candidate_gender')}}</label>
                                    <select name="gender[]" class="form-control js-source-states" multiple="multiple" style="width: 100%; " >
                                        <option value="1">{{trans('vacancies.create.candidate_gender_male')}}</option>
                                        <option value="2">{{trans('vacancies.create.candidate_gender_female')}}</option>

                                    </select>
                                </div>
                                <div class="col-md-3 col-sm-6 m-b">
                                    <label>{{trans('vacancies.candidate_age')}}</label>

                                    <div class="input-group ajax-filter">
                                        <input type="text" class="form-control" name="age[age_start]">
                                        <span class="input-group-addon">до</span>
                                        <input type="text" class="form-control" name="age[age_end]">
                                    </div>

                                </div>
                                <div class="col-md-3 col-sm-6 m-b">
                                    <label>{{trans('vacancies.vacancy_documents')}}</label>
                                    <select name="document[]" class="form-control js-source-states" multiple="multiple" style="width: 100%; " >
                                        @foreach ($documents as $document)
                                            <option value="{{ $document->id }}">{{ trans('vacancies.show.documents.'.$document->title) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-3 col-sm-6 m-b">
                                    <label>{{trans('vacancies.vacancy_experience')}}</label>
                                    <select name="experience[]" class="form-control" >
                                        <option></option>
                                        @foreach ($experiences as $experience)
                                            <option value="{{ $experience->id }}">{{ trans('vacancies.show.exp.'.$experience->title) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-3 col-sm-6 m-b">
                                    <label>{{trans('vacancies.markers')}}</label>
                                    <select name="marker[]" class="form-control js-source-states" multiple="multiple" style="width: 100%; " >
                                        @foreach ($markers as $marker)
                                            <option value="{{ $marker->id }}">{{ trans('vacancies.create.'.$marker->title) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </form>



                    </div>
                </div>

            </div>
        </div>

    </div>
    <div class="content animate-panel">
        <div class="row">
            <div class="col-lg-12">
                <div class="hpanel">

                    <div class="panel-body ajax-contante">


                        <div class="table-responsive">
                            <table cellpadding="1" cellspacing="1" class="m-t table table-condensed table-striped">
                                <thead>
                                <tr>
                                    <th style="width: 8%"></th>
                                    <th>{{trans('vacancies.vacancy_country')}}</th>
                                    <th>{{trans('vacancies.vacancy_title')}}</th>
                                    <th>{{trans('vacancies.author')}}</th>
                                    <th>{{trans('vacancies.vacancy_company')}}</th>
                                </tr>
                                </thead>
                                <tbody class="ajax-row">
                                @include('panel.partials.filter-list', ['vacancies' => $vacancies])
                                </tbody>
                            </table>
                        </div>

                        @include('admin.partials.paginate', ['actions' => $vacancies, 'page' => 1])

                    </div>
                </div>

            </div>
        </div>

    </div>
@endsection
