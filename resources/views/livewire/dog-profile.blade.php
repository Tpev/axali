{{-- resources/views/livewire/dog-profile-upgraded.blade.php --}}
{{-- Friendlier colour‑forward remake with Tailwind pastels & subtle animations --}}

@php
    use Illuminate\Support\Str;




    $colorHex = fn(int $v) => $v < 50 ? '#DC2626' : ($v < 75 ? '#F97316' : '#1E6EEB');

    $catHex = [
        'social'    => '#F59E0B',
        'education' => '#14B8A6',
        'skill'     => '#6366F1',
    ];
    $chipHex = [
        'weight'  => '#0EA5E9',  // sky‑500
        'bcs'     => '#9333EA',  // purple‑600
        'vaccine' => '#22C55E',  // green‑500
    ];

    $sortedHistory = collect($history)->sortKeys();
    $originalDate  = $sortedHistory->keys()->first();
    $latestDate    = $sortedHistory->keys()->last();
    [$origG,$origS,$origE,$origSk] = $sortedHistory[$originalDate];
    [$newG, $newS, $newE, $newSk]  = $sortedHistory[$latestDate];
@endphp

{{-- gradient body wrapper applied by parent layout, but add fallback here --}}
<div class="min-h-screen font-inter text-[#0C284C] bg-gradient-to-br from-[#F0F9FF] via-white to-[#FEF9F4] py-12 px-4 sm:px-6 lg:px-8">

    {{-- 1 ▸ Header card --}}
    <section class="max-w-5xl mx-auto bg-white/70 backdrop-blur rounded-3xl ring-1 ring-black/5 shadow-lg p-8 md:p-12 flex flex-col md:flex-row gap-10 transition hover:-translate-y-1 hover:shadow-2xl">
        <img src="{{ asset('storage/'.$photo) }}" alt="{{ $name }}" class="w-40 h-40 md:w-56 md:h-56 object-cover rounded-full ring-4 ring-[#1E6EEB]/30 shadow-md" loading="lazy">

        <div class="flex-1 space-y-2">
            <h1 class="text-4xl font-extrabold flex items-center gap-3">
                {{ $name }}
                <span class="text-xs font-mono bg-[#1E6EEB]/10 text-[#1E6EEB] px-2 py-0.5 rounded">{{ $uid }}</span>
            </h1>
            <p class="text-sm uppercase tracking-wide font-semibold text-gray-700 flex items-center gap-1">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-orange-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l6.16-3.422a12.083 12.083 0 01.84 3.136L12 21l-7-7.286a12.083 12.083 0 01.84-3.136L12 14z"/></svg>
                {{ $breed }}
            </p>
            <p class="text-sm text-gray-600 leading-5">
                <span class="font-medium">Intake:</span> {{ \Carbon\Carbon::parse($intakeDate)->format('M d, Y') }} ·
                <span class="font-medium">Status:</span>
                <span class="inline-block px-2 py-0.5 rounded-full bg-emerald-100 text-emerald-700">{{ $status }}</span>
            </p>

            {{-- radial score --}}
            @php $stroke = $colorHex($score); @endphp
            <div class="flex items-center gap-4 mt-6">
                <div class="relative" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="{{ $score }}">
                    <svg class="w-24 h-24">
                        <circle cx="48" cy="48" r="44" fill="none" stroke="#E2E8F0" stroke-width="8" />
                        <circle cx="48" cy="48" r="44" fill="none" stroke="{{ $stroke }}" stroke-width="8" stroke-dasharray="276" stroke-dashoffset="{{ 276-($score/100)*276 }}" stroke-linecap="round" transform="rotate(-90 48 48)" />
                    </svg>
                    <span class="absolute inset-0 flex items-center justify-center font-bold text-xl text-shadow-white" style="color:{{ $stroke }}">{{ $score }}</span>
                </div>
                <span class="text-sm text-gray-500">Overall score</span>
            </div>
        </div>
    </section>
