@extends('layouts.panels')

@section('content')


    <div class="content normalheader">
        <div class="row">
            <div class="col-lg-12">
                <div class="hpanel">

                    <div class="panel-body">
                        <h2 class="m-b">{{trans('vacancies.edit_vacancy')}}</h2>
                        <form class="form-horizontal add_job_form" method="post" action="{{ route('vacancies.edit', [ 'id' => $data->id ]) }}" enctype="multipart/form-data">
                            {{ csrf_field() }}

                            <input id="company" name="company_id" value="{{ $data->company_id }}" hidden>
                            <input id="author" name="author_id" value="{{ $user->id }}" hidden>

                            <div class="row">

                                <div class="col-lg-6 ">
                                    <div class="row">
                                        <label class="control-label col-md-4 m-b" for="title">{{trans('vacancies.create.job_name')}}</label>
                                        <div class="col-md-8 {{ $errors->has('title') ? 'has-error' : '' }}">
                                            <input id="title" type="text" class="form-control" name="title" value="{{$data->title}}">
                                        </div>

                                    </div>

                                    <div class="hr-line-dashed"></div>

                                </div>

                                <div class="col-lg-6 ">
                                    <div class="row">
                                        <label class="control-label col-md-4 m-b" for="scopes">{{trans('vacancies.create.job_scope')}}</label>
                                        <div class="col-md-8 {{ $errors->has('scope_id') ? 'has-error' : '' }}">
                                            <select class="form-control" id="scopes" name="scope_id">
                                                @if(isset($scopeCategories ))
                                                    @foreach($scopeCategories as $scopeCategory)
                                                        <optgroup label="{{trans('scope.category.'.$scopeCategory->key)}}"></optgroup>
                                                        @foreach($scopeCategory->scopes as $scope)
                                                            <option value="{{ $scope->id }}" {{ ($scope->id == $data->scope_id) ? 'selected' : '' }}>{{ trans('scope.'.$scope->key) }}</option>
                                                        @endforeach
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                    <div class="hr-line-dashed"></div>

                                </div>

                                <div class="col-lg-6 ">
                                    <div class="row">
                                        <label class="control-label col-md-4 m-b" for="countries">{{trans('vacancies.create.job_country')}}</label>
                                        <div class="col-md-8 {{ $errors->has('country') ? 'has-error' : '' }}">
                                            <select id="countries_select" class="form-control country-selector" name="country_id">
                                                @if(isset($countries))
                                                    @foreach($countries as $country)
                                                        <option value="{{ $country->id }}" {{ ($country->id == $data->country_id) ? 'selected' : ''}}>{{ $country->name }}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>

                                    </div>
                                    <div class="hr-line-dashed"></div>

                                </div>

                                <div class="col-lg-6" id="city_row">
                                    <div class="row">
                                        <label class="control-label col-md-4 m-b" for="cities">{{trans('vacancies.create.job_city')}}</label>
                                        <div class="col-md-8 {{ $errors->has('city') ? 'has-error' : '' }}">
                                            <select class="form-control" name="city" id="city_select">
                                                @if(isset($data->country->cities))
                                                    @foreach($data->country->cities as $city)
                                                        <option value="{{ $city->id }}" {{ ($city->id == $data->city_id) ? 'selected' : '' }}>
                                                            {{ $city->name}}
                                                        </option>
                                                    @endforeach
                                                @endif

                                            </select>

                                        </div>

                                    </div>
                                    <div class="hr-line-dashed"></div>

                                </div>

                                <div class="col-lg-6">
                                    <div class="row">
                                        <label class="control-label col-md-4 text-left m-b">{{trans('vacancies.create.candidate_gender')}}</label>

                                        <div class="col-md-8">
                                            @if($data->gender == 1)
                                                <label class="checkbox-inline">
                                                    <input name="gender_male" type="checkbox" class="i-checks" value="1" checked>
                                                    <span class="m-l">{{trans('vacancies.create.candidate_gender_male')}}</span>
                                                </label>
                                                <label class="checkbox-inline">
                                                    <input name="gender_female" type="checkbox" class="i-checks" value="2">
                                                    <span class="m-l">{{trans('vacancies.create.candidate_gender_female')}}</span>
                                                </label>
                                            @endif
                                            @if($data->gender == 2)
                                                <label class="checkbox-inline">
                                                    <input name="gender_male" type="checkbox" class="i-checks" value="1">
                                                    <span class="m-l">{{trans('vacancies.create.candidate_gender_male')}}</span>
                                                </label>
                                                <label class="checkbox-inline">
                                                    <input name="gender_female" type="checkbox" class="i-checks" value="2" checked>
                                                    <span class="m-l">{{trans('vacancies.create.candidate_gender_female')}}</span>
                                                </label>
                                            @endif
                                            @if($data->gender == 3)
                                                <label class="checkbox-inline">
                                                    <input name="gender_male" type="checkbox" class="i-checks" value="1" checked>
                                                    <span class="m-l">{{trans('vacancies.create.candidate_gender_male')}}</span>
                                                </label>
                                                <label class="checkbox-inline">
                                                    <input name="gender_female" type="checkbox" class="i-checks" value="2" checked>
                                                    <span class="m-l">{{trans('vacancies.create.candidate_gender_female')}}</span>
                                                </label>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="hr-line-dashed"></div>

                                </div>
                                <div class="col-lg-6">
                                    <div class="row">
                                        <label class="control-label col-md-4 m-b" for="age-start">{{trans('vacancies.create.candidate_age_from')}}</label>
                                        <div class="col-md-8 @if($errors->has('age_start') || $errors->has('age_end')){{ 'has-error' }}@endif">
                                            <div class="input-group">
                                                <span class="input-group-addon">от</span>
                                                <input id="age-start" type="text" class="form-control" name="age_start" value="{{$data->age_start}}">
                                                <span class="input-group-addon">{{trans('vacancies.create.candidate_age_to')}}</span>
                                                <input id="age-end" type="text" class="form-control" name="age_end" value="{{$data->age_end}}">
                                            </div>
                                        </div>

                                    </div>
                                    <div class="hr-line-dashed"></div>


                                </div>

                                <div class="col-lg-6">
                                    <div class="row">
                                        <label class="control-label col-md-4 m-b pt-no">{{trans('vacancies.create.required_documents')}}</label>
                                        <div class="col-md-8">

                                            <select class="form-control js-source-states-2" multiple="multiple"  name="document[]">

                                                @if(isset($documents))
                                                    @foreach($documents as $document)
                                                        <option value="{{ $document->id }}" {{ (in_array($document->id, $selected_documents)) ? 'selected' : '' }}>
                                                            {{ trans('vacancies.show.documents.'.$document->title) }}
                                                        </option>
                                                    @endforeach
                                                @endif

                                            </select>
                                        </div>

                                    </div>
                                    <div class="hr-line-dashed"></div>

                                </div>
                                <div class="col-lg-6">
                                    <div class="row">
                                        <label class="control-label col-md-4 m-b">{{trans('vacancies.create.candidate_experience')}}</label>
                                        <div class="col-md-8">
                                            <select class="form-control" name="experience_id">

                                                @if(isset($exp))
                                                    @foreach($exp as $xp)
                                                        <option value="{{$xp->id }}" {{ ($xp->id  == $data->experience_id) ? 'selected' : '' }} >{{ trans('vacancies.show.exp.'. $xp->title) }}</option>
                                                    @endforeach
                                                @endif

                                            </select>
                                        </div>

                                    </div>
                                    <div class="hr-line-dashed"></div>

                                </div>

                                <div class="col-lg-6">
                                    <div class="row">
                                        <label class="control-label col-md-4 m-b" for="vacancy-quantity">{{trans('vacancies.create.vacancies_number')}}</label>
                                        <div class="col-md-8 {{ $errors->has('vacancies_quantity') ? 'has-error' : '' }}">
                                            <input id="vacancy-quantity" type="text" class="form-control" name="vacancies_quantity" value="{{$data->vacancies_quantity}}">
                                        </div>

                                    </div>

                                    <div class="hr-line-dashed"></div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="row">
                                        <label class="control-label col-md-4 m-b">{{trans('vacancies.create.recruitment_start')}}</label>
                                        <div class="col-md-8 @if($errors->has('date_from') || $errors->has('date_to')){{ 'has-error' }}@endif">

                                            <div class="input-group date m-b" data-provide="datepicker">
                                                <span class="input-group-addon m-b">от</span>
                                                <input id="date-from" type="text" class="form-control" name="date_from" value="{{$data->date_from}}">
                                                <span class="input-group-addon">
                                                    <span class="fa fa-calendar"></span>
                                                </span>
                                            </div>




                                            <div class="input-group date " data-provide="datepicker">
                                                <span class="input-group-addon m-b">до</span>
                                                <input id="date-to" type="text" class="form-control" name="date_to" value="{{$data->date_to}}">
                                                <span class="input-group-addon">
                                                    <span class="fa fa-calendar"></span>
                                                </span>
                                            </div>


                                        </div>

                                    </div>

                                    <div class="hr-line-dashed"></div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="row">
                                        <label class="control-label col-md-4 text-left m-b">{{trans('vacancies.markers')}}</label>

                                        <div class="col-md-8" id="markers">

                                            @foreach($markers as $marker)
                                                <label class="checkbox-inline checkbox">
                                                    <input name="marker[{{ $marker->id }}]" type="checkbox" class="i-checks" {{(in_array($marker->id, $checked_markers)) ? 'checked' : '' }} data-title="{{$marker->title}}">
                                                    <span class="m-l">{{ trans('vacancies.create.'.$marker->title) }}</span>
                                                </label>
                                            @endforeach

                                        </div>
                                    </div>
                                    <div class="hr-line-dashed"></div>

                                </div>

                                <div class="col-lg-6">
                                    <div class="row" id="price-hide">
                                        <label class="control-label col-md-4 m-b" for="currency-code">{{trans('vacancies.create.job_cost')}}</label>
                                        <div class="col-md-8 {{ $errors->has('price') ? 'has-error' : '' }}">
                                            <div class="input-group">
                                                <input id="price" name="price" type="text" class="form-control" value="{{$data->price}}">
                                                <span class="input-group-addon">{{trans('vacancies.create.currency')}}</span>
                                                <select id="currency-code" class="form-control" name="currency_id">

                                                    @if(isset($currencies))
                                                        @foreach($currencies as $currency)
                                                            <option value="{{$currency->id}}"
                                                                    {{($currency->id == $data->currency_id) ? 'selected' : '' }}>{{ $currency->key }}</option>
                                                        @endforeach
                                                    @endif

                                                </select>
                                            </div>

                                        </div>

                                    </div>
                                    <div class="hr-line-dashed"></div>

                                </div>
                                <div class="col-lg-12">
                                    <textarea name="description" class="summernote form-control" placeholder="">{{ $data->description }}</textarea>
                                    <div class="hr-line-dashed"></div>
                                </div>

                                <div class="col-sm-12">
                                    <div class="row text-center">
                                        <button class="btn btn-success" type="submit" name="publish">{{trans('vacancies.publish_vacancy')}}</button>
                                        <button class="btn btn-primary" type="submit" name="archive">{{($data->is_archived !== 0) ? trans('vacancies.save_to_archive') : trans('vacancies.put_to_archive')}}</button>
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

@section('bottomScripts')
    <script>
        $(function() {

            $('#city_select').select2();


            var renderWithErrorCity = "{{ old('city_id') }}";

            $('#countries_select').on('change', function() {

                var self = $(this);

                    var countryId = self.find(":selected").val(),
                        url = '{{ route("country.get_cities_by_country", ":id") }}',
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

    @include('admin.partials.js_remove_script')

@endsection