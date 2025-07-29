<style>
  /* =========================
     Axali Brand – Light Site
     ========================= */
  :root{
    --axali-purple:#5B32C1;   /* Primary */
    --axali-indigo:#6366F1;   /* Cool accent */
    --axali-orange:#FF8B38;   /* Warm accent */

    --text-900:#111827;       /* Headline */
    --text-700:#374151;       /* Strong body */
    --text-600:#4B5563;       /* Body */
    --text-500:#6B7280;       /* Muted */

    --border:#E5E7EB;         /* Lines */
    --surface:#FFFFFF;        /* Page / cards */
    --surface-soft:#F9FAFB;   /* Soft stripes / bands */
    --lavender:#F5F2FF;       /* Very light purple band */

    /* Baseline correction for rolling words */
    --roller-shift: 0.15em;   /* tweak 0.05–0.09em if needed */
  }

  /* Animations */
  @keyframes heroShift {
    0%   { background-position: 0% 50%; }
    100% { background-position: 100% 50%; }
  }
  .animate-bg {
    background-size: 200% 200%;
    animation: heroShift 18s ease-in-out infinite alternate;
  }

  .animate-slide-up {
    transform: translateY(60px);
    opacity: 0;
    transition: all .6s cubic-bezier(.42,.0,.58,1);
  }
  .animate-slide-up.in-view { transform: translateY(0); opacity: 1; }

  @keyframes zoomSlow{
    0%,100% {transform: scale(1);}
    50%     {transform: scale(1.10);}
  }

  /* HERO headline: one line, white text, animated orange underline */
  .hero-heading{
    position:relative; display:inline-block; white-space:nowrap;
    color:#fff; font-weight:800; line-height:1.05;
    font-size: clamp(2rem, 5vw, 4rem);
  }
  @media (max-width: 480px){
    .hero-heading{ white-space:normal; } /* allow wrap on tiny screens */
  }

/* Pen-like underline: slow 6s left→right draw with gentle overshoot */
.hero-heading::after{
  content:"";
  position:absolute;
  left:0; right:0;
  height:6px;
  bottom:-18px;
  background: var(--axali-orange);
  border-radius:3px;
  transform-origin: left center;
  transform: scaleX(0);
  will-change: transform;

  /* 6s draw (delay .2s). Increase duration for slower, reduce for faster. */
  animation: underlineDraw 6s cubic-bezier(.25,.8,.25,1) .9s forwards;
}

