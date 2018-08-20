<div class="table-responsive">

    {{--@if (sizeof($data))--}}

        <table cellpadding="1" cellspacing="1" class="table table-bordered table-striped table-hover table-articles">
            <thead>
            <tr>
                <th>#ID</th>
                <th>{{ trans('admin.article.title') }}</th>
                <th>{{ trans('admin.article.locale') }}</th>
                <th class="col-md-3">{{ trans('admin.article.category') }}</th>
                <th>{{ trans('admin.article.created') }}</th>
                <th>{{ trans('admin.article.action') }}</th>
            </tr>
            </thead>
            <tbody>
            @forelse ($data as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->title }}</td>
                    <td>{{ $item->language_code}}</td>
                    <td>
                        @foreach($item->categories as $category)
                            <p>{{$category->title}}</p>
                        @endforeach
                    </td>
                    <td>{{ $item->created_at }}</td>
                    <td class="table-button">
                        <a class="btn btn-info" href="{{ route('admin.article.edit', $item->id) }}" title="{{ trans('article.edit.name') }}">
                            <i class="fa fa-paste"></i>
                        </a>
                        <form method="POST" action="{{ route('admin.article.delete', $item->id) }}">
                            {{ csrf_field() }}
                            <button class="btn btn-danger alert-delete-item" type="submit" title="{{ trans('article.delete') }}">
                                <i class="fa fa-trash-o"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>No data</tr>
            @endforelse
            </tbody>
        </table>
        {!! $data->render() !!}
    {{--@endif--}}
</div>