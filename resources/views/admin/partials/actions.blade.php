@foreach ($actions as $action)
    <div class="col-lg-3">
        <div class="hpanel hgreen contact-panel">
            <div class="panel-body">
                @if(!($action->is_checked))
                    <span class="label label-success pull-right">{{ trans('admin.new') }}</span>
                @endif

                @if(empty($action->user->userInformation->photo))
                    <div class="no-foto photo-user-update m-b">
                        <i class="pe-7s-user fa-5x text-muted"></i>
                    </div>
                @else
                    <div class="photo-user-update image-holder img-circle m-b">
                        <img alt="{{ $action->user->userInformation->last_name or $actions->userInformation->last_name }} {{ $action->user->userInformation->first_name or $actions->userInformation->first_name }}" class="img" src="{{ url('storage/'.$action->user->userInformation->photo) }}">
                        <div style="background: url({{ url('storage/'.$action->user->userInformation->photo) }}) no-repeat center;background-size: cover;" class="img"></div>
                    </div>
                @endif

                <h3>{{ $action->user->userInformation->last_name or '' }} {{ $action->user->userInformation->first_name or '' }}</h3>
                <div class="text-muted font-bold m-b-xs">{{ $action->user->company->name }}</div>
                <p>
                    {{ $action->action == App\User::ACTION_REGISTER ? trans('statuses.register.'.$action->type) : '' }}
                    {{ $action->action == App\User::ACTION_UPDATE ? trans('statuses.update.'.$action->type) : '' }}
                    {{ $action->action == App\User::ACTION_DELETE ? trans('statuses.delete.'.$action->type) : '' }}
                </p>
            </div>
            <div class="panel-footer contact-footer text-center">
            <a href="
            {{ $action->action == App\User::ACTION_REGISTER ? route('verify.register.edit', ['id' => $action->id]) : '' }}
            {{ $action->action == App\User::ACTION_UPDATE ? route('verify.update.edit', ['id' => $action->id]) : '' }}
            {{ $action->action == App\User::ACTION_DELETE ? route('verify.delete.edit', ['id' => $action->id]) : '' }}
                    " class="btn w-xs btn-info">Просмотреть</a>
            </div>
        </div>
    </div>
@endforeach