<table class="table table-bordered table-striped table-sm">
    <thead>
    <tr>
        <th scope="col" class="col text-center">ID</th>
        <th scope="col" class="col text-center">Имя</th>
        <th scope="col" class="col text-center">Фамилия</th>
        <th scope="col" class="col text-center">E-mail</th>
        <th scope="col" class="col text-center">Телефон</th>
        <th scope="col" class="col text-center">Дата создания</th>
        <th scope="col" class="col text-center">Статус</th>
        <th scope="col" class="col text-center">Управление</th>
    </tr>
    </thead>
    <tbody>
    @if(isset($leads))
        @forelse ($leads as $lead)
            <tr>
                <th scope="row" class="align-content-center text-center">
                    <a href="{{ route('lead.edit', $lead->id) }}">{{ $lead->id }}</a>
                </th>
                <td class="text-center align-content-center">{{ $lead->name }}</td>
                <td class="text-center align-content-center">{{ $lead->surname }}</td>
                <td class="text-center align-content-center">{{ $lead->email }}</td>
                <td class="text-center align-content-center">{{ $lead->phone }}</td>
                <td class="text-center align-content-center">{{ date('d.m.Y', strtotime($lead->created_at)) }}</td>
                <td class="text-center align-content-center">
                    <select id="status-1" class="form-select custom-fn-status-select" name="status" data-lead-id="{{ $lead->id }}">
                        <option
                            value="" @if(!isset($lead->status_id)) selected @endif>Выберите...
                        </option>
                        @if(isset($statuses))
                            @foreach($statuses as $status)
                                <option
                                    value="{{ $status->id }}"
                                    @if((isset($lead->status_id) && ($lead->status_id) == $status->id))
                                        selected
                                    @endif>
                                    {{ $status->name }}
                                </option>
                            @endforeach
                        @endif
                    </select>
                </td>
                <td class="text-center align-content-center">
                    <button type="button"
                            class="btn btn-link custom-fn-remove p-0"
                            data-item-id="{{ $lead->id }}"
                            title="Удалить лида">@include('icons.buttons.remove')
                    </button>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="8" class="text-center">Ничего не найдено</td>
            </tr>
        @endforelse
    @endif
    </tbody>
</table>
