<div class="grid lg:grid-cols-3 gap-6">

    <x-dashboard.card
        title="Open Deals"
        icon="briefcase"
        gradient="from-emerald-500 to-emerald-700"
    >
        <span class="text-4xl font-extrabold text-gray-900">{{ $openDeals }}</span>
    </x-dashboard.card>

    <x-dashboard.card
        title="Active Projects"
        icon="code-bracket-square"
        gradient="from-sky-500 to-indigo-600"
    >
        <span class="text-4xl font-extrabold text-gray-900">{{ $projectsActive }}</span>
    </x-dashboard.card>

    <x-dashboard.card
        title="Unpaid Invoices"
        icon="currency-dollar"
        gradient="from-rose-500 to-pink-600"
    >
        <span class="text-4xl font-extrabold text-gray-900">
            ${{ number_format($unpaidInvoices,0) }}
        </span>
    </x-dashboard.card>

</div>
