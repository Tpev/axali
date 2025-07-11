
    <style>
        @keyframes heroShift {
            0%   { background-position: 0% 50%; }
            100% { background-position: 100% 50%; }
        }
        .animate-bg {
            background-size: 200% 200%;
            animation: heroShift 18s ease-in-out infinite alternate;
        }
        /* slide-up once element enters viewport (needs @alpinejs/intersect) */
        .animate-slide-up { transform: translateY(60px); opacity: 0;
            transition: all .6s cubic-bezier(.42,.0,.58,1);}
        .animate-slide-up.in-view { transform: translateY(0); opacity: 1;}
    </style>

    <div class="bg-[#12131A] text-white relative" x-data>
        {{-- Sticky CTA --}}
        <a href="#contact"
           class="fixed bottom-6 right-6 z-40 bg-gradient-to-br from-purple-500 to-indigo-500 hover:opacity-90
                  text-white rounded-full shadow-xl px-6 py-3 font-semibold text-sm md:text-base transition">
            Book a 15-min Call →
        </a>

{{-- HERO --}}
<section class="animate-bg text-center py-32 md:py-44 px-4"
         style="background-image:linear-gradient(135deg,#1E1F29 0%,#171721 100%);">

    {{-- Logo upfront --}}
    <img src="{{ asset('storage/logo-white1.png') }}"
         alt="Axali Consulting logo"
         class="mx-auto mb-8 h-16 md:h-24 w-auto" /> 

    <h1 class="text-4xl md:text-6xl font-extrabold leading-tight mb-6">
           Ship Faster. Scale Smarter.
    </h1>

    <p class="max-w-2xl mx-auto text-lg md:text-2xl text-gray-300 leading-relaxed mb-8">
        Fractional CTO & senior engineering leadership for ambitious startups and growing businesses.
    </p>

    <p class="max-w-xl mx-auto text-sm md:text-base text-gray-400 mb-10">
        <strong>Trusted by Series A–C teams</strong> to cut time-to-MVP by 40 % and lower infra spend 30 %.
    </p>

    <a href="#contact"
       class="inline-block px-8 py-4 bg-white text-black rounded-md font-semibold hover:bg-gray-100 transition">
        Book a Call →
    </a>
</section>

        {{-- SERVICES --}}
        <section class="py-20 max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-8 px-4">
            <div class="rounded-xl p-8 bg-gradient-to-br from-indigo-400 to-purple-600 shadow-lg animate-slide-up"
                 x-intersect="$el.classList.add('in-view')">
                <h3 class="text-xl font-bold mb-3 flex items-center gap-2">
                    <x-heroicon-o-sparkles class="w-6 h-6"/> Fractional CTO
                </h3>
                <p class="text-gray-50 leading-relaxed">
                    Senior leadership on demand — architecture, hiring & roadmap.<br>
                    <em class="text-indigo-100/90">↓ 30 % cloud costs for fintech client.</em>
                </p>
            </div>

            <div class="rounded-xl p-8 bg-gradient-to-br from-pink-500 to-fuchsia-500 shadow-lg animate-slide-up"
                 x-intersect="$el.classList.add('in-view')">
                <h3 class="text-xl font-bold mb-3 flex items-center gap-2">
                    <x-heroicon-o-bolt class="w-6 h-6"/> Rapid Prototypes
                </h3>
                <p class="text-gray-50 leading-relaxed">
                    Idea → beta in weeks. MVPs, internal tools, AI agents, automation.<br>
                    <em class="text-pink-100/90">3-week launch for health-tech startup.</em>
                </p>
            </div>

            <div class="rounded-xl p-8 bg-gradient-to-br from-rose-400 to-red-500 shadow-lg animate-slide-up"
                 x-intersect="$el.classList.add('in-view')">
                <h3 class="text-xl font-bold mb-3 flex items-center gap-2">
                    <x-heroicon-o-briefcase class="w-6 h-6"/> Advisory for VCs
                </h3>
                <p class="text-gray-50 leading-relaxed">
                    Tech due-diligence, product audits, founder coaching.<br>
                    <em class="text-rose-100/90">40+ deals reviewed since 2021.</em>
                </p>
            </div>
        </section>

        {{-- WHY AXALI --}}
        <section class="bg-[#1A1B25] py-24 px-6 text-center">
            <h2 class="text-3xl md:text-4xl font-bold mb-10">Why founders pick Axali 🔑</h2>

            <div class="max-w-5xl mx-auto grid md:grid-cols-2 gap-12 text-left">
				<ul class="space-y-4 text-gray-300 text-lg leading-relaxed">
    {{-- Agility --}}
    <li class="flex items-start gap-3">
        <x-heroicon-o-rocket-launch class="w-6 h-6 text-emerald-400 shrink-0"/>
        <span><b>Agility —</b> usable releases land in weeks, not quarters.</span>
    </li>

    {{-- Visibility --}}
    <li class="flex items-start gap-3">
        <x-heroicon-o-eye class="w-6 h-6 text-sky-400 shrink-0"/>
        <span><b>Visibility —</b> live Kanban + weekly demo videos keep you in the loop.</span>
    </li>

    {{-- Ownership --}}
    <li class="flex items-start gap-3">
        <x-heroicon-o-check-badge class="w-6 h-6 text-rose-400 shrink-0"/>
        <span><b>Ownership —</b> we align every tech decision with your business goals.</span>
    </li>
				</ul>

                <blockquote class="bg-[#22232F] rounded-xl p-8 text-gray-200 leading-relaxed flex flex-col gap-4 animate-slide-up"
                            x-intersect="$el.classList.add('in-view')">
                    <p>“Axali reduced our release cycle from monthly to weekly
                        without increasing burn. Best decision of our Series A.”</p>
                    <footer class="text-sm text-indigo-300">— Emma Q., CEO @ MedMetrics</footer>
                </blockquote>
            </div>

            <a href="#contact"
               class="mt-12 inline-block px-8 py-4 bg-white text-black rounded-md font-semibold hover:bg-gray-100 transition">
                Schedule Intro Call →
            </a>
        </section>

