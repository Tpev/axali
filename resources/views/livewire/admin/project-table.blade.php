<div>
    <input type="text" wire:model.debounce.300ms="search"
           placeholder="Search…" class="mb-4 w-full md:w-64 border rounded px-3 py-2">

    <div class="overflow-x-auto bg-white rounded-xl shadow">
        <table class="min-w-full text-sm">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-4 py-2 text-left">Code</th>
                    <th class="px-4 py-2 text-left">Deal</th>
                    <th class="px-4 py-2 text-left">Stage</th>
                    <th class="px-4 py-2 text-right">Progress</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($projects as $p)
                    <tr class="border-t">
                        <td class="px-4 py-2">{{ $p->code }}</td>
                        <td class="px-4 py-2">{{ $p->deal->name ?? '—' }}</td>
                        <td class="px-4 py-2">{{ $p->stage }}</td>
                        <td class="px-4 py-2 text-right">{{ $p->percent_complete }}%</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="mt-4">{{ $projects->links() }}</div>
</div>
