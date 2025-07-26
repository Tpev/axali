<div x-data class="text-[color:#374151]">
    <style>
        :root{
            --axali-purple:#5B32C1;
            --axali-indigo:#6366F1;
            --axali-orange:#FF8B38;
            --border:#E5E7EB;
            --text-900:#111827; --text-700:#374151; --text-600:#4B5563; --text-500:#6B7280;
            --lav:#F5F2FF;
            --nav-height:80px; /* matches h-20 */
        }
        @media (min-width:1024px){ :root{ --nav-height:96px; } } /* matches h-24 */

        /* HERO sits behind the transparent nav; add padding to clear it */
        .ax-hero{
            background: linear-gradient(135deg, var(--axali-purple), var(--axali-indigo));
            color:#fff;
            padding-top: calc(var(--nav-height) + 3rem);
        }
        @media (min-width:1024px){
            .ax-hero{ padding-top: calc(var(--nav-height) + 5rem); }
        }

        .ax-hero h1{
            font-weight:800; line-height:1.03; font-size:clamp(2rem,5vw,3.5rem);
            position:relative; display:inline-block;
        }
        .ax-hero h1::after{
            content:""; position:absolute; left:0; right:0; height:6px; bottom:-18px;
            background: var(--axali-orange); border-radius:3px;
            transform-origin:left center; transform:scaleX(0);
            animation: underlineDraw 2.6s cubic-bezier(.25,.8,.25,1) .2s forwards;
        }
        @keyframes underlineDraw{
            0% {transform:scaleX(0);} 70% {transform:scaleX(1.03);} 85% {transform:scaleX(.99);} 100% {transform:scaleX(1);}
        }

        .ax-section{ padding-top:5rem; padding-bottom:5rem; }
        .ax-card{
            background:#fff; border:1px solid var(--border); border-radius:16px; box-shadow:0 8px 28px rgba(17,24,39,.06);
        }
        .ax-card-heading{ color:var(--text-900); font-weight:600; font-size:1.125rem; }
        .ax-pill{
            display:inline-flex; align-items:center; gap:.5rem; font-size:.75rem; font-weight:600;
            background:#fff; color:var(--axali-purple); border:1px solid var(--axali-purple);
            border-radius:9999px; padding:.35rem .7rem;
        }
        .ax-btn{
            display:inline-block; border-radius:12px; font-weight:600; padding:.9rem 1.4rem; transition:opacity .2s ease, transform .08s ease;
            color:#fff; background:linear-gradient(90deg,var(--axali-purple),var(--axali-indigo));
            box-shadow:0 10px 24px rgba(91,50,193,.22);
        }
        .ax-btn:hover{ opacity:.95; }
        .ax-btn:active{ transform:translateY(1px); }

        .ax-input{
            width:100%; background:#fff; border:1px solid var(--border); border-radius:12px;
            padding:.875rem .95rem; color:var(--text-900);
            transition:border-color .15s ease, box-shadow .15s ease;
        }
        .ax-input:focus{
            outline:none; border-color:var(--axali-purple); box-shadow:0 0 0 3px rgba(91,50,193,.18);
        }
        .ax-label{ display:block; font-size:.875rem; color:var(--text-600); margin-bottom:.375rem; }
        .ax-error{ color:#DC2626; font-size:.75rem; margin-top:.375rem; }
        .ax-success{ color:#10B981; }

        .faq summary{ list-style:none; cursor:pointer; }
        .faq summary::-webkit-details-marker{ display:none; }

        .list-tight li{ margin-bottom:.5rem; }
    </style>

    <!-- HERO (purple behind transparent nav) -->
    <section class="ax-hero text-center pb-24 px-6">
        <h1>US‑first senior talent. Contract with Axali.</h1>
        <p class="max-w-3xl mx-auto mt-10 text-lg md:text-xl text-[#EAE6FF]">
            Axali provides senior technology and commercial capability to US founders and investors.
            We contract experts who deliver measurable outcomes with security, reliability, and speed.
        </p>
        <div class="mt-10 flex flex-wrap gap-3 justify-center">
            <span class="ax-pill">US time zones (PT–ET)</span>
            <span class="ax-pill">EU overlap optional</span>
            <span class="ax-pill">Senior expertise only</span>
        </div>
        <div class="mt-12">
            <a href="#roles" class="ax-btn">View open roles</a>
        </div>
    </section>

    <!-- WHY AXALI -->
    <section class="ax-section bg-white">
        <div class="max-w-6xl mx-auto px-6">
            <h2 class="text-3xl md:text-4xl font-bold text-[color:var(--text-900)] text-center">
                Working with Axali
            </h2>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6 mt-12">
                @foreach($benefits as $b)
                    <div class="ax-card p-6">
                        <h3 class="ax-card-heading">{{ $b['title'] }}</h3>
                        <p class="mt-2 text-[color:var(--text-600)]">{{ $b['desc'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- ROLES -->
    <section id="roles" class="ax-section">
        <div class="max-w-6xl mx-auto px-6">
            <h2 class="text-3xl md:text-4xl font-bold text-[color:var(--text-900)] text-center">
                Open roles
            </h2>

            <div class="grid md:grid-cols-2 gap-8 mt-12">
                @foreach ($roles as $role)
                    <article class="ax-card p-8 flex flex-col">
                        <header>
                            <h3 class="text-2xl font-semibold text-[color:var(--text-900)]">{{ $role['title'] }}</h3>
                            <p class="mt-2 text-[color:var(--text-600)]">{{ $role['summary'] }}</p>
                            <p class="mt-4 text-sm text-[color:var(--text-500)]">{{ $role['type'] }}</p>
                            <p class="mt-1 text-xs text-[color:var(--text-500)]">{{ $role['region'] }}</p>
                            <div class="mt-4 flex flex-wrap gap-2">
                                @foreach ($role['tags'] as $tag)
                                    <span class="text-xs rounded-full border border-[color:var(--border)] px-2 py-1 text-[color:var(--text-600)]">{{ $tag }}</span>
                                @endforeach
                            </div>
                        </header>

                        @if (!empty($role['responsibilities']))
                        <section class="mt-6">
                            <h4 class="ax-card-heading mb-2">Primary responsibilities</h4>
                            <ul class="list-disc list-inside text-[color:var(--text-600)] list-tight">
                                @foreach ($role['responsibilities'] as $li)
                                    <li>{{ $li }}</li>
                                @endforeach
                            </ul>
                        </section>
                        @endif

                        @if (!empty($role['requirements']))
                        <section class="mt-6">
                            <h4 class="ax-card-heading mb-2">Core requirements</h4>
                            <ul class="list-disc list-inside text-[color:var(--text-600)] list-tight">
                                @foreach ($role['requirements'] as $li)
                                    <li>{{ $li }}</li>
                                @endforeach
                            </ul>
                        </section>
                        @endif

                        <div class="mt-8">
                            <button
                                type="button"
                                class="ax-btn"
                                wire:click="applyFor('{{ $role['slug'] }}')"
                                x-on:click="$el.scrollIntoView({behavior:'smooth',block:'center'})"
                            >
                                Apply for {{ $role['title'] }}
                            </button>
                        </div>
                    </article>
                @endforeach
            </div>
        </div>
    </section>

    <!-- SELECTION PROCESS -->
    <section class="ax-section" style="background:var(--lav);">
        <div class="max-w-6xl mx-auto px-6">
            <h2 class="text-3xl md:text-4xl font-bold text-[color:var(--text-900)] text-center">
                Selection & contracting process
            </h2>

            <div class="grid lg:grid-cols-2 gap-8 mt-12">
                <div class="ax-card p-6">
                    <h3 class="ax-card-heading">1. Application review</h3>
                    <p class="mt-2 text-[color:var(--text-600)]">Screening based on seniority, domain relevance, and outcome examples.</p>
                </div>
                <div class="ax-card p-6">
                    <h3 class="ax-card-heading">2. Panel interview</h3>
                    <p class="mt-2 text-[color:var(--text-600)]">30–45 minutes with Axali leadership covering delivery history, communication, and stakeholder management.</p>
                </div>
                <div class="ax-card p-6">
                    <h3 class="ax-card-heading">3. Practical assessment</h3>
                    <p class="mt-2 text-[color:var(--text-600)]">Role‑specific scenario (technical case or commercial plan). Focus on reasoning, risk management, and clarity.</p>
                </div>
                <div class="ax-card p-6">
                    <h3 class="ax-card-heading">4. Compliance & references</h3>
                    <p class="mt-2 text-[color:var(--text-600)]">References required. For certain assignments, background checks, NDA, and security policy acceptance apply.</p>
                </div>
                <div class="ax-card p-6">
                    <h3 class="ax-card-heading">5. Offer, MSA & SOW</h3>
                    <p class="mt-2 text-[color:var(--text-600)]">We execute an Axali MSA and role‑specific SOW with scope, KPIs, rates, and confidentiality terms.</p>
                </div>
                <div class="ax-card p-6">
                    <h3 class="ax-card-heading">6. Onboarding & delivery</h3>
                    <p class="mt-2 text-[color:var(--text-600)]">Access provisioning, runbooks, reporting cadence, and success metrics. Performance reviewed against KPIs.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ -->
    <section class="ax-section bg-white">
        <div class="max-w-5xl mx-auto px-6">
            <h2 class="text-3xl md:text-4xl font-bold text-[color:var(--text-900)] text-center">FAQ & policies</h2>

            <div class="faq mt-12 space-y-4">
                @foreach ($faqs as $f)
                    <details class="ax-card p-6 group">
                        <summary class="flex items-center justify-between gap-4">
                            <span class="text-lg font-semibold text-[color:var(--text-900)]">{{ $f['q'] }}</span>
                            <svg class="h-6 w-6 text-[color:var(--text-600)] transition-transform group-open:rotate-180" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                            </svg>
                        </summary>
                        <p class="mt-4 text-[color:var(--text-600)]">{{ $f['a'] }}</p>
                    </details>
                @endforeach
            </div>

            <p class="mt-10 text-sm text-[color:var(--text-500)] text-center">
                Axali is an Equal Opportunity Employer. We evaluate qualified applicants without regard to race, color, religion, sex, sexual orientation,
                gender identity, national origin, disability, veteran status, or any other protected characteristic.
            </p>
        </div>
    </section>

    <!-- APPLICATION FORM -->
    <section id="apply" class="ax-section">
        <div class="max-w-3xl mx-auto px-6">
            <h2 class="text-3xl md:text-4xl font-bold text-[color:var(--text-900)] text-center">Submit your application</h2>

            @if ($sent)
                <div class="ax-card p-10 text-center">
                    <p class="text-2xl font-bold ax-success">Thank you — application received.</p>
                    <p class="mt-3 text-[color:var(--text-700)]">Our team will review your profile and respond within one business day.</p>
                    <button class="mt-6 ax-btn" wire:click="$set('sent', false)">Submit another</button>
                </div>
            @else
                <form class="ax-card p-8 md:p-10 space-y-6" wire:submit.prevent="submit">
                    <div class="grid md:grid-cols-2 gap-6">
                        <div>
                            <label class="ax-label" for="name">Full name</label>
                            <input id="name" type="text" class="ax-input" wire:model.defer="name" placeholder="Jane Doe"
                                   @error('name') aria-invalid="true" aria-describedby="err-name" @enderror>
                            @error('name') <p id="err-name" class="ax-error">{{ $message }}</p> @enderror
                        </div>
                        <div>
                            <label class="ax-label" for="email">Email</label>
                            <input id="email" type="email" class="ax-input" wire:model.defer="email" placeholder="jane@company.com"
                                   @error('email') aria-invalid="true" aria-describedby="err-email" @enderror>
                            @error('email') <p id="err-email" class="ax-error">{{ $message }}</p> @enderror
                        </div>
                    </div>

                    <div>
                        <label class="ax-label" for="role">Role</label>
                        <input id="role" type="text" class="ax-input" wire:model.defer="role"
                               placeholder="e.g. Key Account Manager (Enterprise / Healthcare)"
                               @error('role') aria-invalid="true" aria-describedby="err-role" @enderror>
                        @error('role') <p id="err-role" class="ax-error">{{ $message }}</p> @enderror
                    </div>

                    <div class="grid md:grid-cols-2 gap-6">
                        <div>
                            <label class="ax-label" for="location">Location / Time zone</label>
                            <input id="location" type="text" class="ax-input" wire:model.defer="location" placeholder="US — ET  |  US — PT  |  EU — CET"
                                   @error('location') aria-invalid="true" aria-describedby="err-location" @enderror>
                            @error('location') <p id="err-location" class="ax-error">{{ $message }}</p> @enderror
                        </div>
                        <div>
                            <label class="ax-label" for="rate">Rate expectation (USD)</label>
                            <input id="rate" type="text" class="ax-input" wire:model.defer="rate" placeholder="$ / hour or $ / day"
                                   @error('rate') aria-invalid="true" aria-describedby="err-rate" @enderror>
                            @error('rate') <p id="err-rate" class="ax-error">{{ $message }}</p> @enderror
                        </div>
                    </div>

                    <div>
                        <label class="ax-label" for="links">Links (GitHub, portfolio, LinkedIn)</label>
                        <input id="links" type="text" class="ax-input" wire:model.defer="links" placeholder="https://github.com/..., https://www.linkedin.com/in/..."
                               @error('links') aria-invalid="true" aria-describedby="err-links" @enderror>
                        @error('links') <p id="err-links" class="ax-error">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label class="ax-label" for="message">Summary of relevant outcomes</label>
                        <textarea id="message" rows="6" class="ax-input"
                                  wire:model.defer="message"
                                  placeholder="Briefly describe measurable outcomes you led (e.g., release cadence, cost reductions, SLOs achieved, ARR growth, renewals), availability, and earliest start."></textarea>
                        @error('message') <p class="ax-error">{{ $message }}</p> @enderror
                    </div>

                    <button type="submit" class="ax-btn w-full">Submit application</button>
                </form>
            @endif
        </div>
    </section>

    <!-- CTA -->
    <section class="ax-section ax-hero text-center">
        <h2 class="text-3xl md:text-4xl font-bold">Discuss an opportunity</h2>
        <p class="max-w-2xl mx-auto mt-4 text-lg text-[#EAE6FF]">
            If your profile aligns with our senior benchmarks, we will propose a specific scope, KPIs, and start date.
        </p>
        <a href="#contact" class="mt-8 inline-block ax-btn">Book a call</a>
    </section>
</div>
