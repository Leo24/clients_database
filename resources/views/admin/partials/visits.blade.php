<div class="table-responsive">

    {{--@if (sizeof($data))--}}

        <table cellpadding="1" cellspacing="1" class="table table-bordered table-striped table-hover table-articles">
            <thead>
            <tr>
                <th>#ID</th>
                <th>Показания одометра</th>
                <th>Ошибки бензин</th>
                <th>Ошибки газ</th>
                <th><p>Выполненные работы</p>
                    <p>Бензин</p>
                </th>
                <th><p>Выполненные работы</p>
                    <p>Газ</p>
                </th>
                <th>Заметки</th>
                <th>Автомобиль</th>
            </tr>
            </thead>
            <tbody>

            @forelse ($data as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->odometer_reading }}</td>
                    <td>{{ $item->errors_petrol}}</td>
                    <td>{{ $item->errors_gas}}</td>
                    <td>{{ $item->work_petrol}}</td>
                    <td>{{ $item->work_gas}}</td>
                    <td>{{ $item->notes}}</td>
                    <td>
                        <p>{{ $item->car->make}}&nbsp{{ $item->car->model}}</p>
                        <p>{{ $item->car->state_number}}</p>
                    </td>
                    {{--<td class="table-button">--}}
                        {{--<a class="btn btn-info" href="{{ route('admin.article.edit', $item->id) }}" title="{{ trans('article.edit.name') }}">--}}
                            {{--<i class="fa fa-paste"></i>--}}
                        {{--</a>--}}
                        {{--<form method="POST" action="{{ route('admin.article.delete', $item->id) }}">--}}
                            {{--{{ csrf_field() }}--}}
                            {{--<button class="btn btn-danger alert-delete-item" type="submit" title="{{ trans('article.delete') }}">--}}
                                {{--<i class="fa fa-trash-o"></i>--}}
                            {{--</button>--}}
                        {{--</form>--}}
                    {{--</td>--}}
                </tr>
            @empty
                <tr>No data</tr>
            @endforelse
            </tbody>
        </table>
        {{--{!! $data->render() !!}--}}
    {{--@endif--}}
</div>