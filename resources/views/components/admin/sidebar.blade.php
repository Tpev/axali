@php
    $links = [
        ['label'=>'Dashboard', 'route'=>'admin.dashboard', 'icon'=>'o-home'],
        ['label'=>'Deals',     'route'=>'admin.deals',     'icon'=>'o-briefcase'],
        ['label'=>'Projects',  'route'=>'admin.projects',  'icon'=>'o-view-columns'],
		['label'=>'Companies', 'route'=>'admin.companies',  'icon'=>'o-building-office-2'],
    ];
@endphp

<aside class="hidden md:block w-56 bg-white border-r shadow-sm">
    <div class="h-16 flex items-center justify-center border-b">
        <img src="{{ asset('storage/logo-white1.png') }}" class="h-9" alt="Axali">
    </div>

    <nav class="px-4 py-6 space-y-1">
        @foreach ($links as $link)
            @php $active = request()->routeIs($link['route']); @endphp
            <a href="{{ route($link['route']) }}"
               class="flex items-center gap-3 rounded-lg px-3 py-2 transition
                      {{ $active
                          ? 'bg-indigo-50 text-indigo-700 font-semibold ring-2 ring-indigo-100'
                          : 'text-gray-700 hover:bg-gray-100 hover:ring-1 hover:ring-gray-200' }}">
                <x-heroicon-s-{{ $link['icon'] }} class="h-5 w-5"/>
                <span>{{ $link['label'] }}</span>
            </a>
        @endforeach
    </nav>
</aside>
