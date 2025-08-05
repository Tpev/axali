@if ($deal)
    <div class="p-6 space-y-6">

        {{-- Header --}}
        <div class="flex items-start justify-between">
            <h2 class="text-xl font-bold">{{ $deal->name }}</h2>

            <button wire:click="$dispatch('closeDetail')"
                    class="text-gray-500 hover:text-gray-700 text-lg leading-none">
                &times;
            </button>
        </div>

        {{-- Details --}}
        <div class="space-y-4 text-sm">
            <div><span class="font-semibold">Customer:</span> {{ $deal->customer->company_name }}</div>
            <div><span class="font-semibold">Owner:</span>    {{ $deal->owner->name }}</div>
            <div><span class="font-semibold">Value (est):</span>
                 ${{ number_format($deal->value_est / 1000, 1) }}k
            </div>
            <div><span class="font-semibold">Stage:</span>    {{ ucfirst($deal->stage) }}</div>
        </div>

    </div>
@else
    {{-- Fallback when no deal selected --}}
    <div class="p-6 text-sm text-gray-500 italic">
        Sélectionnez une opportunité pour afficher le détail.
    </div>
@endif
