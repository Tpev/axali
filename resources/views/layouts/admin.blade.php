{{-- resources/views/layouts/admin.blade.php --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Axali Admin</title>
    <meta name="viewport" content="width=device-width,initial-scale=1">
    @vite(['resources/css/app.css','resources/js/app.js'])
    @livewireStyles
</head>
<body class="bg-gray-50 text-gray-800 antialiased">

<div class="flex min-h-screen">
    {{-- Sidebar --}}
    <x-admin.sidebar />

    {{-- Main content --}}
    <div class="flex-1 flex flex-col">
        {{-- Top bar --}}
        <header class="h-16 bg-white shadow-sm flex items-center px-6">
            <h1 class="text-xl font-bold">{{ $title ?? '' }}</h1>

            <div class="ml-auto flex items-center gap-4">
                <span class="text-sm">{{ auth()->user()->name }}</span>

                <form method="POST" action="{{ route('logout') }}" x-data>
                    @csrf
                    <button type="submit"
                            class="text-sm text-indigo-600 hover:underline">
                        Logout
                    </button>
                </form>
            </div>
        </header>

        <main class="flex-1 p-6">
            {{ $slot }}
        </main>
    </div>
</div>

{{-- ========== Scripts ========== --}}
@livewireScripts




{{-- 2 · ApexCharts (used for sparklines) – keep only one copy --}}
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

@stack('scripts')
</body>
</html>
