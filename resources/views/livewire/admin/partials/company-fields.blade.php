<div>
    <label class="block font-medium">Name *</label>
    <input type="text" wire:model.defer="name" class="w-full rounded border px-3 py-2">
    @error('name') <p class="text-red-600 text-xs">{{ $message }}</p> @enderror
</div>

<div class="grid grid-cols-2 gap-4">
    <div>
        <label class="block">Phone</label>
        <input type="text" wire:model.defer="phone" class="w-full rounded border px-3 py-2">
    </div>
    <div>
        <label class="block">Website</label>
        <input type="url" wire:model.defer="website" class="w-full rounded border px-3 py-2">
    </div>
</div>

<div>
    <label class="block">Street</label>
    <input type="text" wire:model.defer="street" class="w-full rounded border px-3 py-2">
</div>

<div class="grid grid-cols-2 gap-4">
    <div>
        <label class="block">City</label>
        <input type="text" wire:model.defer="city" class="w-full rounded border px-3 py-2">
    </div>
    <div>
        <label class="block">Country</label>
        <input type="text" wire:model.defer="country" class="w-full rounded border px-3 py-2">
    </div>
</div>

<div>
    <label class="block">Notes</label>
    <textarea rows="3" wire:model.defer="notes" class="w-full rounded border px-3 py-2"></textarea>
</div>
