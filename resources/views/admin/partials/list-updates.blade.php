<div class="row">
    @include('admin.partials.actions', ['actions' => $actions, 'status' => $status])
</div>
@include('admin.partials.paginate', ['actions' => $actions, 'page' => $page])