@php
    $tileIcons = [
        // users icon
        'social' => '<svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-sky-600"
                          fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M17 20h5v-2a3 3 0 00-5.356-1.857M9 20H4v-2a3
                                 3 0 015.356-1.857M15 11a3 3 0 110-6 3 3 0 010 6z" />
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M7 11a3 3 0 110-6 3 3 0 010 6z"/>
                      </svg>',

        // mortar-board icon
        'education' => '<svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-sky-600"
                             fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                          <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 14l9-5-9-5-9 5 9 5z"/>
                          <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 14l6.16-3.422a12.083 12.083 0 01.84 3.136L12
                                   21l-7-7.286a12.083 12.083 0 01.84-3.136L12 14z"/>
                        </svg>',

        // sparkles / star icon
        'skill' => '<svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-sky-600"
                          fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                       <path stroke-linecap="round" stroke-linejoin="round"
                             d="M11.049 2.927c.3-.921 1.603-.921
                                1.902 0l.868 2.675a1 1 0 00.95.69h2.828c.969
                                0 1.371 1.24.588
                                1.81l-2.292 1.666a1 1 0 00-.364
                                1.118l.868 2.675c.3.921-.755
                                1.688-1.538 1.118l-2.292-1.666a1 1 0
                                00-1.175 0l-2.292 1.666c-.783.57-1.838-.197-1.538-1.118l.868-2.675a1
                                1 0 00-.364-1.118L2.97 8.102c-.783-.57-.38-1.81.588-1.81h2.828a1
                                1 0 00.95-.69l.868-2.675z"/>
                     </svg>',
    ];
@endphp


    {{-- 2 ▸ Category tiles --}}
    <section class="max-w-5xl mx-auto mt-12 grid gap-6 grid-cols-1 sm:grid-cols-3">
        @foreach($categories as $lbl=>$val)
            @php $c = $colorHex($val); @endphp
            <div class="bg-[#F0F9FF] rounded-3xl p-6 shadow-lg transition hover:-translate-y-1 hover:shadow-2xl">
<p class="text-sm font-semibold flex items-center gap-1">
    {!! $tileIcons[Str::lower($lbl)] !!}
    {{ ucfirst($lbl) }}