{{-- FRACTIONAL CTO PROCESS --}}
<section class="py-24 bg-[#1A1B25] text-white overflow-hidden">
    <h2 class="text-center text-3xl md:text-4xl font-bold mb-16">
        Fractional&nbsp;CTO – Engagement Flow
    </h2>

    <div class="relative max-w-5xl mx-auto">
        <span aria-hidden="true"
              class="absolute left-1/2 -translate-x-1/2 h-full w-px bg-gradient-to-b
                     from-emerald-500/0 via-emerald-500/40 to-emerald-500/0"></span>

        <div class="space-y-16 md:space-y-0 md:grid md:grid-cols-2 md:gap-12">

            {{-- Step 1 --}}
            <div class="md:pr-10 animate-slide-up" x-intersect="$el.classList.add('in-view')" wire:key="cto1">
                <div class="flex items-center gap-4">
                    <div class="shrink-0 rounded-full p-3 bg-emerald-600">
                        <x-heroicon-o-briefcase class="w-6 h-6"/>
                    </div>
                    <h3 class="text-xl font-semibold">Discovery Workshop</h3>
                </div>
                <p class="text-gray-400 mt-3 leading-relaxed">
                    Deep-dive on product vision, current team, and constraints.
                    Align success metrics and communication cadence.
                </p>
            </div>

            {{-- Step 2 --}}
            <div class="md:pl-10 animate-slide-up" x-intersect="$el.classList.add('in-view')" wire:key="cto2">
                <div class="flex items-center gap-4">
                    <div class="shrink-0 rounded-full p-3 bg-indigo-600">
                        <x-heroicon-o-map class="w-6 h-6"/>
                    </div>
                    <h3 class="text-xl font-semibold">90-Day Tech&nbsp;Roadmap</h3>
                </div>
                <p class="text-gray-400 mt-3 leading-relaxed">
                    Architecture decisions, hiring plan, and cost targets
                    documented and signed off by founders.
                </p>
            </div>

            {{-- Step 3 --}}
            <div class="md:pr-10 animate-slide-up" x-intersect="$el.classList.add('in-view')" wire:key="cto3">
                <div class="flex items-center gap-4">
                    <div class="shrink-0 rounded-full p-3 bg-yellow-600">
                        <x-heroicon-o-arrow-path-rounded-square class="w-6 h-6"/>
                    </div>
                    <h3 class="text-xl font-semibold">Execution Loops</h3>
                </div>
                <p class="text-gray-400 mt-3 leading-relaxed">
                    Weekly sprints, live Kanban, Loom demos; unblock engineers,
                    steer vendors, and report burn vs. velocity.
                </p>
            </div>

            {{-- Step 4 --}}
            <div class="md:pl-10 animate-slide-up" x-intersect="$el.classList.add('in-view')" wire:key="cto4">
                <div class="flex items-center gap-4">
                    <div class="shrink-0 rounded-full p-3 bg-rose-600">
                        <x-heroicon-o-arrow-trending-up class="w-6 h-6"/>
                    </div>
                    <h3 class="text-xl font-semibold">Scale &amp; Transition</h3>
                </div>
                <p class="text-gray-400 mt-3 leading-relaxed">
                    Hire permanent leaders, codify runbooks, and exit once the
                    team operates at Series-B maturity.
                </p>
            </div>
        </div>
    </div>

    <div class="text-center mt-20">
        <a href="#contact"
           class="inline-block px-8 py-4 bg-gradient-to-br from-purple-500 to-indigo-500
                  rounded-md font-semibold hover:opacity-90 transition">
            Book a Fractional&nbsp;CTO Intro →
        </a>
    </div>
