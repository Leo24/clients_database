<div class="normalheader transition animated fadeIn">
    <div class="hpanel">
        <div class="panel-body">
            <div class="col-sm-4">
            <h3>{{ trans('verification.ticket_status') }}</h3>
                <form id="statuses" method="post" action="{{ route('verify.'.$action) }}">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <div >
                            <select class="form-control m-b" name="status">
                            <option {{ ($status == App\User::STATUS_PENDING) ? 'selected' : '' }} value="{{App\User::STATUS_PENDING}}">{{ trans('admin.'.App\User::STATUS_PENDING) }}</option>
                            <option {{ ($status == App\User::STATUS_ACCEPTED) ? 'selected' : '' }}  value="{{App\User::STATUS_ACCEPTED}}">{{ trans('admin.'.App\User::STATUS_ACCEPTED) }}</option>
                            <option {{ ($status == App\User::STATUS_REJECTED) ? 'selected' : '' }}  value="{{App\User::STATUS_REJECTED}}">{{ trans('admin.'.App\User::STATUS_REJECTED) }}</option>
                            </select>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>  