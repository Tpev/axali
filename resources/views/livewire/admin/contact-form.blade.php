{{-- resources/views/livewire/admin/contact-form.blade.php --}}
<div  x-data
      x-show="@entangle('show')"
      x-transition.opacity
      x-cloak
      class="fixed inset-0 z-50 flex items-center justify-center bg-black/40">

    <div x-transition
         class="bg-white rounded-lg shadow-lg p-6 w-full max-w-md">

        <h2 class="text-lg font-semibold mb-4">
            {{ $contact?->id ? 'Edit Contact' : 'New Contact' }}
        </h2>

        <form wire:submit.prevent="save" class="space-y-4">
            <div class="flex gap-2">
                <input wire:model.defer="first_name" placeholder="First"
                       class="w-1/2 border rounded px-2 py-1">
                <input wire:model.defer="last_name"  placeholder="Last"
                       class="w-1/2 border rounded px-2 py-1">
            </div>

            <input wire:model.defer="email" type="email" placeholder="Email"
                   class="w-full border rounded px-2 py-1">

            <input wire:model.defer="phone" placeholder="Phone"
                   class="w-full border rounded px-2 py-1">

            <input wire:model.defer="position" placeholder="Position"
                   class="w-full border rounded px-2 py-1">

            <div class="mt-4 flex justify-end gap-2">
                <button type="button" class="btn btn-gray"
                        @click="$wire.close()">Cancel</button>
                <button class="btn btn-emerald">Save</button>
            </div>
        </form>
    </div>
</div>