</section>


        {{-- WHAT WE BUILD & INTEGRATE --}}
        <section class="py-24 max-w-7xl mx-auto px-6">
            <h2 class="text-3xl md:text-4xl font-bold mb-12 text-center">
                What We Build & Integrate
            </h2>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-10
                        text-white/90 text-base leading-relaxed">

                <div class="flex gap-4 animate-slide-up"
                     x-intersect="$el.classList.add('in-view')">
                    <x-heroicon-o-globe-alt class="w-7 h-7 text-indigo-400 shrink-0"/>
                    <div>
                        <h4 class="font-semibold text-lg mb-1">Web Applications</h4>
                        Build secure, scalable SaaS & internal tools.
                    </div>
                </div>

                <div class="flex gap-4 animate-slide-up"
                     x-intersect="$el.classList.add('in-view')">
                    <x-heroicon-o-cpu-chip class="w-7 h-7 text-pink-400 shrink-0"/>
                    <div>
                        <h4 class="font-semibold text-lg mb-1">AI Agents & Integrations</h4>
                        GPT fine-tuning, RAG systems, workflow bots.
                    </div>
                </div>

                <div class="flex gap-4 animate-slide-up"
                     x-intersect="$el.classList.add('in-view')">
                    <x-heroicon-o-chart-bar class="w-7 h-7 text-green-400 shrink-0"/>
                    <div>
                        <h4 class="font-semibold text-lg mb-1">BI & Reporting</h4>
                        Dashboards, metrics pipelines, data viz.
                    </div>
                </div>

                <div class="flex gap-4 animate-slide-up"
                     x-intersect="$el.classList.add('in-view')">
                    <x-heroicon-o-arrows-right-left class="w-7 h-7 text-yellow-400 shrink-0"/>
                    <div>
                        <h4 class="font-semibold text-lg mb-1">Workflow Automation</h4>
                        Bots & triggers to cut manual ops.
                    </div>
                </div>

                <div class="flex gap-4 animate-slide-up"
                     x-intersect="$el.classList.add('in-view')">
                    <x-heroicon-o-circle-stack class="w-7 h-7 text-blue-400 shrink-0"/>
                    <div>
                        <h4 class="font-semibold text-lg mb-1">Data Platforms</h4>
                        ETL, lakes, warehouses, observability.
                    </div>
                </div>

                <div class="flex gap-4 animate-slide-up"
                     x-intersect="$el.classList.add('in-view')">
                    <x-heroicon-o-code-bracket class="w-7 h-7 text-rose-400 shrink-0"/>
                    <div>
                        <h4 class="font-semibold text-lg mb-1">Integrations & APIs</h4>
                        Stripe, HubSpot, custom microservices.
                    </div>
                </div>
            </div>
        </section>
{{-- RAPID PROTOTYPE PROCESS --}}
<section class="py-24 bg-[#18191F] text-white overflow-hidden">
    <h2 class="text-center text-3xl md:text-4xl font-bold mb-16">
        Rapid&nbsp;Prototype – 4-Week Sprint
    </h2>

    <div class="relative max-w-5xl mx-auto">
        <span aria-hidden="true"
              class="absolute left-1/2 -translate-x-1/2 h-full w-px bg-gradient-to-b
                     from-pink-500/0 via-pink-500/40 to-pink-500/0"></span>

        <div class="space-y-16 md:space-y-0 md:grid md:grid-cols-2 md:gap-12">

            {{-- Step 1 --}}
            <div class="md:pr-10 animate-slide-up" x-intersect="$el.classList.add('in-view')" wire:key="mvp1">
                <div class="flex items-center gap-4">
                    <div class="shrink-0 rounded-full p-3 bg-pink-500">
                        <x-heroicon-o-light-bulb class="w-6 h-6"/>
                    </div>
                    <h3 class="text-xl font-semibold">Idea Mapping</h3>
                </div>
                <p class="text-gray-400 mt-3 leading-relaxed">
                    Define the single critical workflow and success metric.
                    No spec bloat—just the sharpest slice.
                </p>
            </div>

            {{-- Step 2 --}}
            <div class="md:pl-10 animate-slide-up" x-intersect="$el.classList.add('in-view')" wire:key="mvp2">
                <div class="flex items-center gap-4">
                    <div class="shrink-0 rounded-full p-3 bg-purple-600">
                        <x-heroicon-o-pencil-square class="w-6 h-6"/>
                    </div>
                    <h3 class="text-xl font-semibold">Clickable&nbsp;Prototype</h3>
                </div>
                <p class="text-gray-400 mt-3 leading-relaxed">
                    Deliver Figma screens &amp; user-flow video; refine with
                    stakeholders before any code is written.
                </p>
            </div>

            {{-- Step 3 --}}
            <div class="md:pr-10 animate-slide-up" x-intersect="$el.classList.add('in-view')" wire:key="mvp3">
                <div class="flex items-center gap-4">
                    <div class="shrink-0 rounded-full p-3 bg-blue-600">
                        <x-heroicon-o-cube-transparent class="w-6 h-6"/>
                    </div>
                    <h3 class="text-xl font-semibold">Build &amp; Demo</h3>
                </div>
                <p class="text-gray-400 mt-3 leading-relaxed">
                    Ship production code behind a feature flag; run an internal
                    demo for real feedback.
                </p>
            </div>

            {{-- Step 4 --}}
            <div class="md:pl-10 animate-slide-up" x-intersect="$el.classList.add('in-view')" wire:key="mvp4">
                <div class="flex items-center gap-4">
                    <div class="shrink-0 rounded-full p-3 bg-green-600">
                        <x-heroicon-o-rocket-launch class="w-6 h-6"/>
                    </div>
                    <h3 class="text-xl font-semibold">Pilot Launch</h3>
                </div>
                <p class="text-gray-400 mt-3 leading-relaxed">
                    Activate pilot users, capture metrics, and hand over
                    a prioritised backlog for v1.0.
                </p>
            </div>
        </div>
    </div>

    <div class="text-center mt-20">
        <a href="#contact"
           class="inline-block px-8 py-4 bg-gradient-to-br from-purple-500 to-indigo-500
                  rounded-md font-semibold hover:opacity-90 transition">
            Start My Prototype →
        </a>
    </div>
