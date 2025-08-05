<div class="space-y-6">

    {{-- Filters --}}
    <div class="flex flex-wrap items-center gap-4">
        <input type="search" placeholder="Search…"
               class="w-60 rounded-lg border px-3 py-2 text-sm"
               wire:model.debounce.400ms="search" />

        <select class="rounded-lg border px-3 py-2 text-sm" wire:model="owner">
            <option value="all">All owners</option>
            @foreach($owners as $o)
                <option value="{{ $o->id }}">{{ $o->name }}</option>
            @endforeach
        </select>
    </div>

    {{-- Kanban board --}}
    <div class="grid xl:grid-cols-6 md:grid-cols-3 gap-4">
        @foreach($stages as $stage)
            <div class="bg-gray-100 rounded-xl flex flex-col max-h-[80vh] overflow-hidden">

                {{-- Column header --}}
                <div class="px-4 py-3 border-b flex items-center justify-between">
                    <span class="font-semibold capitalize">{{ $stage }}</span>

                    {{-- Sparkline (inside wire:ignore) --}}
                    <div wire:ignore x-data class="w-24 h-6"
                         x-init="
                            new ApexCharts($el,{
                                chart:{type:'area',sparkline:{enabled:true},height:24},
                                series:[{data:@js($spark[$stage])}],
                                stroke:{width:2},colors:['#6366F1'],
                                tooltip:{enabled:false}
                            }).render();
                         ">
                    </div>
                </div>

                {{-- Cards --}}
                <div class="flex-1 p-3 space-y-3 overflow-y-auto">
                    @foreach($board[$stage] as $d)
                        <div class="bg-white rounded-lg p-3 shadow cursor-pointer hover:ring-2 hover:ring-indigo-400"
                             wire:click="selectDeal({{ $d->id }})">
                            <div class="font-medium text-sm">{{ $d->name }}</div>
                            <div class="text-xs text-gray-500">
                                {{ optional($d->customer)->company_name ?? '—' }}
                            </div>
                            <div class="mt-2 flex items-center justify-between">
                                <span class="text-xs text-emerald-700 font-semibold">
                                    ${{ number_format($d->value_est/1000,1) }}k
                                </span>
                                <span class="text-[10px] bg-gray-100 text-gray-600 rounded px-1.5 py-0.5">
                                    {{ $this->ageInStage($d) }} d
                                </span>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>

{{-- Sidebar – always in DOM --}}
<div x-data="{ o: @entangle('open') }" x-show="o" x-transition.opacity x-cloak
     class="fixed inset-0 z-50 flex" wire:ignore.self>

    {{-- Backdrop --}}
    <div class="absolute inset-0 bg-black/40 cursor-pointer" @click="$wire.close()"></div>

    {{-- Panel --}}
    <div class="relative ml-auto w-full max-w-lg bg-white shadow-xl overflow-y-auto z-10">
        @if ($this->deal)
            <div class="p-6 space-y-6">

                {{-- Header --}}
                <div class="flex items-start justify-between">
                    <h2 class="text-xl font-bold">{{ $this->deal->name }}</h2>
                    <button @click="$wire.close()"
                            class="text-gray-500 hover:text-gray-700 text-lg leading-none">&times;</button>
                </div>

                {{-- Details --}}
                <div class="space-y-4 text-sm">
                    <div><span class="font-semibold">Customer:</span>
                         {{ $this->deal->customer->company_name }}</div>
                    <div><span class="font-semibold">Owner:</span>
                         {{ $this->deal->owner->name }}</div>
                    <div><span class="font-semibold">Value (est):</span>
                         ${{ number_format($this->deal->value_est / 1000, 1) }}k</div>
                    <div><span class="font-semibold">Stage:</span>
                         {{ ucfirst($this->deal->stage) }}</div>
                </div>

            </div>
        @endif
    </div>
</div>


    {{-- Floating “+” stays as separate child --}}
    <livewire:admin.deal-create wire:key="deal-create" />
</div>
