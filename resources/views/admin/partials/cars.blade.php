<div class="table-responsive">

    {{--@if (sizeof($data))--}}

        <table cellpadding="1" cellspacing="1" class="table table-bordered table-striped table-hover table-articles">
            <thead>
            <tr>
                <th>#ID</th>
                <th>Марка</th>
                <th>Модель Авто</th>
                <th>Год</th>
                <th>Гос. номер</th>
                <th>Блок управления</th>
                <th>Чипованная(да/нет)</th>
                <th>Прошлый визит</th>
                <th>Редактирование</th>
            </tr>
            </thead>
            <tbody>

            @forelse ($data as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->make }}</td>
                    <td>{{ $item->model}}</td>
                    <td>{{ $item->year}}</td>
                    <td>{{ $item->state_number}}</td>
                    <td>{{ $item->ecu_name}}</td>
                    <td>{{ $item->chiptuned}}</td>
                    <td>
                        @if(isset($item->visits))
                            @foreach($item->visits as $k => $visit)
                                    @if($k == (count($item->visits)-1))
                                        <p><span>{{$visit->created_at}}</span></p>
                                    @endif
                            @endforeach
                        @endif
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

                    <td class="table-button">
                        <a class="btn btn-info" href="
{{--{{$user->isAdmin() ? route('admin.vacancies.show', ['id' => $item->id]): route('vacancies.show', ['id' => $item->id])}}--}}
                                " title="Просмотр">
                            <i class="fa fa-file-text"></i>
                        </a>

                        <a class="btn btn-primary" href="{{route('car.edit', ['id' => $item->id])}}" title="Редактирование">
                            <i class="fa fa-edit"></i>
                        </a>

                    </td>

                </tr>
            @empty
                <tr>No data</tr>
            @endforelse
            </tbody>
        </table>
        {{--{!! $data->render() !!}--}}
    {{--@endif--}}
</div>