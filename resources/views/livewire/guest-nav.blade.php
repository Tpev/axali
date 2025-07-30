{{-- resources/views/livewire/guest-nav.blade.php --}}
<header
    x-data="{ open:false, scrolled:false, dropdownSvc:false, dropdownRes:false }"
    x-init="
        scrolled = window.scrollY > 10;
        window.addEventListener('scroll', () => scrolled = window.scrollY > 10);
    "
    :class="scrolled ? 'bg-white/95 backdrop-blur supports-[backdrop-filter]:backdrop-blur-md shadow-sm' : 'bg-transparent'"
    class="fixed inset-x-0 top-0 z-50 transition-colors duration-300"
>
    <style>[x-cloak]{ display:none !important; }</style>

    <nav class="mx-auto max-w-7xl px-4 md:px-6">
        <div class="flex h-20 md:h-24 items-center justify-between">
            {{-- Logo (white over hero / dark when scrolled) --}}
            <a href="/" class="flex items-center gap-3 shrink-0" aria-label="Axali Consulting – Home">
                <img
                    src="{{ asset('storage/logo-white1.png') }}"
                    alt="Axali Consulting"
                    class="h-14 md:h-16 w-auto"
                    :class="scrolled ? 'hidden' : 'block'"
                >
                <img
                    src="{{ asset('storage/logo-white1.png') }}"
                    alt="Axali Consulting"
                    class="h-14 md:h-16 w-auto"
                    :class="scrolled ? 'block' : 'hidden'"
                >
            </a>

            {{-- Desktop menu --}}
            <div class="hidden lg:flex items-center gap-10">
                {{-- Services dropdown --}}
                <div class="relative"
                     @mouseenter="dropdownSvc=true" @mouseleave="dropdownSvc=false">
                    <button
                        type="button"
                        class="inline-flex items-center gap-2 font-medium transition"
                        :class="scrolled ? 'text-gray-800 hover:text-gray-900' : 'text-white hover:text-white/90'"
                        @click="dropdownSvc = !dropdownSvc"
                        aria-haspopup="true"
                        :aria-expanded="dropdownSvc"
                    >
                        Services
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4"
                             fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>

                    <div x-cloak x-show="dropdownSvc" x-transition.origin.top.left
                         class="absolute left-0 mt-3 w-80 rounded-xl border border-gray-200 bg-white shadow-xl">
                        <div class="p-3">
                            <a href="/#cto" class="block rounded-lg p-3 hover:bg-gray-50">
                                <p class="font-semibold text-gray-900">Fractional CTO</p>
                                <p class="text-sm text-gray-600">Architecture, hiring & 90‑day roadmap.</p>
                            </a>
                            <a href="/#sprint" class="block rounded-lg p-3 hover:bg-gray-50">
                                <p class="font-semibold text-gray-900">Rapid Build Sprint</p>
                                <p class="text-sm text-gray-600">Idea → launch in weeks: MVPs, tools, AI.</p>
                            </a>
                            <a href="/#diligence" class="block rounded-lg p-3 hover:bg-gray-50">
                                <p class="font-semibold text-gray-900">Technical Due Diligence</p>
                                <p class="text-sm text-gray-600">Risk matrix, remediation plan, confidence score.</p>
                            </a>
                        </div>
                    </div>
                </div>

                {{-- Resources dropdown --}}
  {{--              <div class="relative"
                     @mouseenter="dropdownRes=true" @mouseleave="dropdownRes=false">
                    <button
                        type="button"
                        class="inline-flex items-center gap-2 font-medium transition"
                        :class="scrolled ? 'text-gray-800 hover:text-gray-900' : 'text-white hover:text-white/90'"
                        @click="dropdownRes = !dropdownRes"
                        aria-haspopup="true"
                        :aria-expanded="dropdownRes"
                    >
                        Resources
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4"
                             fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>

                    <div x-cloak x-show="dropdownRes" x-transition.origin.top.left
                         class="absolute left-0 mt-3 w-[22rem] rounded-xl border border-gray-200 bg-white shadow-xl">
                        <div class="p-3">
                            <a href="/resources/dd-checklist" class="block rounded-lg p-3 hover:bg-gray-50">
                                <p class="font-semibold text-gray-900">
                                    DD Checklist (PDF)
                                    <span class="ml-2 inline-flex items-center rounded border border-emerald-200 bg-emerald-50 px-1.5 py-0.5 text-[11px] font-medium text-emerald-700">Free</span>
                                </p>
                                <p class="text-sm text-gray-600">Standardized items investors expect.</p>
                            </a>
                            <a href="/resources/architecture-review-template" class="block rounded-lg p-3 hover:bg-gray-50">
                                <p class="font-semibold text-gray-900">Architecture Review Template</p>
                                <p class="text-sm text-gray-600">Pressure‑test scalability & costs.</p>
                            </a>
                            <a href="/insights" class="block rounded-lg p-3 hover:bg-gray-50">
                                <p class="font-semibold text-gray-900">Insights</p>
                                <p class="text-sm text-gray-600">Short, practical posts from the field.</p>
                            </a>
                            <a href="/trust" class="block rounded-lg p-3 hover:bg-gray-50">
                                <p class="font-semibold text-gray-900">Trust Center</p>
                                <p class="text-sm text-gray-600">Security, GDPR / SOC‑2 stance, DPAs.</p>
                            </a>
                        </div>
                    </div>
                </div>--}}

                {{-- Other items from component --}}
                @foreach ($items as $item)
                    @php
                        $isAnchor = str_starts_with($item['href'], '#');
                        $active = !$isAnchor && request()->is(ltrim($item['href'], '/').'*');
                    @endphp
                    <a
                        href="{{ $item['href'] }}"
                        @if(!empty($item['external'])) target="_blank" rel="noopener" @endif
                        class="font-medium transition"
                        :class="scrolled
                            ? '{{ $active ? 'text-gray-900' : 'text-gray-800 hover:text-gray-900' }}'
                            : '{{ $active ? 'text-white' : 'text-white/90 hover:text-white' }}'"
                    >
                        {{ $item['label'] }}
                    </a>
                @endforeach
            </div>

            {{-- Desktop CTA --}}
            <div class="hidden lg:block">
                <a href="https://calendly.com/tpeverelli-axali-consulting/bring-your-vision-to-market-intro-call-clone"
                   class="rounded-xl px-6 py-3 font-semibold text-white shadow-md transition
                          bg-gradient-to-r from-[#FF8B38] to-[#FF8B38] hover:opacity-95">
                    Book a Call
                </a>
            </div>

            {{-- Mobile toggle --}}
            <button
                class="lg:hidden inline-flex items-center justify-center rounded-md p-2 focus:outline-none"
                @click="open = !open"
                :class="scrolled ? 'text-gray-800 hover:text-gray-900' : 'text-white hover:text-white/90'"
                aria-label="Toggle menu"
            >
                <svg x-show="!open" xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none"
                     viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
                <svg x-show="open" xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none"
                     viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>
    </nav>

    {{-- Mobile panel --}}
    <div x-cloak x-show="open" x-transition.origin.top
         class="lg:hidden border-t"
         :class="scrolled ? 'bg-white border-gray-200' : 'bg-white border-transparent'">
        <div class="mx-auto max-w-7xl px-4 py-6 space-y-2">
            <div class="space-y-1">
                {{-- Services collapsible --}}
                <details class="group">
                    <summary class="flex cursor-pointer list-none items-center justify-between rounded-lg px-3 py-2 text-gray-800 hover:bg-gray-50">
                        <span class="font-medium">Services</span>
                        <svg class="h-5 w-5 transition-transform group-open:rotate-180" xmlns="http://www.w3.org/2000/svg"
                             fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </summary>
                    <div class="mt-2 space-y-1">
                        <a href="/#cto" @click="open=false" class="block rounded-lg px-3 py-2 text-gray-700 hover:bg-gray-50">Fractional CTO</a>
                        <a href="/#sprint" @click="open=false" class="block rounded-lg px-3 py-2 text-gray-700 hover:bg-gray-50">Rapid Build Sprint</a>
                        <a href="/#diligence" @click="open=false" class="block rounded-lg px-3 py-2 text-gray-700 hover:bg-gray-50">Technical Due Diligence</a>
                    </div>
                </details>


                {{-- Other items --}}
                @foreach ($items as $item)
                    <a href="{{ $item['href'] }}"
                       @click="open=false"
                       class="block rounded-lg px-3 py-2 text-gray-700 hover:bg-gray-50">
                        {{ $item['label'] }}
                    </a>
                @endforeach
            </div>

            <a href="https://calendly.com/tpeverelli-axali-consulting/bring-your-vision-to-market-intro-call-clone"
               @click="open=false"
               class="mt-4 block rounded-xl px-4 py-3 text-center font-semibold text-white
                      bg-gradient-to-r from-[#FF8B38] to-[#FF8B38] hover:opacity-95">
                Book a Call
            </a>
        </div>
    </div>
    </div>
</header>