</p>
                <div class="h-3 w-full bg-white/40 rounded overflow-hidden mt-2" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="{{ $val }}">
                    <div class="h-full  animate-[shimmer_3s_infinite]" style="background:{{ $c }};width:{{ $val }}%"></div>
                </div>
                <p class="text-right mt-1 text-sm font-medium" style="color:{{ $c }}">{{ $val }} / 100</p>
            </div>
        @endforeach
    </section>

    {{-- 3 ▸ Scorecard evolution --}}
    <section class="max-w-5xl mx-auto mt-16 bg-[#FEF9F4] rounded-3xl ring-1 ring-black/5 shadow-lg p-8 md:p-10">
        <h2 class="text-xl font-bold mb-6">Scorecard evolution</h2>
        <div class="grid gap-6 sm:grid-cols-2">
            {{-- original --}}
            <div class="bg-white/80 rounded-2xl p-6 space-y-4 ring-1 ring-black/5">
                <h3 class="font-semibold">Original ({{ \Carbon\Carbon::parse($originalDate)->format('M d, Y') }})</h3>
                @foreach([['Global',$origG],['Social',$origS],['Education',$origE],['Skill',$origSk]] as [$l,$v])
                    @php $b=$colorHex($v); @endphp
                    <div>
                        <p class="text-xs text-gray-500 mb-0.5">{{ $l }}</p>
                        <div class="h-2 w-full bg-gray-200 rounded overflow-hidden" role="progressbar" aria-valuenow="{{ $v }}">
                            <div class="h-full bg-[{{ $b }}]" style="background:{{ $b }};width:{{ $v }}%"></div>
                        </div>
                    </div>
                @endforeach
            </div>
            {{-- latest with deltas --}}
            <div class="bg-white/80 rounded-2xl p-6 space-y-4 ring-1 ring-black/5">
                <h3 class="font-semibold">Latest ({{ \Carbon\Carbon::parse($latestDate)->format('M d, Y') }})</h3>
                @foreach([['Global',$newG,$origG],['Social',$newS,$origS],['Education',$newE,$origE],['Skill',$newSk,$origSk]] as [$l,$n,$o])
                    @php $b=$colorHex($n); $d=$n-$o; @endphp
                    <div>
                        <div class="flex justify-between items-center">
                            <p class="text-xs text-gray-500 mb-0.5">{{ $l }}</p>
                            <span class="text-xs font-semibold {{ $d>=0?'text-emerald-600':'text-red-600' }}">{{ $d>0?'+':'' }}{{ $d }}</span>
                        </div>
                        <div class="h-2 w-full bg-gray-200 rounded overflow-hidden" role="progressbar" aria-valuenow="{{ $n }}">
                            <div class="h-full bg-[{{ $b }}]" style="background:{{ $b }};width:{{ $v }}%""></div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        {{-- history toggle table --}}
        <div class="mt-8 text-center">
            @if(!$showHistory)
                <button wire:click="$set('showHistory',true)" class="text-[#1E6EEB] font-semibold">See full history</button>
            @else
                <div class="overflow-x-auto mt-6 rounded-lg shadow">
                    <table class="min-w-full text-sm bg-white/80 divide-y divide-[#E2E8F0]">
                        <thead class="bg-[#1E6EEB]/10">
                            <tr><th class="py-2 px-3">Date</th><th class="py-2 px-3">Global</th><th class="py-2 px-3">Social</th><th class="py-2 px-3">Education</th><th class="py-2 px-3">Skill</th></tr>
                        </thead>
                        <tbody class="divide-y divide-[#E2E8F0]">
                            @foreach($history as $d=>[$g,$s,$e,$sk])
                                <tr>
                                    <td class="py-2 px-3 font-medium">{{ \Carbon\Carbon::parse($d)->format('M d, Y') }}</td>
                                    <td class="py-2 px-3">{{ $g }}</td><td class="py-2 px-3">{{ $s }}</td><td class="py-2 px-3">{{ $e }}</td><td class="py-2 px-3">{{ $sk }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <button wire:click="$set('showHistory',false)" class="mt-4 text-[#1E6EEB] font-semibold">Hide history</button>
            @endif
        </div>
    </section>

    {{-- 4 ▸ Training road-map --}}
    <section class="max-w-5xl mx-auto mt-16 bg-white/90 backdrop-blur rounded-3xl ring-1 ring-black/5 p-8 md:p-10 shadow-lg">
        <h2 class="text-xl font-bold mb-6">Training Road-map</h2>
        @php $all=collect($sessions)->map(fn($s)=>(array)$s); @endphp
        @foreach(['social','education','skill'] as $cat)
            @php $rows=$all->filter(fn($r)=>Str::lower($r['category'])===$cat); if($rows->isEmpty()) continue; $acc=$catHex[$cat]; @endphp
            <div class="mb-10">
                <h3 class="text-lg font-semibold text-[#1E6EEB] mb-3 flex items-center gap-1">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-[#1E6EEB]" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" /></svg>
                    {{ ucfirst($cat) }}
                </h3>
                <div class="overflow-x-auto rounded-lg shadow">
                    <table class="min-w-full text-sm bg-white/80 divide-y divide-[#E2E8F0]">
                        <thead class="bg-[#1E6EEB]/10">
                            <tr><th class="py-2 px-3 text-left">Session</th><th class="py-2 px-3 text-left">Goal</th><th class="py-2 px-3 text-left w-40">Progress</th></tr>
                        </thead>
                        <tbody class="divide-y divide-[#E2E8F0]">
                            @foreach($rows as $s)
                                <tr>
                                    <td class="py-2 px-3 font-medium">{{ $s['title'] }}</td>
                                    <td class="py-2 px-3 text-gray-600">{{ $s['goal'] }}</td>
                                    <td class="py-2 px-3">
                                        <div class="h-2 w-full bg-gray-200 rounded overflow-hidden" role="progressbar" aria-valuenow="{{ intval($s['progress']*100) }}">
                                            <div class="h-full" style="background:{{ $acc }};width:{{ $s['progress']*100 }}%"></div>
                                        </div>
                                        <p class="mt-0.5 text-xs text-right font-semibold text-[#1E6EEB]">{{ intval($s['progress']*100) }}%</p>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endforeach
    </section>

    {{-- 5 ▸ Vet Corner --}}
    <section class="max-w-5xl mx-auto mt-16 bg-[#FFF7ED] rounded-3xl ring-1 ring-black/5 p-8 shadow-lg">
        <h2 class="text-xl font-bold mb-6">Vet Corner</h2>
        <div class="flex flex-wrap gap-4 mb-6">
            <span class="inline-flex items-center gap-1 text-xs font-medium text-white px-3 py-1 rounded-full" style="background:{{ $chipHex['weight'] }}">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z" /></svg>
                {{ $currentWeight }} kg
            </span>
            <span class="inline-flex items-center gap-1 text-xs font-medium text-white px-3 py-1 rounded-full" style="background:{{ $chipHex['bcs'] }}">BCS {{ $bcs }}/9</span>
            <span class="inline-flex items-center gap-1 text-xs font-medium text-white px-3 py-1 rounded-full" style="background:{{ $chipHex['vaccine'] }}">
                Next vaccine {{ \Carbon\Carbon::parse($nextVaccine)->format('M d') }}
            </span>
        </div>
        @if(!$showVisits)
            <button wire:click="$set('showVisits',true)" class="text-[#1E6EEB] font-semibold">Show vet visits</button>
        @else
            <div class="overflow-x-auto rounded-lg shadow">
                <table class="min-w-full text-sm bg-white/80 divide-y divide-[#E2E8F0]">
                    <thead class="bg-[#1E6EEB]/10"><tr><th class="py-2 px-3">Date</th><th class="py-2 px-3">Reason</th><th class="py-2 px-3">Outcome</th><th class="py-2 px-3">Weight</th></tr></thead>
                    <tbody class="divide-y divide-[#E2E8F0]">
                        @foreach($vetVisits as $v)
                            <tr><td class="py-2 px-3 font-medium">{{ \Carbon\Carbon::parse($v['date'])->format('M d, Y') }}</td><td class="py-2 px-3">{{ $v['reason'] }}</td><td class="py-2 px-3">{{ $v['outcome'] }}</td><td class="py-2 px-3">{{ number_format($v['weight'],1) }}</td></tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <button wire:click="$set('showVisits',false)" class="mt-4 text-[#1E6EEB] font-semibold">Hide vet visits</button>
        @endif
    </section>

    {{-- 6 ▸ Care-Team Notes --}}
    <section class="max-w-5xl mx-auto mt-16 bg-[#F8F5FF] rounded-3xl ring-1 ring-black/5 p-8 shadow-lg" wire:init="loadNotes">
        <h2 class="text-xl font-bold mb-6">Care-Team Notes</h2>
        @isset($pinnedNote)
            <div class="bg-[#FEF3C7] border-l-4 border-[#F59E0B] rounded-xl p-4 mb-6 shadow-sm">
                <div class="flex justify-between items-start"><p class="font-semibold">Pinned</p><span class="text-xs text-gray-700">{{ \Carbon\Carbon::parse($pinnedNote['created'])->diffForHumans() }}</span></div>
                <div class="prose max-w-none text-sm mt-2">{!! $pinnedNote['body'] !!}</div>
                <p class="mt-2 text-xs text-gray-600">— {{ $pinnedNote['author'] }}</p>
            </div>
        @endisset
        @if(!$showNotes)
            <button wire:click="$set('showNotes',true)" class="text-[#1E6EEB] font-semibold">Show recent notes</button>
        @else
            <ul class="space-y-4">
                @foreach($notes as $note)
                    <li class="bg-white/80 p-4 rounded-xl shadow ring-1 ring-black/5">
                        <div class="flex justify-between items-center"><p class="font-semibold">{{ $note['author'] }}</p><span class="text-xs text-gray-500">{{ \Carbon\Carbon::parse($note['created'])->diffForHumans() }}</span></div>
                        <div class="prose max-w-none text-sm mt-2">{!! $note['body'] !!}</div>
                    </li>
                @endforeach
            </ul>
            <button wire:click="$set('showNotes',false)" class="mt-4 text-[#1E6EEB] font-semibold">Hide notes</button>
        @endif
    </section>
</div>

@push('styles')
<style>
@keyframes shimmer{0%{background-position:0% 50%}100%{background-position:200% 50%}}
.text-shadow-white{ text-shadow:0 0 2px #fff }
</style>
@endpush
