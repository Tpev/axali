{{-- resources/views/livewire/admin/deal-create.blade.php --}}
<div wire:key="deal-create" x-data>     {{-- ← single root element --}}

    {{-- Floating “+” button --}}
    <button
        class="fixed bottom-6 right-6 z-40 h-14 w-14 rounded-full bg-indigo-600
               text-white shadow-lg flex items-center justify-center text-3xl
               hover:bg-indigo-700"
        @click="$wire.open = true"
        aria-label="Create deal"
    >+</button>

    {{-- Backdrop + slide‑over modal --}}
    <div x-cloak x-show="$wire.open" class="fixed inset-0 z-50 flex">

        {{-- Backdrop (z‑0) --}}
        <div
            x-show="$wire.open"
            x-transition.opacity
            class="absolute inset-0 bg-black/40 z-0"
            @click="$wire.open = false"
        ></div>

        {{-- Slide‑over panel (z‑10) --}}
        <div
            x-show="$wire.open"
            x-transition.origin.right
            @click.stop    {{-- prevent backdrop close when clicking inside --}}
            class="relative z-10 ml-auto w-full max-w-md bg-white
                   shadow-xl overflow-y-auto"
        >
            <div class="p-6 space-y-6">

                <h2 class="text-xl font-bold">Create new deal</h2>

                {{-- ─── Form fields ───────────────────────────────────────── --}}
                <div class="space-y-4">

                    {{-- Deal name --}}
                    <div>
                        <label class="block text-sm font-medium">Deal name</label>
                        <input type="text" wire:model.defer="dealName"
                               class="w-full rounded border px-3 py-2">
                        @error('dealName')
                            <span class="text-xs text-red-600">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- Customer select OR inline new --}}
                    <div x-data="{ mode: 'select' }">
                        <label class="block text-sm font-medium">Customer</label>

                        {{-- Select existing --}}
                        <template x-if="mode === 'select'">
                            <div class="flex gap-2">
                                <select wire:model.defer="customerId"
                                        class="flex-1 rounded border px-3 py-2">
                                    <option value="">— choose —</option>
                                    @foreach ($customers as $c)
                                        <option value="{{ $c->id }}">{{ $c->company_name }}</option>
                                    @endforeach
                                </select>
                                <button type="button"
                                        class="text-sm text-indigo-600 hover:underline"
                                        @click="mode = 'new'; $wire.set('customerId', null)">
                                    + new
                                </button>
                            </div>
                        </template>

                        {{-- Add new --}}
                        <template x-if="mode === 'new'">
                            <div class="flex gap-2">
                                <input type="text" wire:model.defer="customerNew"
                                       placeholder="Company name"
                                       class="flex-1 rounded border px-3 py-2">
                                <button type="button"
                                        class="text-sm text-indigo-600 hover:underline"
                                        @click="mode = 'select'; $wire.set('customerNew', '')">
                                    cancel
                                </button>
                            </div>
                        </template>

                        @error('customerId')
                            <span class="text-xs text-red-600">{{ $message }}</span>
                        @enderror
                        @error('customerNew')
                            <span class="text-xs text-red-600">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- Owner --}}
                    <div>
                        <label class="block text-sm font-medium">Owner</label>
                        <select wire:model.defer="ownerId"
                                class="w-full rounded border px-3 py-2">
                            <option value="">— pick —</option>
                            @foreach ($owners as $o)
                                <option value="{{ $o->id }}">{{ $o->name }}</option>
                            @endforeach
                        </select>
                        @error('ownerId')
                            <span class="text-xs text-red-600">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- Value --}}
                    <div>
                        <label class="block text-sm font-medium">Estimated value (USD)</label>
                        <input type="number" wire:model.defer="valueEst"
                               class="w-full rounded border px-3 py-2">
                        @error('valueEst')
                            <span class="text-xs text-red-600">{{ $message }}</span>
                        @enderror
                    </div>

                </div>{{-- /form fields --}}

                {{-- ─── Actions ───────────────────────────────────────────── --}}
                <div class="flex justify-end gap-3 pt-2">
                    <button type="button"
                            class="px-4 py-2 rounded border"
                            @click="$wire.open = false">
                        Cancel
                    </button>
                    <button type="button"
                            wire:click="save"
                            class="px-4 py-2 rounded bg-indigo-600 text-white">
                        Create
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