@keyframes underlineDraw{
  /* slow build-up */
  0%   { transform: scaleX(0); }

  88%  { transform: scaleX(0.98); }

  /* subtle overshoot then settle */
  92%  { transform: scaleX(1.012); }
  97%  { transform: scaleX(0.996); }
  100% { transform: scaleX(1); }
}


  .hero-sub{
    color:#E9E7FF; 
    font-size: clamp(1.05rem, 2vw, 1.375rem);
  }
  .hero-muted{
    color:#D7D3FF; 
    font-size: clamp(.9rem, 1.8vw, 1rem);
  }

  /* Rolling reveal words (slower + baseline aligned) */
  .word-roller{
    display:inline-block;
    overflow:hidden;
    height:1em;
    line-height:1;                /* exact text box */
    vertical-align: calc(var(--roller-shift) * -1); /* nudge down to match baseline */
  }
  .word-roller .inner{
    display:block;
    line-height:1;
    will-change: transform;
    transform: translateY(105%);  /* start a touch lower to avoid subpixel seams */
    animation: revealRoll 1.8s cubic-bezier(.2,.7,.2,1) forwards;
  }
  .word-roller--delay .inner{ animation-delay: .45s; }
  @keyframes revealRoll{
    0%   { transform: translateY(105%); }
    100% { transform: translateY(0%); }
  }

  /* Buttons */
  .btn-primary{
    display:inline-block; padding:.9rem 2rem; border-radius:.5rem;
    font-weight:600; color:#fff; background:linear-gradient(90deg,var(--axali-purple),var(--axali-indigo));
    transition:opacity .2s ease, transform .08s ease;
    box-shadow: 0 10px 24px rgba(91,50,193,.22);
  }
  .btn-primary:hover{ opacity:.92; }
  .btn-primary:active{ transform: translateY(1px); }

  .btn-secondary{
    display:inline-block; padding:.9rem 2rem; border-radius:.5rem;
    font-weight:600; color:var(--axali-purple); background:#fff; border:1px solid var(--axali-purple);
    transition:background-color .2s ease, color .2s ease, transform .08s ease;
  }
  .btn-secondary:hover{ background:#F8F5FF; }
  .btn-secondary:active{ transform: translateY(1px); }

  /* Buttons for purple sections */
  .btn-invert{
    display:inline-block; padding:.9rem 2rem; border-radius:.5rem; font-weight:600;
    background:#fff; color:var(--axali-purple); border:1px solid #fff;
    transition:opacity .2s ease, transform .08s ease;
  }
  .btn-invert:hover{ opacity:.95; }
  .btn-invert:active{ transform: translateY(1px); }

  .btn-outline-white{
    display:inline-block; padding:.9rem 2rem; border-radius:.5rem; font-weight:600;
    color:#fff; border:1px solid #ffffffb3; background:transparent;
    transition:background-color .2s ease, transform .08s ease;
  }
  .btn-outline-white:hover{ background:rgba(255,255,255,.08); }
  .btn-outline-white:active{ transform: translateY(1px); }

  /* Cards */
  .card{
    background: var(--surface);
    border:1px solid var(--border);
    border-radius:16px;
    box-shadow: 0 8px 28px rgba(17,24,39,0.06);
  }

  /* Icon pills */
  .pill{
    width:44px;height:44px;border-radius:9999px; color:#fff;
    display:inline-flex;align-items:center;justify-content:center;
    background: var(--axali-purple);
    box-shadow: 0 8px 20px rgba(91,50,193,.25);
  }
  .pill--orange{ background: var(--axali-orange); box-shadow:0 8px 20px rgba(255,139,56,.25); }
  .pill--indigo{ background: var(--axali-indigo); box-shadow: 0 8px 20px rgba(99,102,241,.25); }

  /* Section framing */
  .section{ padding-top:6rem; padding-bottom:6rem; }
  .divider{ border-top:1px solid var(--border); }

  /* Sticky CTA */
  .sticky-cta{
    position: fixed; bottom: 1.5rem; right: 1.5rem; z-index: 40;
    border-radius:9999px; box-shadow: 0 10px 25px rgba(0,0,0,.28);
    background-image: linear-gradient(to right,var(--axali-purple),var(--axali-indigo));
    color:#fff; padding:.85rem 1.5rem; font-weight:600; font-size: clamp(.875rem, 1vw, 1rem);
    transition: opacity .2s ease;
  }
  .sticky-cta:hover{ opacity:.92; }

  /* Purple sections */
  .section--purple{
    background: linear-gradient(135deg, var(--axali-purple), var(--axali-indigo));
    color:#fff;
  }
  .section--purple h2,
  .section--purple h3 { color:#fff; }
  .section--purple p { color:#EAE6FF; }
  .section--purple .muted { color:#D9D3FF; }
  .section--purple .card{
    background: rgba(255,255,255,0.06);
    border-color: rgba(255,255,255,0.18);
    box-shadow: 0 10px 30px rgba(0,0,0,.25);
  }
</style>

<div class="bg-[color:var(--surface)] text-[color:var(--text-700)]" x-data>
  <!-- Sticky CTA -->
  <a href="https://calendly.com/tpeverelli-axali-consulting/bring-your-vision-to-market-intro-call-clone" class="sticky-cta">Book a 15‑min Call →</a>

  <!-- ===================== HERO (FULL PURPLE) ===================== -->
  <section class="animate-bg text-center py-32 md:py-44 px-6"
           style="background-image:linear-gradient(135deg,var(--axali-purple) 0%, var(--axali-indigo) 100%);">

    <!-- Title with underline + rolling words -->
    <div class="inline-block animate-[zoomSlow_40s_ease-in-out_infinite] overflow-visible">
      <h1 class="hero-heading mb-10 select-none">
        Ship
        <span class="word-roller"><span class="inner">Faster.</span></span>
        &nbsp;Scale
        <span class="word-roller word-roller--delay"><span class="inner">Smarter.</span></span>
      </h1>
    </div>

    <p class="hero-sub max-w-3xl mx-auto leading-relaxed mb-8">
      Fractional CTO & senior engineering leadership for ambitious startups and growing businesses.
    </p>

    <p class="hero-muted max-w-2xl mx-auto mb-10">
      <strong class="text-white/95">Trusted by founders and their investors</strong>
      to launch <span class="whitespace-nowrap">production‑ready</span> products faster, with code quality that stands up to senior review.
    </p>

    <a href="https://calendly.com/tpeverelli-axali-consulting/bring-your-vision-to-market-intro-call-clone" class="btn-invert">Book a Call →</a>
  </section>

  <!-- ===================== SERVICES (white cards) ===================== -->
  <section class="section pt-16">
    <div class="max-w-6xl mx-auto px-6 grid grid-cols-1 md:grid-cols-3 gap-6">
      <div class="card p-8 animate-slide-up" x-intersect="$el.classList.add('in-view')">
        <h3 class="text-xl font-semibold text-[color:var(--text-900)] mb-3 flex items-center gap-3">
          <span class="pill"><x-heroicon-o-sparkles class="w-5 h-5"/></span>
          Fractional CTO
        </h3>
        <p class="text-[color:var(--text-600)] leading-relaxed">
          Senior leadership on demand — architecture, hiring & roadmap.<br>
          <em class="text-[color:var(--text-500)] block mt-2">
            Guided a fintech through GDPR + SOC‑2 while tripling release cadence.
          </em>
        </p>
      </div>

      <div class="card p-8 animate-slide-up" x-intersect="$el.classList.add('in-view')">
        <h3 class="text-xl font-semibold text-[color:var(--text-900)] mb-3 flex items-center gap-3">
          <span class="pill pill--orange"><x-heroicon-o-bolt class="w-5 h-5"/></span>
          Rapid Build Sprints
        </h3>
        <p class="text-[color:var(--text-600)] leading-relaxed">
          Idea → launch in weeks. MVPs, internal tools, AI agents, automation.<br>
          <em class="text-[color:var(--text-500)] block mt-2">From whiteboard to cloud‑ready launch.</em>
        </p>
      </div>

      <div class="card p-8 animate-slide-up" x-intersect="$el.classList.add('in-view')">
        <h3 class="text-xl font-semibold text-[color:var(--text-900)] mb-3 flex items-center gap-3">
          <span class="pill pill--indigo"><x-heroicon-o-briefcase class="w-5 h-5"/></span>
          Advisory for VCs
        </h3>
        <p class="text-[color:var(--text-600)] leading-relaxed">
          Tech due‑diligence, product audits, founder coaching.<br>
          <em class="text-[color:var(--text-500)] block mt-2">40+ deals reviewed since 2021.</em>
        </p>
      </div>
    </div>
  </section>

  <!-- ===================== WHY AXALI ===================== -->
  <section class="section">
    <div class="max-w-5xl mx-auto px-6">
      <h2 class="text-3xl md:text-4xl font-bold text-[color:var(--text-900)] text-center mb-12">
        Why founders pick Axali 🔑
      </h2>

      <div class="grid md:grid-cols-2 gap-12 items-start">
        <ul class="space-y-5 text-[color:var(--text-600)] text-lg leading-relaxed">
          <li class="flex items-start gap-3">
            <x-heroicon-o-rocket-launch class="w-6 h-6" style="color:var(--axali-orange)"/>
            <span><b class="text-[color:var(--text-700)]">Agility —</b> usable releases land in weeks, not quarters.</span>
          </li>
          <li class="flex items-start gap-3">
            <x-heroicon-o-eye class="w-6 h-6" style="color:var(--axali-indigo)"/>
            <span><b class="text-[color:var(--text-700)]">Visibility —</b> live Kanban + weekly demo videos keep you in the loop.</span>
          </li>
          <li class="flex items-start gap-3">
            <x-heroicon-o-check-badge class="w-6 h-6" style="color:var(--axali-purple)"/>
            <span><b class="text-[color:var(--text-700)]">Ownership —</b> every tech decision aligns with your business goals.</span>
          </li>
        </ul>

        <blockquote class="card p-8 animate-slide-up" x-intersect="$el.classList.add('in-view')">
          <p class="text-[color:var(--text-700)]">
            “Axali reduced our release cycle from monthly to weekly without increasing burn.
            Best decision of our Series A.”
          </p>
          <footer class="mt-4 text-sm" style="color:var(--axali-indigo)">— Emma Q., CEO @ ABC</footer>
        </blockquote>
      </div>

      <div class="text-center mt-12">
        <a href="https://calendly.com/tpeverelli-axali-consulting/bring-your-vision-to-market-intro-call-clone" class="btn-secondary">Schedule Intro Call →</a>
      </div>
    </div>
  </section>

  <div class="divider"></div>

  <!-- ===================== FRACTIONAL CTO PROCESS ===================== -->
  <section id="cto" class="section">
    <div class="max-w-5xl mx-auto px-6">
      <h2 class="text-3xl md:text-4xl font-bold text-[color:var(--text-900)] text-center mb-16">
        Fractional&nbsp;CTO – Engagement Flow
      </h2>

      <div class="grid md:grid-cols-2 gap-12">
        <div class="animate-slide-up" x-intersect="$el.classList.add('in-view')" wire:key="cto1">
          <h3 class="text-xl font-semibold text-[color:var(--text-900)] mb-2 flex items-center gap-3">
            <span class="pill"><x-heroicon-o-briefcase class="w-5 h-5"/></span> Discovery Workshop
          </h3>
          <p class="text-[color:var(--text-600)]">
            Deep‑dive on product vision, team, and constraints.
            Align success metrics and communication cadence.
          </p>
        </div>

        <div class="animate-slide-up" x-intersect="$el.classList.add('in-view')" wire:key="cto2">
          <h3 class="text-xl font-semibold text-[color:var(--text-900)] mb-2 flex items-center gap-3">
            <span class="pill pill--indigo"><x-heroicon-o-map class="w-5 h-5"/></span> 90‑Day Tech Roadmap
          </h3>
          <p class="text-[color:var(--text-600)]">
            Architecture decisions, hiring plan, and cost targets documented and signed off by founders.
          </p>
        </div>

        <div class="animate-slide-up" x-intersect="$el.classList.add('in-view')" wire:key="cto3">
          <h3 class="text-xl font-semibold text-[color:var(--text-900)] mb-2 flex items-center gap-3">
            <span class="pill pill--orange"><x-heroicon-o-arrow-path-rounded-square class="w-5 h-5"/></span> Execution Loops
          </h3>
          <p class="text-[color:var(--text-600)]">
            Weekly sprints, live Kanban, Loom demos; unblock engineers,
            steer vendors, and report burn vs. velocity.
          </p>
        </div>

        <div class="animate-slide-up" x-intersect="$el.classList.add('in-view')" wire:key="cto4">
          <h3 class="text-xl font-semibold text-[color:var(--text-900)] mb-2 flex items-center gap-3">
            <span class="pill"><x-heroicon-o-arrow-trending-up class="w-5 h-5"/></span> Scale &amp; Transition
          </h3>
          <p class="text-[color:var(--text-600)]">
            Hire permanent leaders, codify runbooks, and exit once the
            team operates at Series‑B maturity.
          </p>
        </div>
      </div>

      <div class="text-center mt-16">
        <a href="https://calendly.com/tpeverelli-axali-consulting/due-dilligence-intro-call-clone" class="btn-primary">Book a Fractional&nbsp;CTO Intro →</a>
      </div>
    </div>
  </section>

  <div class="divider"></div>

  <!-- ===================== WHAT WE BUILD ===================== -->
  <section class="section">
    <div class="max-w-7xl mx-auto px-6">
      <h2 class="text-3xl md:text-4xl font-bold text-[color:var(--text-900)] text-center mb-12">
        What We Build & Integrate
      </h2>

      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-10 text-[color:var(--text-600)]">
        <div class="flex gap-4">
          <x-heroicon-o-globe-alt class="w-7 h-7" style="color:var(--axali-indigo)"/>
          <div>
            <h4 class="text-lg font-semibold text-[color:var(--text-900)] mb-1">Web Applications</h4>
            Build secure, scalable SaaS & internal tools.
          </div>
        </div>

        <div class="flex gap-4">
          <x-heroicon-o-cpu-chip class="w-7 h-7" style="color:var(--axali-orange)"/>
          <div>
            <h4 class="text-lg font-semibold text-[color:var(--text-900)] mb-1">AI Agents & Integrations</h4>
            GPT workflows, RAG systems, workflow bots.
          </div>
        </div>

        <div class="flex gap-4">
          <x-heroicon-o-chart-bar class="w-7 h-7 text-emerald-500"/>
          <div>
            <h4 class="text-lg font-semibold text-[color:var(--text-900)] mb-1">BI & Reporting</h4>
            Dashboards, metrics pipelines, data viz.
          </div>
        </div>

        <div class="flex gap-4">
          <x-heroicon-o-arrows-right-left class="w-7 h-7 text-yellow-500"/>
          <div>
            <h4 class="text-lg font-semibold text-[color:var(--text-900)] mb-1">Workflow Automation</h4>
            Bots & triggers to cut manual ops.
          </div>
        </div>

        <div class="flex gap-4">
          <x-heroicon-o-circle-stack class="w-7 h-7 text-blue-500"/>
          <div>
            <h4 class="text-lg font-semibold text-[color:var(--text-900)] mb-1">Data Platforms</h4>
            ETL, lakes, warehouses, observability.
          </div>
        </div>

        <div class="flex gap-4">
          <x-heroicon-o-code-bracket class="w-7 h-7 text-rose-500"/>
          <div>
            <h4 class="text-lg font-semibold text-[color:var(--text-900)] mb-1">Integrations & APIs</h4>
            Stripe, HubSpot, custom microservices.
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ===================== RAPID BUILD SPRINT ===================== -->
  <section id="sprint" class="section">
    <div class="max-w-5xl mx-auto px-6">
      <h2 class="text-3xl md:text-4xl font-bold text-[color:var(--text-900)] text-center mb-16">
        Rapid&nbsp;Build – 4‑Week Sprint
      </h2>

      <div class="grid md:grid-cols-2 gap-12">
        <div>
          <h3 class="text-xl font-semibold text-[color:var(--text-900)] mb-2 flex items-center gap-3">
            <span class="pill pill--orange"><x-heroicon-o-light-bulb class="w-5 h-5"/></span> Idea Mapping
          </h3>
          <p class="text-[color:var(--text-600)]">
            Define the single critical workflow and success metric.
            No spec bloat—just the sharpest slice.
          </p>
        </div>

        <div>
          <h3 class="text-xl font-semibold text-[color:var(--text-900)] mb-2 flex items-center gap-3">
            <span class="pill"><x-heroicon-o-pencil-square class="w-5 h-5"/></span> Interactive Prototype
          </h3>
          <p class="text-[color:var(--text-600)]">
            Figma screens & user‑flow video, refined with stakeholders before any code is written.
          </p>
        </div>

        <div>
          <h3 class="text-xl font-semibold text-[color:var(--text-900)] mb-2 flex items-center gap-3">
            <span class="pill pill--indigo"><x-heroicon-o-cube-transparent class="w-5 h-5"/></span> Build &amp; Demo
          </h3>
          <p class="text-[color:var(--text-600)]">
            Ship production code behind a feature flag; run an internal demo for real feedback.
          </p>
        </div>

        <div>
          <h3 class="text-xl font-semibold text-[color:var(--text-900)] mb-2 flex items-center gap-3">
            <span class="pill"><x-heroicon-o-rocket-launch class="w-5 h-5"/></span> Pilot Launch
          </h3>
          <p class="text-[color:var(--text-600)]">
            Activate pilot users, capture metrics, and hand over a prioritised backlog for v1.0.
          </p>
        </div>
      </div>

      <div class="text-center mt-16">
        <a href="https://calendly.com/tpeverelli-axali-consulting/fractional-cto-senior-engineering-leadership-clone" class="btn-primary">Start My Sprint →</a>
      </div>
    </div>
  </section>

  <!-- ===================== METRICS STRIP (soft) ===================== -->
  <section class="py-12" style="background:var(--lavender);">
    <div class="max-w-6xl mx-auto px-6 grid grid-cols-3 md:grid-cols-6 gap-y-8 text-center">
      <div><span class="text-3xl font-bold text-[color:var(--text-900)] block">12+</span><span class="text-[color:var(--text-500)]">Years exp</span></div>
      <div><span class="text-3xl font-bold text-[color:var(--text-900)] block">50+</span><span class="text-[color:var(--text-500)]">Projects</span></div>
      <div><span class="text-3xl font-bold text-[color:var(--text-900)] block">3</span><span class="text-[color:var(--text-500)]">Exits supported</span></div>
      <div><span class="text-3xl font-bold text-[color:var(--text-900)] block">40%</span><span class="text-[color:var(--text-500)]">MVP time ↓</span></div>
      <div><span class="text-3xl font-bold text-[color:var(--text-900)] block">30%</span><span class="text-[color:var(--text-500)]">Infra cost ↓</span></div>
      <div><span class="text-3xl font-bold text-[color:var(--text-900)] block">100%</span><span class="text-[color:var(--text-500)]">Senior talent</span></div>
    </div>
  </section>

  <!-- ===================== TECH OVERSIGHT / AUDIT (PURPLE) ===================== -->
  <section id="diligence" class="section section--purple text-center px-6">
    <div class="max-w-4xl mx-auto">
      <h2 class="text-3xl md:text-4xl font-bold mb-6">
        Technical Oversight & Future‑Proof Audits
      </h2>
      <p class="text-lg max-w-3xl mx-auto mb-8">
        Vendor selection, stack reviews, SOC‑2 paths — we de‑risk decisions before they grow expensive.
      </p>
      <p class="mb-10">Pay once, save quarters of re‑work.</p>
      <a href="https://calendly.com/tpeverelli-axali-consulting/30min" class="btn-invert">Get an Audit Quote →</a>
    </div>
  </section>

  <!-- ===================== DUE DILIGENCE (PURPLE) ===================== -->
  <section class="section section--purple overflow-hidden">
    <div class="max-w-5xl mx-auto px-6">
      <h2 class="text-center text-3xl md:text-4xl font-bold mb-16">
        4‑Step Technical Due Diligence for Investors
      </h2>

      <div class="grid md:grid-cols-2 gap-12">
        <div>
          <h3 class="text-xl font-semibold mb-2 flex items-center gap-3">
            <span class="pill" style="background:#fff;color:var(--axali-purple)"><x-heroicon-o-phone class="w-5 h-5"/></span> Scoping Call
          </h3>
          <p>Align on investment thesis, priority risk areas and data‑room access with the lead partner
            and founding CTO.</p>
        </div>

        <div>
          <h3 class="text-xl font-semibold mb-2 flex items-center gap-3">
            <span class="pill" style="background:#fff;color:var(--axali-orange)"><x-heroicon-o-clipboard-document-list class="w-5 h-5"/></span> Data‑Room Sweep
          </h3>
          <p>Analyse architecture docs, run cost & compliance scanners and map third‑party
            licenses, security posture and scaling headroom.</p>
        </div>

        <div>
          <h3 class="text-xl font-semibold mb-2 flex items-center gap-3">
            <span class="pill" style="background:#fff;color:var(--axali-indigo)"><x-heroicon-o-users class="w-5 h-5"/></span> Leadership & Team Interviews
          </h3>
          <p>Pair‑program with engineers and meet tech leadership to gauge decision‑making,
            DevOps maturity, on‑call culture and enterprise readiness.</p>
        </div>

        <div>
          <h3 class="text-xl font-semibold mb-2 flex items-center gap-3">
            <span class="pill" style="background:#fff;color:var(--axali-purple)"><x-heroicon-o-presentation-chart-line class="w-5 h-5"/></span> Investor Briefing
          </h3>
          <p>Deliver slide deck, risk matrix and “go / fix / walk‑away” recommendation,
            plus a 30‑day remediation roadmap for founders.</p>
        </div>
      </div>

      <div class="text-center mt-16">
        <a href="https://calendly.com/tpeverelli-axali-consulting/30min" class="btn-invert">Request Due‑Diligence Quote →</a>
      </div>
    </div>
  </section>

  <!-- ===================== CONTACT ===================== -->
  <section id="contact" class="section">
    <div class="max-w-3xl mx-auto px-6">
      <h2 class="text-3xl md:text-4xl font-bold text-[color:var(--text-900)] text-center mb-6">
        Let’s Talk
      </h2>
      @livewire('contact-form')
    </div>
  </section>

  <!-- ===================== FOOTER ===================== -->
  <footer class="py-10 text-center text-[color:var(--text-500)] text-sm divider">
    © Axali Consulting — All rights reserved. | <li><a href="{{ route('privacy-terms') }}" class="hover:underline">Privacy & T&amp;C</a></li>

  </footer>
</div>
