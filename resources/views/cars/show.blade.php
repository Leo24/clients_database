@extends(($user->isAdmin() ? 'layouts.admin' : 'layouts.panels'))

@section('content')

    <div class="content normalheader content-boxed">
        <div class="row">
            <div class="col-lg-12">
                <div class="hpanel">

                    <div class="panel-body">

                        <div class="info-vacancies">

                            @foreach($data->markers()->get() as $marker)
                                @if($marker->title == 'marker_hot')
                                    <span class="icon-bomb text-danger pull-right m-r"><i class="fa fa-bomb fa-2x"></i></span>
                                @elseif($marker->title == 'marker_free')
                                    <span class="icon-percent text-success pull-right"><i class="fa fa-percent fa-2x"></i></span>
                                @endif
                            @endforeach

                            <h2 class="m-b text-center vacancies-name">{{$data->title}} <small class="text-success">({{$data->date_from}} - {{$data->date_to}})</small></h2>

                        </div>

                        <div class="form-horizontal add_job_form">

                            <div class="form-group">
                                <label class="col-lg-2 control-label">{{trans('vacancies.show.created_by')}}:</label>
                                <div class="col-lg-10"><p class="form-control-static">{{$data->company->name}}</p></div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-2 control-label">{{trans('vacancies.show.scope')}}:</label>
                                <div class="col-lg-10"><p class="form-control-static">{{ $data->scope ? trans('scope.'.$data->scope->title) : '' }}</p></div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-2 control-label">{{trans('vacancies.show.job_country')}}:</label>
                                <div class="col-lg-10"><p class="form-control-static">{{$data->country->name}}</p></div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-2 control-label">{{trans('vacancies.show.job_city')}}:</label>
                                <div class="col-lg-10"><p class="form-control-static">{{$data->city->name}}</p></div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-2 control-label">{{trans('vacancies.show.candidate_gender')}}:</label>
                                <div class="col-lg-10"><p class="form-control-static">{{trans('vacancies.gender.'.$data->gender)}}</p></div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-2 control-label">{{trans('vacancies.show.candidate_age')}}:</label>
                                <div class="col-lg-10"><p class="form-control-static">{{$data->age_start}} {{trans('vacancies.show.candidate_age_union')}} {{$data->age_end}}</p></div>
                            </div>

                            <div class="form-group">
                                <label class="col-lg-2 control-label">{{trans('vacancies.show.required_documents')}}:</label>
                                <div class="col-lg-10">
                                    @foreach($data->documents as $document)
                                        <p class="form-control-static">{{trans('vacancies.show.documents.'.$document->title)}}</p>
                                    @endforeach
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-2 control-label">{{trans('vacancies.show.candidate_experience')}}:</label>
                                <div class="col-lg-10"><p class="form-control-static">{{trans('vacancies.show.exp.'.$data->experience->title)}}</p></div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-2 control-label">{{trans('vacancies.show.vacancies_number')}}:</label>
                                <div class="col-lg-10"><p class="form-control-static">{{$data->vacancies_quantity}}</p></div>
                            </div>
                            @if($data->price !== 0)
                                <div class="form-group">
                                    <label class="col-lg-2 control-label">{{trans('vacancies.show.vacancy_price')}}:</label>
                                    <div class="col-lg-10">
                                        <p class="form-control-static">
                                            <span>{{$data->price}}</span>
                                            <span>{{$data->currency->key}}</span>
                                        </p>
                                    </div>
                                </div>
                            @endif
                            <div class="form-group">
                                <label class="col-lg-2 control-label">{{trans('vacancies.show.vacancy_description')}}:</label>
                                <div class="col-lg-10">
                                    <p class="form-control-static">
                                        {!! $data->description !!}
                                    </p>
                                </div>
                            </div>

                        </div>

                        <div class="text-center">

                            {{--<div class="text-center">--}}

                                @if($user->isAdmin())
                                    <a href="{{route('admin.vacancies.index')}}">
                                        <button type="button" class="btn w-xs btn-success m-b-xs">{{trans('vacancies.back_button')}}</button>
                                    </a>
                                    <button type="button" class="btn w-xs btn-danger vacancy-admin-action m-b-xs" data-action="delete" data-title="{{trans('vacancies.show.delete_title')}}" data-url="{{route('admin.vacancies.delete', ['id' => $data->id])}}">Удалить</button>
                                    <button type="button" class="btn w-xs btn-info vacancy-admin-action m-b-xs" data-action="comment" data-title="{{trans('vacancies.show.comment_title')}}"  data-url="{{route('admin.vacancies.message', ['id' => $data->id])}}">Сообщение компании</button>

                                @elseif( (!$user->isAdmin()) && $data->is_archived == false )
                                    <a href="{{($data->is_archived == false) ? route('vacancies.search'): route('vacancies.index', ['status' => 'is_archived'])}}">
                                        <button type="button" class="btn w-xs btn-success">{{trans('vacancies.back_button')}}</button>
                                    </a>

                                @elseif( (!$user->isAdmin()) && $data->is_archived == true && $user->id == $data->author_id)
                                        <button class="btn btn-success" id="publish-vacancy-from-archive" type="button">{{trans('vacancies.publish_vacancy')}}</button>
                                        <a href="{{route('vacancies.edit', ['id' => $data->id])}}">
                                            <button class="btn btn-info" type="button">{{trans('vacancies.edit_vacancy')}}</button>
                                        </a>
                                        <form class="inline-block" method="POST" action="{{route('vacancies.delete', ['id' => $data->id])}}">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="param" value="author-delete">
                                            <button type="button" class="btn btn-danger alert-delete-item" type="submit" >{{trans('vacancies.delete_vacancy')}}</button>
                                        </form>
                                @else
                                    <a href="{{($data->is_archived == false) ? route('vacancies.index'): route('vacancies.index', ['status' => 'is_archived'])}}">
                                        <button type="button" class="btn w-xs btn-success">{{trans('vacancies.back_button')}}</button>
                                    </a>
                                @endif


                            {{--</div>--}}


                                <form id="vacancy-admin-action-form" class="js-decline hide m-t col-md-6 col-sm-offset-3" action="" method="POST" data-rule="{{trans('vacancies.show.validation_message')}}">
                                    {{csrf_field()}}
                                    <label class="control-label m-b">Оставьте комментарий</label>
                                    <div class="m-b">
                                        <textarea class="form-control textarea" name="comment"></textarea>
                                    </div>
                                    <button class="btn btn-info m-b-xs" type="submit">{{trans('vacancies.show.approve_action')}}</button>
                                    <button class="btn btn-primary js-btn-decline m-b-xs" type="button">{{trans('vacancies.show.cancel_action')}}</button>
                                </form>



                        </div>


                    </div>
                </div>

            </div>
        </div>

    </div>

    @include('admin.partials.js_remove_script')
    @include('panel.vacancies.hidden _edit_for_show')


@endsection


