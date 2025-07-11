<div class="max-w-5xl mx-auto p-8">
    <h1 class="text-2xl font-bold mb-6">Incoming Leads</h1>

    <table class="w-full text-left border-collapse">
        <thead class="text-xs uppercase bg-gray-700/30">
            <tr>
                <th class="px-4 py-2">Date</th>
                <th class="px-4 py-2">Name</th>
                <th class="px-4 py-2">Email</th>
                <th class="px-4 py-2">Message</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($leads as $lead)
                <tr class="border-b border-gray-700/20 odd:bg-gray-700/10">
                    <td class="px-4 py-2 text-sm">{{ $lead->created_at->format('Y-m-d H:i') }}</td>
                    <td class="px-4 py-2">{{ $lead->name }}</td>
                    <td class="px-4 py-2">
                        <a href="mailto:{{ $lead->email }}" class="text-indigo-400 hover:underline">
                            {{ $lead->email }}
                        </a>
                    </td>
                    <td class="px-4 py-2 whitespace-pre-line">{{ Str::limit($lead->message, 120) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="mt-6">
        {{ $leads->links() }}
    </div>
</div>