</section>

        {{-- QUICK METRICS BAR --}}
        <section class="bg-[#18191F] py-10 px-6">
            <div class="max-w-6xl mx-auto grid grid-cols-3 md:grid-cols-6 gap-y-6 text-center
                        text-gray-200 text-sm md:text-base">
                <div><span class="text-3xl font-bold block">12+</span>Years exp</div>
                <div><span class="text-3xl font-bold block">50+</span>Projects</div>
                <div><span class="text-3xl font-bold block">3</span>Exits supported</div>
                <div><span class="text-3xl font-bold block">40 %</span>MVP time ↓</div>
                <div><span class="text-3xl font-bold block">30 %</span>Infra cost ↓</div>
                <div><span class="text-3xl font-bold block">100 %</span>Senior talent</div>
            </div>
        </section>

        {{-- TECH OVERSIGHT / AUDIT --}}
        <section class="bg-[#1A1B25] py-24 text-center px-6">
            <h2 class="text-3xl md:text-4xl font-bold mb-8">
                Technical Oversight & Future-Proof Audits
            </h2>
            <p class="max-w-3xl mx-auto text-gray-400 text-lg leading-relaxed mb-10">
                Vendor selection, stack reviews, SOC-2 paths — we de-risk decisions before they grow expensive.<br>
                <span class="text-indigo-300">Pay once, save quarters of re-work.</span>
            </p>
            <a href="#contact"
               class="inline-block px-8 py-4 bg-white text-black rounded-md font-semibold hover:bg-gray-100 transition">
                Get an Audit Quote →
            </a>
        </section>


