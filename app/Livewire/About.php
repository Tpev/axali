<?php

namespace App\Livewire;

use Livewire\Component;

class About extends Component
{
    /** Principles — concise, corporate, outcome‑driven */
    public array $principles = [
        [
            'title' => 'Outcomes over activity',
            'desc'  => 'Every engagement is scoped to measurable change — release cadence, reliability, unit cost, compliance posture, or revenue expansion.',
        ],
        [
            'title' => 'Secure by default',
            'desc'  => 'Confidentiality and least‑privilege access as a baseline. Controls and auditability are built into delivery, not retrofitted.',
        ],
        [
            'title' => 'Senior ownership',
            'desc'  => 'Small teams of senior operators move faster and make fewer expensive mistakes. We do the work and we sign our name to it.',
        ],
        [
            'title' => 'Clarity and candor',
            'desc'  => 'Written decision records, explicit trade‑offs, and unambiguous go / fix / stop recommendations.',
        ],
        [
            'title' => 'Short loops, visible progress',
            'desc'  => 'Weekly demos, live Kanban, and objective telemetry. Stakeholders see movement, not status language.',
        ],
        [
            'title' => 'Design for handover',
            'desc'  => 'Runbooks, hiring plans, and mentoring so in‑house teams can operate independently after we exit.',
        ],
    ];

    /** Trust posture — security & compliance stance */
    public array $trust = [
        'NDA by default. Access is time‑bound, just‑enough, and revoked on exit.',
        'Secure SDLC with peer review, reproducible builds, and signed releases.',
        'Incident and change management playbooks with actionable post‑incident reviews.',
        'Maintained audit artifacts: risk logs, data flows, decision registers, and DPIAs where required.',
        'Customer data is never used for model training; encryption in transit and at rest.',
    ];

    /** Metrics — ranges and achievements, no “0 P1” claims */
    public array $metrics = [
        ['value' => '12+','label' => 'Years operating'],
        ['value' => '50+','label' => 'Platforms delivered'],
        ['value' => '40+','label' => 'Diligence reviews'],
    ];

    /** Sectors / Use cases */
    public array $sectors = [
        [
            'title' => 'Healthcare & Life Sciences',
            'desc'  => 'Scheduling, clinical workflows, claims, PHI handling, payer connectivity. HIPAA, SOC‑2, DPIAs, and data‑retention policies.',
        ],
        [
            'title' => 'Fintech',
            'desc'  => 'Risk engines, reporting, auditability, data controls, and cost efficiency. SOC‑2, PCI with partners, and investor‑grade telemetry.',
        ],
        [
            'title' => 'B2B SaaS',
            'desc'  => 'Multi‑tenant architecture, data isolation, enterprise readiness, scale headroom, and predictable unit economics.',
        ],
    ];

    public function render()
    {
        return view('livewire.about')
            ->layout('layouts.guest');
    }
}
