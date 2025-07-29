{{-- Backdrop + slide‑over (Alpine handles local state) --}}
<div x-data="{ open: true }" x-cloak x-show="open"
     class="fixed inset-0 z-50 flex">

    {{-- Backdrop --}}
    <div class="absolute inset-0 bg-black/40"
         @click="
             open = false;
             Livewire.dispatch('detail-closed');
         "
         x-transition.opacity></div>

    {{-- Panel --}}
    <div class="relative ml-auto w-full max-w-lg bg-white shadow-xl
                overflow-y-auto z-10"
         x-transition.origin.right
         @click.stop>

        <div class="p-6 space-y-6">

            {{-- Header --}}
            <div class="flex items-start justify-between">
                <h2 class="text-xl font-bold">{{ $deal->name }}</h2>
                <button type="button"
                        class="text-gray-500 hover:text-gray-700"
                        @click="
                            open = false;
                            Livewire.dispatch('detail-closed');
                        ">
                    ✕
                </button>
            </div>

            {{-- Details grid ------------------------------------------------ --}}
            <div class="space-y-4 text-sm">

                <div>
                    <div class="label">Customer</div>
                    <div>{{ $deal->customer->company_name }}</div>
                </div>

                <div>
                    <div class="label">Owner</div>
                    <div>{{ $deal->owner->name }}</div>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <div class="label">Stage</div>
                        <div class="capitalize">{{ $deal->stage }}</div>
                    </div>
                    <div>
                        <div class="label">Est. value</div>
                        <div>${{ number_format($deal->value_est / 100, 2) }}</div>
                    </div>
                </div>

                <div>
                    <div class="label">Created</div>
                    <div>{{ $deal->created_at->format('M j, Y') }}</div>
                </div>

                {{-- Stage history timeline ---------------------------------- --}}
                <div>
                    <div class="label mb-2">Stage history</div>
                    <ol class="relative border-l-2 border-gray-200 pl-4 space-y-2">
                        @foreach ($deal->stageChanges as $change)
                            <li>
                                <span class="dot"></span>
                                <p class="text-xs">
                                    <span class="font-medium capitalize">{{ $change->stage }}</span>
                                    <span class="text-gray-500">
                                        — {{ $change->changed_at->format('M j, Y') }}
                                    </span>
                                </p>
                            </li>
                        @endforeach
                    </ol>
                </div>
            </div>
        </div>
    </div>
@once
    <style>
        .label { @apply text-gray-500 uppercase tracking-wide text-xs; }
        .dot   { @apply absolute -left-1.5 top-1.5 h-3 w-3 rounded-full bg-indigo-500; }
    </style>
@endonce

</div>

