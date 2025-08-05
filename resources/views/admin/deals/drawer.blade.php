<div
    x-data="dealEditor({{ $deal->id }}, {{ $deal->value_est }}, '{{ e($deal->name) }}', '{{ $deal->stage }}')"
    class="p-6 space-y-6"
>
    {{-- Header --}}
    <div class="flex items-start justify-between">
        <h2 class="text-xl font-bold" x-show="!edit" x-text="name"></h2>

        <template x-if="edit">
            <input x-model="name"
                   class="text-xl font-bold w-full border-b focus:outline-none">
        </template>

        <button class="text-gray-500 hover:text-gray-700 text-lg leading-none"
                @click="$root.drawer = false">&times;</button>
    </div>

    {{-- Details / Form --}}
    <div class="space-y-4 text-sm">
        <div><span class="font-semibold">Customer:</span> {{ $deal->customer->company_name }}</div>
        <div><span class="font-semibold">Owner:</span>    {{ $deal->owner->name }}</div>

        <div>
            <span class="font-semibold">Value (est):</span>
            <span x-show="!edit" x-text="'$' + (value_est/1000).toFixed(1) + 'k'"></span>

            <template x-if="edit">
                <input type="number" min="0" step="1000"
                       x-model="value_est"
                       class="border rounded px-2 py-1 w-32">
            </template>
        </div>

        <div>
            <span class="font-semibold">Stage:</span>
            <span x-show="!edit"
                  x-text="stage.charAt(0).toUpperCase() + stage.slice(1)"></span>

            <template x-if="edit">
                <select x-model="stage" class="border rounded px-2 py-1">
                    @foreach (['lead','qualified','proposal','negotiation','won','lost'] as $s)
                        <option value="{{ $s }}">{{ ucfirst($s) }}</option>
                    @endforeach
                </select>
            </template>
        </div>
    </div>

    {{-- Buttons --}}
    <div class="flex gap-3 pt-4 border-t">
        <button x-show="!edit" class="btn btn-indigo" @click="edit = true">Edit</button>

        <template x-if="edit">
            <div class="flex gap-3">
                <button class="btn btn-emerald" @click="save()">Save</button>
                <button class="btn btn-gray"   @click="cancel()">Cancel</button>
            </div>
        </template>
    </div>
</div>
