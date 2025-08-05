<div class="border rounded-lg p-4 space-y-4">
    <div class="flex justify-between items-center">
        <input type="search" wire:model.debounce.400ms="search"
               placeholder="Search contacts…"
               class="border rounded px-2 py-1 text-sm">
        <button class="btn btn-indigo"
        wire:click="$emitTo('admin.contact-form','openContactForm')">
    + Add Contact
</button>
    </div>

    <table class="w-full text-sm">
        <thead><tr><th>Name</th><th>Email</th><th>Phone</th><th></th></tr></thead>
        <tbody>
        @foreach($contacts as $c)
            <tr class="border-t">
                <td class="py-1">{{ $c->first_name }} {{ $c->last_name }}</td>
                <td>{{ $c->email }}</td>
                <td>{{ $c->phone }}</td>
                <td>
<a href="#" class="text-indigo-600"
   wire:click="$emitTo('admin.contact-form','openContactForm', {{ $c->id }})">
   Edit
</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {{ $contacts->links() }}
</div>

@push('scripts')
<script>
document.addEventListener('contact-saved', () => {
    // just a flash or toast; Livewire auto-refreshes table
});
</script>
@endpush
