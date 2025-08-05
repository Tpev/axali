<div class="space-y-6">
    <div class="flex items-center justify-between">
        <input type="search" placeholder="Search…" wire:model.debounce.400ms="search"
               class="rounded border px-3 py-1.5">
        <a href="{{ route('admin.companies.create') }}" class="btn btn-indigo">+ New Company</a>
    </div>

    <table class="w-full text-sm">
        <thead>
        <tr><th class="text-left py-2">Name</th><th>Phone</th><th></th></tr>
        </thead>
        <tbody>
        @foreach($companies as $c)
            <tr class="border-t">
                <td class="py-2">{{ $c->name }}</td>
                <td>{{ $c->phone }}</td>
                <td class="text-right">
                    <a class="text-indigo-600"
                       href="{{ route('admin.companies.edit', $c) }}">Edit</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {{ $companies->links() }}
</div>
