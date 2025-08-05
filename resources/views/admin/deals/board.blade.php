@extends('layouts.admin')

@section('content')
<div x-data="dealBoard()" x-cloak class="space-y-6">

    {{-- ───── Filters ───────────────────────────── --}}
    <div class="flex flex-wrap items-center gap-4">
        <input  type="search"
                x-model="params.search"
                class="w-60 rounded-lg border px-3 py-2 text-sm"
                placeholder="Search…">

        <select x-model="params.owner" class="rounded-lg border px-3 py-2 text-sm">
            <option value="">All owners</option>
            @foreach ($owners as $o)
                <option value="{{ $o->id }}">{{ $o->name }}</option>
            @endforeach
        </select>

        <button class="btn btn-indigo" @click="reload()">Filter</button>
    </div>

    {{-- ───── Kanban board ─────────────────────── --}}
    <div class="grid xl:grid-cols-6 md:grid-cols-3 gap-4">
        @foreach ($stages as $stage)
            <div class="bg-gray-100 rounded-xl flex flex-col max-h-[80vh] overflow-hidden">
                <div class="px-4 py-3 border-b font-semibold capitalize">{{ $stage }}</div>

                <div class="flex-1 overflow-y-auto p-3 space-y-3">
                    @foreach ($board[$stage] as $d)
                        <div  id="deal-card-{{ $d->id }}"
                              class="bg-white rounded-lg p-3 shadow cursor-pointer hover:ring-2 hover:ring-indigo-400"
                              @click="open({{ $d->id }})">

                            <div class="font-medium text-sm">{{ $d->name }}</div>
                            <div class="text-xs text-gray-500">{{ $d->customer->company_name }}</div>

                            <div class="mt-2 flex items-center justify-between">
                                <span class="text-xs text-emerald-700 font-semibold">
                                    ${{ number_format($d->value_est/1000,1) }}k
                                </span>
<span class="text-[10px] bg-gray-100 text-gray-600 rounded-full px-2 py-0.5">
    {{ (int) round(
    \Carbon\Carbon::parse($d->stage_updated_at ?? $d->created_at)
        ->floatDiffInRealDays()
) }} d
</span>


                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>

    {{-- ───── Drawer (always in DOM) ───────────── --}}
    <div x-show="drawer" x-transition.opacity x-cloak class="fixed inset-0 z-50 flex">
        <div class="absolute inset-0 bg-black/40" @click="drawer = false"></div>
        <div class="relative ml-auto w-full max-w-lg bg-white shadow-xl overflow-y-auto z-10" x-ref="panel">
            {{-- HTML fragment injected here --}}
        </div>
    </div>
</div>

@push('scripts')
<script>
/* ───────── Board component ───────── */
function dealBoard () {
    return {
        drawer: false,
        params: {
            search: '{{ request('search') }}',
            owner : '{{ request('owner')  }}'
        },

        open(id) {
            fetch(`{{ route('admin.deals.drawer', ['deal'=>'__ID__']) }}`.replace('__ID__', id))
                .then(r => r.text())
                .then(html => { this.$refs.panel.innerHTML = html; this.drawer = true; });
        },

        reload() {
            const q = new URLSearchParams(this.params).toString();
            window.location = `{{ route('admin.deals') }}?${q}`;
        }
    };
}

/* ───────── Drawer editor (global) ───────── */
function dealEditor(id, valInit, nameInit, stageInit) {
    return {
        edit      : false,
        value_est : valInit,
        name      : nameInit,
        stage     : stageInit,

        cancel() {
            this.edit      = false;
            this.value_est = valInit;
            this.name      = nameInit;
            this.stage     = stageInit;
        },

        save() {
            const url   = `{{ route('admin.deals.update', ['deal'=>'__ID__']) }}`.replace('__ID__', id);
            const token = document.querySelector('meta[name=csrf-token]').content;

            const params = new URLSearchParams({
                _method   : 'PATCH',
                name      : this.name,
                value_est : this.value_est,
                stage     : this.stage,
            });

            fetch(url, {
                method : 'POST',
                headers: {
                    'X-CSRF-TOKEN'    : token,
                    'X-Requested-With': 'XMLHttpRequest',
                    'Accept'          : 'text/html',
                    'Content-Type'    : 'application/x-www-form-urlencoded',
                },
                body: params
            })
            .then(async r => {
                if (!r.ok) {
                    console.error(await r.text());
                    alert('Save failed (' + r.status + ')');
                    return;
                }
                return r.text();
            })
            .then(html => {
                if (!html) return;

                /* Replace drawer HTML */
                const panel = document.querySelector('[x-ref="panel"]');
                if (panel) panel.innerHTML = html;

                /* Live-patch the Kanban card */
                const card = document.getElementById('deal-card-' + id);
                if (card) {
                    card.querySelector('.font-medium').textContent =
                        this.name;
                    card.querySelector('.text-xs.text-emerald-700').textContent =
                        '$' + (this.value_est/1000).toFixed(1) + 'k';
                }

                this.edit = false;
            })
            .catch(err => {
                console.error(err);
                alert('Network error (see console)');
            });
        }
    };
}
</script>
{{-- floating + button to create a deal --}}
<livewire:admin.deal-create wire:key="deal-create" />

@endpush
@endsection
