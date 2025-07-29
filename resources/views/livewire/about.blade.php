<div x-data class="text-[color:#374151]">
    <style>
        :root{
            --axali-purple:#5B32C1;
            --axali-indigo:#6366F1;
            --axali-orange:#FF8B38;
            --border:#E5E7EB;
            --text-900:#111827; --text-700:#374151; --text-600:#4B5563; --text-500:#6B7280;
            --lav:#F5F2FF;
            --nav-height:80px; /* h-20 */
        }
        @media (min-width:1024px){ :root{ --nav-height:96px; } } /* h-24 */

        /* HERO behind transparent nav on load */
        .ax-hero{
            background: linear-gradient(135deg, var(--axali-purple), var(--axali-indigo));
            color:#fff;
            padding-top: calc(var(--nav-height) + 5rem);
        }
        @media (min-width:1024px){
            .ax-hero{ padding-top: calc(var(--nav-height) + 7rem); }
        }
        .ax-hero h1{
            font-weight:800; line-height:1.03; font-size:clamp(2.25rem,5vw,3.75rem);
            position:relative; display:inline-block;
        }
        .ax-hero h1::after{
            content:""; position:absolute; left:0; right:0; height:6px; bottom:-18px;
            background: var(--axali-orange); border-radius:3px; transform:scaleX(0);
            transform-origin:left center;
            animation: underlineDraw 2.8s cubic-bezier(.25,.8,.25,1) .15s forwards;
        }
        @keyframes underlineDraw{
            0% {transform:scaleX(0);} 70% {transform:scaleX(1.03);} 85% {transform:scaleX(.99);} 100% {transform:scaleX(1);}
        }

        .ax-section{ padding-top:5rem; padding-bottom:5rem; }
        .ax-card{
            background:#fff; border:1px solid var(--border); border-radius:16px; box-shadow:0 8px 28px rgba(17,24,39,.06);
        }
        .ax-btn{
            display:inline-block; border-radius:12px; font-weight:600; padding:.95rem 1.4rem;
            color:#fff; background:linear-gradient(90deg,var(--axali-orange),var(--axali-orange));
            box-shadow:0 10px 24px rgba(91,50,193,.22); transition:opacity .2s ease, transform .08s ease;
        }
        .ax-btn:hover{ opacity:.95; } .ax-btn:active{ transform:translateY(1px); }

        .ax-pill{
            display:inline-flex; align-items:center; gap:.5rem; font-size:.75rem; font-weight:600;
            background:#fff; color:var(--axali-purple); border:1px solid var(--axali-purple);
            border-radius:9999px; padding:.35rem .7rem;
        }

        .metric{ text-align:center; color:#111827; }
        .metric .val{ font-weight:700; font-size:2rem; }
        @media (min-width:768px){ .metric .val{ font-size:2.25rem; } }
        .metric .lab{ margin-top:.25rem; font-size:.875rem; color:#6B7280; }
    </style>

    <!-- HERO -->
    <section class="ax-hero text-center pb-24 px-6">
        <h1>Senior operators who deliver measurable change.</h1>
        <p class="max-w-3xl mx-auto mt-10 text-lg md:text-xl text-[#EAE6FF]">
            Axali is a senior engineering and strategy firm partnering with US founders and investors.
            We accelerate delivery, reduce operational risk, and achieve compliance without slowing momentum.
        </p>

        <div class="mt-12">
            <a href="#principles" class="ax-btn">Our principles</a>
        </div>
    </section>

    <!-- METRICS -->
    <section class="ax-section bg-white">
        <div class="max-w-6xl mx-auto px-6">
            <div class="grid grid-cols-2 md:grid-cols-3 gap-y-10 gap-x-6">
                @foreach ($metrics as $m)
                    <div class="metric">
                        <div class="val">{{ $m['value'] }}</div>
                        <div class="lab">{{ $m['label'] }}</div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- PRINCIPLES -->
    <section id="principles" class="ax-section" style="background:var(--lav);">
        <div class="max-w-6xl mx-auto px-6">
            <h2 class="text-3xl md:text-4xl font-bold text-[color:var(--text-900)] text-center">
                Principles that guide every engagement
            </h2>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6 mt-12">
                @foreach ($principles as $p)
                    <div class="ax-card p-6">
                        <h3 class="text-lg font-semibold text-[color:var(--text-900)]">{{ $p['title'] }}</h3>
                        <p class="mt-2 text-[color:var(--text-600)]">{{ $p['desc'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- SECTORS -->
    <section class="ax-section bg-white">
        <div class="max-w-6xl mx-auto px-6">
            <h2 class="text-3xl md:text-4xl font-bold text-[color:var(--text-900)] text-center">
                Where we create leverage
            </h2>
            <div class="grid md:grid-cols-3 gap-6 mt-12">
                @foreach ($sectors as $s)
                    <div class="ax-card p-6">
                        <h3 class="text-lg font-semibold text-[color:var(--text-900)]">{{ $s['title'] }}</h3>
                        <p class="mt-2 text-[color:var(--text-600)]">{{ $s['desc'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- TRUST -->
    <section class="ax-section" style="background:#12131A; color:#fff;">
        <div class="max-w-6xl mx-auto px-6">
            <h2 class="text-3xl md:text-4xl font-bold text-center">Security, compliance, and trust</h2>
            <p class="max-w-3xl mx-auto text-center mt-6 text-[#D6D9FF]">
                We operate under NDAs, with strict access controls and auditable change management.
                The objective is to improve security posture while increasing delivery velocity — not one at the expense of the other.
            </p>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6 mt-12">
                @foreach ($trust as $t)
                    <div class="rounded-xl border border-white/10 bg-white/5 p-6">
                        <p class="text-[#E9EAFF]">{{ $t }}</p>
                    </div>
                @endforeach
            </div>

        </div>
    </section>

    <!-- CTA -->
    <section class="ax-section ax-hero text-center">
        <h2 class="text-3xl md:text-4xl font-bold">Discuss your objectives</h2>
        <p class="max-w-2xl mx-auto mt-4 text-lg text-[#EAE6FF]">
            If you need senior leadership that moves fast and de‑risks delivery, we can help.
            We’ll align scope, KPIs, and a start date.
        </p>
        <a href="https://calendly.com/tpeverelli-axali-consulting/bring-your-vision-to-market-intro-call-clone" class="mt-8 inline-block ax-btn">Book a call</a>
    </section>
</div>