{{-- TECHNICAL DUE-DILIGENCE PROCESS --}}
<section class="py-24 bg-[#12131A] text-white overflow-hidden">
    <h2 class="text-center text-3xl md:text-4xl font-bold mb-16">
        4-Step Technical Due Diligence for Investors
    </h2>

    <div class="relative max-w-5xl mx-auto">
        <span aria-hidden="true"
              class="absolute left-1/2 -translate-x-1/2 h-full w-px bg-gradient-to-b
                     from-indigo-500/0 via-indigo-500/40 to-indigo-500/0"></span>

        <div class="space-y-16 md:space-y-0 md:grid md:grid-cols-2 md:gap-12">

            {{-- Step 1 --}}
            <div class="md:pr-10 animate-slide-up" x-intersect="$el.classList.add('in-view')" wire:key="dd1">
                <div class="flex items-center gap-4">
                    <div class="shrink-0 rounded-full p-3 bg-indigo-600">
                        <x-heroicon-o-phone class="w-6 h-6"/>
                    </div>
                    <h3 class="text-xl font-semibold">Scoping Call</h3>
                </div>
                <p class="text-gray-400 mt-3 leading-relaxed">
                    Align on investment thesis, priority risk areas and data-room access with the lead partner
                    and founding CTO.
                </p>
            </div>

            {{-- Step 2 --}}
            <div class="md:pl-10 animate-slide-up" x-intersect="$el.classList.add('in-view')" wire:key="dd2">
                <div class="flex items-center gap-4">
                    <div class="shrink-0 rounded-full p-3 bg-emerald-600">
                        <x-heroicon-o-clipboard-document-list class="w-6 h-6"/>
                    </div>
                    <h3 class="text-xl font-semibold">Data-Room Sweep</h3>
                </div>
                <p class="text-gray-400 mt-3 leading-relaxed">
                    Analyse architecture docs, run cost &amp; compliance scanners and map third-party
                    licenses, security posture and scaling headroom.
                </p>
            </div>

            {{-- Step 3 --}}
            <div class="md:pr-10 animate-slide-up" x-intersect="$el.classList.add('in-view')" wire:key="dd3">
                <div class="flex items-center gap-4">
                    <div class="shrink-0 rounded-full p-3 bg-amber-600">
                        <x-heroicon-o-users class="w-6 h-6"/>
                    </div>
                    <h3 class="text-xl font-semibold">Leadership & Team Interviews</h3>
                </div>
                <p class="text-gray-400 mt-3 leading-relaxed">
                    Pair-program with engineers and meet tech leadership to gauge decision-making,
                    DevOps maturity, on-call culture and enterprise readiness.
                </p>
            </div>

            {{-- Step 4 --}}
            <div class="md:pl-10 animate-slide-up" x-intersect="$el.classList.add('in-view')" wire:key="dd4">
                <div class="flex items-center gap-4">
                    <div class="shrink-0 rounded-full p-3 bg-rose-600">
                        <x-heroicon-o-presentation-chart-line class="w-6 h-6"/>
                    </div>
                    <h3 class="text-xl font-semibold">Investor Briefing</h3>
                </div>
                <p class="text-gray-400 mt-3 leading-relaxed">
                    Deliver slide deck, risk matrix and “go / fix / walk-away” recommendation,
                    plus a 30-day remediation roadmap for founders.
                </p>
            </div>
        </div>
    </div>

    <div class="text-center mt-20">
        <a href="#contact"
           class="inline-block px-8 py-4 bg-gradient-to-br from-purple-500 to-indigo-500
                  rounded-md font-semibold hover:opacity-90 transition">
            Request Due-Diligence Quote →
        </a>
    </div>
</section>



{{-- CONTACT FORM --}}
<section id="contact" class="py-28 max-w-3xl mx-auto px-6">
    <h2 class="text-3xl md:text-4xl font-bold mb-6 text-center">
        Let’s Talk
    </h2>


    @livewire('contact-form')
</section>



        {{-- FOOTER --}}
        <footer class="bg-black text-gray-400 py-12 px-6 text-center text-sm">




            <p class="opacity-75">© Axali Consulting — All rights reserved.</p>
        </footer>
    </div>

