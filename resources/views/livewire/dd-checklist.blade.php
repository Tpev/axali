<div x-data class="text-[color:#374151]">
    @verbatim
    <style>
        :root{
            --axali-purple:#5B32C1;
            --axali-indigo:#6366F1;
            --axali-orange:#FF8B38;
            --border:#E5E7EB;
            --text-900:#111827; --text-700:#374151; --text-600:#4B5563; --text-500:#6B7280;
            --lav:#F5F2FF;
            --nav-height:80px;
        }
        @media (min-width:1024px){ :root{ --nav-height:96px; } }

        .hero{
            background: linear-gradient(135deg, var(--axali-purple), var(--axali-indigo));
            color:#fff;
            padding-top: calc(var(--nav-height) + 5rem);
        }
        @media (min-width:1024px){
            .hero{ padding-top: calc(var(--nav-height) + 6.5rem); }
        }
        .hero h1{
            font-weight:800; line-height:1.03; font-size:clamp(2.25rem,5vw,3.5rem);
            position:relative; display:inline-block;
        }
        .hero h1::after{
            content:""; position:absolute; left:0; right:0; height:6px; bottom:-18px;
            background: var(--axali-orange); border-radius:3px; transform:scaleX(0);
            transform-origin:left center;
            animation: underlineDraw 2.8s cubic-bezier(.25,.8,.25,1) .15s forwards;
        }
        @keyframes underlineDraw{
            0% {transform:scaleX(0);} 70% {transform:scaleX(1.03);} 85% {transform:scaleX(.99);} 100% {transform:scaleX(1);}
        }

        .section{ padding:5rem 0; }
        .card{ background:#fff; border:1px solid var(--border); border-radius:16px; box-shadow:0 8px 28px rgba(17,24,39,.06); }
        .btn{
            display:inline-block; border-radius:12px; font-weight:600; padding:.95rem 1.4rem;
            color:#fff; background:linear-gradient(90deg,var(--axali-purple),var(--axali-indigo));
            box-shadow:0 10px 24px rgba(91,50,193,.22); transition:opacity .2s ease, transform .08s ease;
        }
        .btn:hover{ opacity:.95; } .btn:active{ transform:translateY(1px); }

        .pill{
            display:inline-flex; align-items:center; gap:.5rem; font-size:.75rem; font-weight:600;
            background:#fff; color:var(--axali-purple); border:1px solid var(--axali-purple);
            border-radius:9999px; padding:.35rem .7rem;
        }

        .score-badge{
            display:inline-flex; align-items:center; gap:.5rem; font-weight:700; border-radius:9999px; padding:.5rem .9rem; font-size:1rem;
        }
        .score-green{ background:#ECFDF5; color:#065F46; border:1px solid #A7F3D0; }
        .score-yellow{ background:#FFFBEB; color:#92400E; border:1px solid #FDE68A; }
        .score-red{ background:#FEF2F2; color:#991B1B; border:1px solid #FECACA; }

        .grid-td{
            padding:.75rem .75rem; border-bottom:1px solid var(--border);
            font-size:.95rem; color:var(--text-700);
        }

        /* --- Risk badges --- */
        .risk-badge{
            display:inline-flex;align-items:center;gap:.45rem;
            font-weight:700;border-radius:9999px;padding:.4rem .8rem;font-size:.95rem;
        }
        .risk-red{background:#FEF2F2;color:#991B1B;border:1px solid #FECACA;}
        .risk-yellow{background:#FFFBEB;color:#92400E;border:1px solid #FDE68A;}
        .risk-green{background:#ECFDF5;color:#065F46;border:1px solid #A7F3D0;}

        /* --- Radar styles --- */
        .radar-grid circle{ fill:none; stroke:#E5E7EB; opacity:.7; }
        .radar-axis line{ stroke:#D1D5DB; opacity:.85; }
        .radar-shape{ fill: rgba(99,102,241,.15); stroke: var(--axali-purple); stroke-width:2; }
        .radar-label{ font-size:.78rem; fill: var(--text-700); text-anchor: middle; }
        .heat-cell{
            width:64px;height:64px;border-radius:14px;border:1px solid var(--border);
            display:flex;align-items:center;justify-content:center;font-weight:700;color:#111827;
        }
        .heat-grid{ display:grid; grid-template-columns: repeat(4, minmax(0, 1fr)); gap:16px; }

        @media print{
            header, footer, nav, .no-print{ display:none !important; }
            .hero{ color:#000 !important; background:#fff !important; padding-top:0 !important; }
            .hero h1::after{ background:#000 !important; }
            a{ color:#000 !important; text-decoration:none !important; }
            .btn{ display:none !important; }
            .section{ padding:2rem 0; }
        }
    </style>
    @endverbatim

    <!-- HERO -->
    <section class="hero text-center pb-24 px-6">
        <h1>Technical Due Diligence Checklist</h1>
        <p class="max-w-3xl mx-auto mt-10 text-lg md:text-xl text-[#EAE6FF]">
            A practical, investor‑grade checklist to assess release, reliability, security, data protection,
            compliance, costs, and leadership. Designed for a sub‑10‑day DD window.
        </p>
        <div class="mt-10 flex flex-wrap gap-3 justify-center">
            <span class="pill">Investor & founder friendly</span>
            <span class="pill">Evidence over claims</span>
            <span class="pill">Actionable 30‑day plan</span>
        </div>
        <div class="mt-12 flex items-center justify-center gap-4 no-print">
            <a href="#scoring" class="btn">Use the scoring model</a>
            <button class="btn" onclick="window.print()">Print / Save PDF</button>
        </div>
    </section>

    <!-- WHAT THIS IS -->
    <section class="section bg-white">
        <div class="max-w-6xl mx-auto px-6">
            <div class="grid lg:grid-cols-3 gap-8">
                <div class="lg:col-span-2">
                    <h2 class="text-3xl md:text-4xl font-bold text-[color:var(--text-900)]">What this is</h2>
                    <p class="mt-6 text-[color:var(--text-700)] text-lg">
                        A focused audit framework to identify risks and opportunities before investment.
                        The output is a <strong>Red/Yellow/Green matrix</strong>, a <strong>confidence score</strong>, and a
                        <strong>30‑day remediation plan</strong> to support the investment memo.
                    </p>
                    <h3 class="mt-10 text-xl font-semibold text-[color:var(--text-900)]">Scope guardrails</h3>
                    <ul class="mt-3 list-disc list-inside text-[color:var(--text-700)] space-y-2">
                        <li>Prioritize <strong>evidence over claims</strong> — configs, logs, dashboards, policy extracts.</li>
                        <li>Sample source as needed; avoid line‑by‑line review unless red flags appear.</li>
                        <li>Time‑box to the most material systems and workflows.</li>
                    </ul>
                </div>
                <aside class="card p-6">
                    <h4 class="text-lg font-semibold text-[color:var(--text-900)]">Data‑room evidence to request</h4>
                    <ul class="mt-4 list-disc list-inside text-[color:var(--text-700)] space-y-2">
                        <li>Architecture diagrams, data flows, tenancy model</li>
                        <li>CI/CD, rollback, observability dashboards, incident log</li>
                        <li>IAM/MFA, secrets, vuln scans, pen tests, vendor list + DPAs/BAAs</li>
                        <li>Backups/restore proof, retention & deletion policies</li>
                        <li>SOC 2 stage & gap list; HIPAA policies if applicable</li>
                        <li>Cloud spend (6–12 months), cost per workflow/user</li>
                        <li>Org chart, resumes, hiring plan</li>
                    </ul>
                </aside>
            </div>
        </div>
    </section>

    <!-- SCORING -->
    <section id="scoring" class="section" style="background:var(--lav);">
        <div class="max-w-6xl mx-auto px-6">
            <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-6">
                <div>
                    <h2 class="text-3xl md:text-4xl font-bold text-[color:var(--text-900)]">Scoring model</h2>
                    <p class="mt-3 text-[color:var(--text-700)]">
                        Score each domain 0–3. Toggle “regulated data” if healthcare/financial data is in scope
                        to increase the weight of Security and Data Protection.
                    </p>
                </div>
                <label class="inline-flex items-center gap-3 no-print">
                    <input type="checkbox" class="h-5 w-5" wire:model.live="regulated">
                    <span class="text-[color:var(--text-700)] font-medium">Regulated data in scope (boost Security & Data)</span>
                </label>
            </div>

            <div class="mt-8 flex flex-wrap items-center gap-4">
                <span class="{{ $this->trafficClass }}">Confidence: {{ $this->weightedPercent }}%</span>
                <span class="text-[color:var(--text-600)]">Status: <strong class="capitalize">{{ $this->trafficLabel }}</strong></span>
            </div>

            <div class="mt-8 overflow-x-auto">
                <table class="w-full min-w-[720px] bg-white border border-[color:var(--border)] rounded-xl overflow-hidden">
                    <thead class="bg-[#F9FAFB] text-left">
                        <tr>
                            <th class="grid-td font-semibold">Domain</th>
                            <th class="grid-td font-semibold">Description</th>
                            <th class="grid-td font-semibold text-center">Weight</th>
                            <th class="grid-td font-semibold text-center">0</th>
                            <th class="grid-td font-semibold text-center">1</th>
                            <th class="grid-td font-semibold text-center">2</th>
                            <th class="grid-td font-semibold text-center">3</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($domains as $d)
                            <tr>
                                <td class="grid-td align-top w-56">
                                    <div class="font-semibold text-[color:var(--text-900)]">{{ $d['title'] }}</div>
                                </td>
                                <td class="grid-td align-top">{{ $d['desc'] }}</td>
                                <td class="grid-td align-top text-center">{{ $this->weightDisplay($d['key'], $d['weight']) }}</td>
                                @for ($i = 0; $i <= 3; $i++)
                                    <td class="grid-td align-top text-center">
                                        <input type="radio"
                                               name="score_{{ $d['key'] }}"
                                               value="{{ $i }}"
                                               wire:model.live="scores.{{ $d['key'] }}"
                                               class="h-5 w-5">
                                    </td>
                                @endfor
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <p class="mt-6 text-sm text-[color:var(--text-500)]">
                0 = absent/unknown · 1 = ad‑hoc · 2 = defined/partial · 3 = operationalized with evidence.
            </p>
        </div>
    </section>

    <!-- EXAMPLE RISK MATRIX -->
    <section class="section bg-white">
        <div class="max-w-6xl mx-auto px-6">
            <h2 class="text-3xl md:text-4xl font-bold text-[color:var(--text-900)]">
                Example Risk Matrix
            </h2>
            <p class="mt-4 text-[color:var(--text-700)]">
                A one‑page summary used in IC. Each item gets a severity, owner, and target date, plus a concrete fix.
            </p>

            <div class="mt-8 overflow-x-auto">
                <table class="w-full min-w-[920px] bg-white border border-[color:var(--border)] rounded-xl overflow-hidden">
                    <thead class="bg-[#F9FAFB] text-left">
                        <tr>
                            <th class="grid-td font-semibold w-40">Domain</th>
                            <th class="grid-td font-semibold w-32">Severity</th>
                            <th class="grid-td font-semibold">Risk / Evidence</th>
                            <th class="grid-td font-semibold">Action (30‑day)</th>
                            <th class="grid-td font-semibold w-40">Owner</th>
                            <th class="grid-td font-semibold w-32">ETA</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="grid-td align-top">Security Controls</td>
                            <td class="grid-td align-top">
                                <span class="risk-badge risk-red">High</span>
                            </td>
                            <td class="grid-td align-top">
                                Prod IAM allows wildcard policies for CI runners. No MFA enforced for 2 admin users.
                            </td>
                            <td class="grid-td align-top">
                                Enforce MFA org‑wide; replace wildcards with least‑privilege roles; enable access analyzer; add weekly report.
                            </td>
                            <td class="grid-td align-top">CTO / DevOps Lead</td>
                            <td class="grid-td align-top">14 days</td>
                        </tr>
                        <tr>
                            <td class="grid-td align-top">Reliability &amp; Ops</td>
                            <td class="grid-td align-top">
                                <span class="risk-badge risk-yellow">Medium</span>
                            </td>
                            <td class="grid-td align-top">
                                No documented RPO/RTO; backups exist but last restore test was 9 months ago.
                            </td>
                            <td class="grid-td align-top">
                                Define RPO 4h / RTO 2h; schedule monthly restore test; automate success report in runbook.
                            </td>
                            <td class="grid-td align-top">SRE</td>
                            <td class="grid-td align-top">30 days</td>
                        </tr>
                        <tr>
                            <td class="grid-td align-top">Data Protection</td>
                            <td class="grid-td align-top">
                                <span class="risk-badge risk-yellow">Medium</span>
                            </td>
                            <td class="grid-td align-top">
                                PII retention not time‑boxed; no automated deletion pipeline for churned accounts.
                            </td>
                            <td class="grid-td align-top">
                                Implement retention rules (12 months) and scheduled delete; log evidence for audit trail.
                            </td>
                            <td class="grid-td align-top">Data Eng</td>
                            <td class="grid-td align-top">30 days</td>
                        </tr>
                        <tr>
                            <td class="grid-td align-top">Cost &amp; Efficiency</td>
                            <td class="grid-td align-top">
                                <span class="risk-badge risk-green">Low</span>
                            </td>
                            <td class="grid-td align-top">
                                Spend trending +6% MoM; no show‑back per product line.
                            </td>
                            <td class="grid-td align-top">
                                Create cost dashboards by service; add anomaly alerts; pilot right‑sizing on staging.
                            </td>
                            <td class="grid-td align-top">Finance + DevOps</td>
                            <td class="grid-td align-top">21 days</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <p class="mt-6 text-sm text-[color:var(--text-500)]">
                Tip: keep the matrix to 6–8 items. Anything longer belongs in the remediation plan or appendix.
            </p>
        </div>
    </section>

    <!-- VISUAL SNAPSHOT -->
    <section class="section" style="background:var(--lav);">
        <div class="max-w-6xl mx-auto px-6">
            <h2 class="text-3xl md:text-4xl font-bold text-[color:var(--text-900)]">
                Visual Snapshot
            </h2>
            <p class="mt-4 text-[color:var(--text-700)]">
                A quick picture you can paste into the investment memo: radar shows overall readiness by domain; heatmap shows relative strength.
            </p>

            <div class="mt-10 grid lg:grid-cols-2 gap-12 items-start">
                {{-- Radar chart --}}
                <div class="card p-6">
                    @php($svg = $this->radarSvg)
                    <svg viewBox="0 0 {{ $svg['size'] }} {{ $svg['size'] }}" width="100%" height="100%" role="img" aria-label="Readiness radar">
                        <defs>
                            <filter id="radarShadow" x="-20%" y="-20%" width="140%" height="140%">
                                <feDropShadow dx="0" dy="2" stdDeviation="3" flood-color="rgba(91,50,193,0.35)"/>
                            </filter>
                        </defs>

                        <!-- grid rings -->
                        <g class="radar-grid">
                            @foreach ($svg['ticks'] as $tr)
                                <circle cx="{{ $svg['cx'] }}" cy="{{ $svg['cy'] }}" r="{{ $tr }}" />
                            @endforeach
                        </g>

                        <!-- axes -->
                        <g class="radar-axis">
                            @foreach ($svg['axes'] as $axis)
                                <line x1="{{ $axis['x1'] }}" y1="{{ $axis['y1'] }}" x2="{{ $axis['x2'] }}" y2="{{ $axis['y2'] }}" />
                            @endforeach
                        </g>

                        <!-- polygon -->
                        <polygon class="radar-shape" filter="url(#radarShadow)" points="{{ $svg['polygon'] }}" />

                        <!-- labels -->
                        <g>
                            @foreach ($svg['axes'] as $axis)
                                <text x="{{ $axis['lx'] }}" y="{{ $axis['ly'] }}" class="radar-label">{{ $axis['label'] }}</text>
                            @endforeach
                        </g>
                    </svg>
                </div>

                {{-- Heatmap --}}
                <div>
                    <div class="card p-6">
                        <h3 class="text-xl font-semibold text-[color:var(--text-900)]">Heatmap by domain</h3>
                        <p class="mt-2 text-[color:var(--text-700)]">Darker = stronger. Hover each tile to see the exact %.</p>
                        <div class="mt-6 heat-grid">
                            @foreach ($domains as $d)
                                @php($p = $this->percentFor($d['key']))
                                <div class="heat-cell" title="{{ $d['title'] }} — {{ $p }}%" style="background-color: {{ $this->hslColorForPercent($p) }};">
                                    {{ $p }}%
                                </div>
                            @endforeach
                        </div>

                        <div class="mt-6">
                            <div class="h-3 w-full rounded-full"
                                 style="background: linear-gradient(90deg, hsl(0,85%,50%), hsl(60,85%,50%), hsl(120,85%,50%));"></div>
                            <div class="flex justify-between text-xs text-[color:var(--text-600)] mt-2">
                                <span>0%</span><span>50%</span><span>100%</span>
                            </div>
                        </div>
                    </div>

                    <p class="mt-6 text-sm text-[color:var(--text-500)]">
                        Severity mapping used elsewhere on the page: &nbsp;
                        <span class="risk-badge risk-red">High</span>
                        <span class="risk-badge risk-yellow">Medium</span>
                        <span class="risk-badge risk-green">Low</span>
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- NEXT STEPS -->
    <section class="section bg-white">
        <div class="max-w-6xl mx-auto px-6">
            <div class="grid lg:grid-cols-2 gap-8">
                <div>
                    <h2 class="text-3xl md:text-4xl font-bold text-[color:var(--text-900)]">Turn findings into action</h2>
                    <p class="mt-6 text-[color:var(--text-700)] text-lg">
                        Convert the scores into a simple <strong>R/Y/G risk matrix</strong> with owners and ETAs.
                        Then create a <strong>30‑day remediation plan</strong> ordered by impact vs. effort.
                    </p>

                    <div class="mt-8 grid sm:grid-cols-2 gap-6">
                        <div class="card p-6">
                            <h3 class="text-lg font-semibold text-[color:var(--text-900)]">Risk matrix</h3>
                            <p class="mt-2 text-[color:var(--text-700)]">
                                Domains, top risks, severity, owner, and target date. Keep it to one page.
                            </p>
                        </div>
                        <div class="card p-6">
                            <h3 class="text-lg font-semibold text-[color:var(--text-900)]">30‑day plan</h3>
                            <p class="mt-2 text-[color:var(--text-700)]">
                                Prioritize fixes that unblock scale, stability, or compliance evidence.
                            </p>
                        </div>
                    </div>
                </div>

                <aside class="card p-6">
                    <h4 class="text-lg font-semibold text-[color:var(--text-900)]">Need an independent view?</h4>
                    <p class="mt-3 text-[color:var(--text-700)]">
                        We deliver a full diligence deck with a confidence score, R/Y/G matrix, and a founder‑ready remediation plan — typically within 5–10 days.
                    </p>
                    <a href="#contact" class="mt-6 inline-block btn">Request a diligence quote</a>
                </aside>
            </div>
        </div>
    </section>

    <!-- CTA -->
    <section class="section hero text-center">
        <h2 class="text-3xl md:text-4xl font-bold">Use the checklist — or have us run it.</h2>
        <p class="max-w-2xl mx-auto mt-4 text-lg text-[#EAE6FF]">
            We work with investors and founders to de‑risk decisions and keep momentum.
        </p>
        <div class="mt-8 flex items-center justify-center gap-4 no-print">
            <a href="#contact" class="btn">Talk to an expert</a>
            <button class="btn" onclick="window.print()">Print / Save PDF</button>
        </div>
    </section>
</div>
