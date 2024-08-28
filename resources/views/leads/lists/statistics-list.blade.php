<table class="table table-bordered table-striped table-sm">
    <thead>
    <tr>
        <th scope="col" class="col-8 text-center">Статус</th>
        <th scope="col" class="col-4 text-center">Количество</th>
    </tr>
    </thead>
    <tbody>
    @if(isset($statusStatistics))
        @forelse ($statusStatistics as $name => $count)
            <tr>
                <td class="text-center">{{ $name }}</td>
                <td class="text-center">{{ $count }}</td>
            </tr>
        @empty
            <tr>
                <td colspan="2" class="text-center">Ничего не найдено</td>
            </tr>
        @endforelse
    @endif
    <tr>
        <td class="text-center fw-bold">Всего</td>
        <td class="text-center fw-bold">{{ $totalCount }}</td>
    </tr>
    </tbody>
</table>
