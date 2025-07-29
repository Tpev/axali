@props(['title','icon'=>'chart-bar','bg'=>'from-indigo-500 to-purple-600'])

@php
    // random pastel if none supplied
    $gradient = $attributes->get('gradient', $bg);
@endphp

<div {{ $attributes->merge(['class' => 'relative overflow-hidden rounded-2xl p-6 shadow-lg']) }}>
    {{-- decorative gradient blur --}}
    <div class="absolute inset-0 bg-gradient-to-br {{ $gradient }} opacity-10"></div>

    <div class="relative flex items-start gap-4">
        {{-- icon badge --}}
        <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-xl bg-gradient-to-br {{ $gradient }} text-white shadow">
            <x-heroicon-o-{{ $icon }} class="h-6 w-6"/>
        </div>

        {{-- text block --}}
        <div>
            <h2 class="text-sm font-medium text-gray-500">{{ $title }}</h2>
            <div class="mt-1">
                {{ $slot }}
            </div>
        </div>
    </div>
</div>
