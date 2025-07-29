<div class="space-y-6">

    {{-- ───── Filters ─────────────────────────────────────────── --}}
    <div class="flex flex-wrap items-center gap-4">
        <input  type="search"
                class="w-60 rounded-lg border px-3 py-2 text-sm"
                placeholder="Search…"
                wire:model.debounce.400ms="search">

        <select class="rounded-lg border px-3 py-2 text-sm" wire:model="owner">
            <option value="all">All owners</option>
            @foreach ($owners as $o)
                <option value="{{ $o->id }}">{{ $o->name }}</option>
            @endforeach
        </select>
    </div>

    {{-- ───── Kanban board ────────────────────────────────────── --}}
    <div class="grid xl:grid-cols-6 md:grid-cols-3 gap-4">
        @foreach ($stages as $stage)
            <div class="bg-gray-100 rounded-xl flex flex-col max-h-[80vh] overflow-hidden">

                {{-- Header --}}
                <div class="px-4 py-3 border-b flex items-center justify-between">
                    <span class="font-semibold capitalize">{{ $stage }}</span>

                    {{-- Sparkline (Livewire ignores internal mutations) --}}
                    <div  wire:ignore
                          class="w-24 h-6"
                          x-data
                          x-init="
                              new ApexCharts($el, {
                                  chart:{type:'area',sparkline:{enabled:true},height:24},
                                  series:[{data:@js($sparkline[$stage])}],
                                  stroke:{width:2},
                                  colors:['#6366F1'],
                                  tooltip:{enabled:false}
                              }).render();
                          ">
                    </div>
                </div>

                {{-- Cards --}}
                <div class="flex-1 overflow-y-auto p-3 space-y-3">
                    @foreach (($board[$stage] ?? []) as $d)
                        <div class="bg-white rounded-lg p-3 shadow cursor-pointer
                                    hover:ring-2 hover:ring-indigo-400"
                             wire:click="selectDeal({{ $d->id }})">

                            <div class="font-medium text-sm">{{ $d->name }}</div>
                            <div class="text-xs text-gray-500">
                                {{ $d->customer->company_name }}
                            </div>

                            <div class="mt-2 flex items-center justify-between">
                                <span class="text-xs text-emerald-700 font-semibold">
                                    ${{ number_format($d->value_est / 1000, 1) }}k
                                </span>
                                <span class="text-[10px] bg-gray-100 text-gray-600 rounded
                                             px-1.5 py-0.5">
                                    {{ $this->ageInStage($d) }} d
                                </span>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>
        <script>
            // Refresh board after a new deal is saved
            Livewire.on('deal-created', () => Livewire.refresh());

            // Close slide‑over when child dispatches `detail-closed`
            Livewire.on('detail-closed', () => @this.closeDetail());
        </script>
    {{-- Deal detail slide‑over --}}
    @if ($selected)
        <livewire:admin.deal-detail :deal-id="$selected->id"
                                    wire:key="deal-detail-{{ $selected->id }}" />
    @endif

    {{-- ───── Floating “+” (new deal) ─────────────────────────── --}}
    <livewire:admin.deal-create wire:key="deal-create" />
</div>

