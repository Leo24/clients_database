<div id="paginate">
@if ($actions->lastPage() > 1)
    <div class="text-center ajsx-paginate" id="ajsx-paginate">
        <div class="btn-group ">
            @if ($actions->previousPageUrl())
                <button type="button" class="btn btn-default" data-url="{{ $actions->previousPageUrl() }}" data-page="{{ 1 }}">
                    <i class="fa fa-chevron-left"></i>
                </button>
            @endif

            @for ($i = 1; $i <= ($actions->lastPage()); $i++)
                <button class="btn btn btn-default  {{ $page == $i ? 'active' : '' }}" data-url="{{ $actions->url($i) }}" data-page="{{ $i }}">{{ $i }}</button>
            @endfor

            @if ($actions->hasMorePages())
                <button type="button" class="btn btn-default"><i class="fa fa-chevron-right" data-url="{{ $actions->nextPageUrl() }}" data-page="{{ $i }}"></i></button>
            @endif
        </div>
    </div>
@endif
</div>