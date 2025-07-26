<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Log;
use Livewire\Component;
use Livewire\Attributes\Validate;

class Careers extends Component
{
    /**
     * US‑first roles (static). No DB. Corporate tone with responsibilities & requirements.
     */
    public array $roles = [
        [
            'slug'   => 'senior-fullstack',
            'title'  => 'Senior Full‑Stack Engineer (Laravel)',
            'region' => 'US‑first · Remote (PT–ET) • EU overlap optional',
            'type'   => 'Contract (1099 / corp‑to‑corp) — potential for long‑term assignment',
            'tags'   => ['Laravel', 'Livewire', 'Postgres', 'AWS', 'CI/CD', 'Observability'],
            'summary'=> 'Lead end‑to‑end delivery for SaaS platforms. Own architecture, quality, and robustness while maintaining a rapid release cadence.',
            'responsibilities' => [
                'Own architecture and implementation across backend and front‑end.',
                'Define CI/CD, observability, rollout/rollback, and release gates.',
                'Reduce operational risk: error budgets, on‑call hygiene, capacity planning.',
                'Mentor engineers; review code for reliability, security, and scalability.',
                'Collaborate with product and stakeholders to align milestones and KPIs.',
            ],
            'requirements' => [
                '8+ years of professional software engineering experience.',
                'Substantial delivery in Laravel + modern front‑end (Livewire/React).',
                'Strong AWS fundamentals (IAM, VPC, S3, RDS, CloudWatch).',
                'Evidence of improving release cadence without increasing incident rate.',
                'Clear written communication; experience with regulated contexts is a plus.',
            ],
        ],
        [
            'slug'   => 'senior-frontend',
            'title'  => 'Senior Front‑End Engineer',
            'region' => 'US‑first · Remote (PT–ET) • EU overlap optional',
            'type'   => 'Contract (1099 / corp‑to‑corp)',
            'tags'   => ['React', 'TypeScript', 'Tailwind', 'Accessibility', 'Performance'],
            'summary'=> 'Deliver accessible, high‑performance interfaces with strong attention to state management, testing, and DX.',
            'responsibilities' => [
                'Build, test, and optimize complex UI flows and design‑system components.',
                'Own accessibility, performance budgets, and telemetry for UX quality.',
                'Integrate APIs securely; define typing, validation, and error handling.',
                'Partner with design for high‑fidelity specs and pragmatic MVP scoping.',
                'Contribute to front‑end standards, testing practices, and CI gates.',
            ],
            'requirements' => [
                '7+ years front‑end experience with React + TypeScript.',
                'Demonstrated accessibility compliance (WCAG) and performance tuning.',
                'Experience with component libraries and design systems at scale.',
                'Comfortable in product environments with frequent releases.',
            ],
        ],
        [
            'slug'   => 'ml-engineer',
            'title'  => 'AI / ML Engineer',
            'region' => 'US‑first · Remote (PT–ET) • EU overlap optional',
            'type'   => 'Contract (1099 / corp‑to‑corp)',
            'tags'   => ['Python', 'LLMs', 'RAG', 'Evals', 'Vector stores', 'Latency / Cost'],
            'summary'=> 'Design and deploy pragmatic AI features with measurable quality, safety, latency, and cost targets.',
            'responsibilities' => [
                'Design retrieval pipelines (RAG), agents, and guardrails with observability.',
                'Establish offline and online evaluation suites; measure quality and drift.',
                'Optimize for latency and cost; capacity plan and set autoscaling policies.',
                'Collaborate on data governance, retention, and privacy constraints.',
                'Document model behavior, limitations, and fallback paths.',
            ],
            'requirements' => [
                '6+ years in ML/AI engineering, including production deployments.',
                'Hands‑on with vector DBs, embeddings, prompt strategies, and evals.',
                'Proficient in Python; experience with model/infra cost controls.',
                'Experience in healthcare/financial data handling is advantageous.',
            ],
        ],
        [
            'slug'   => 'devops-sre',
            'title'  => 'DevOps / SRE',
            'region' => 'US‑first · Remote (PT–ET) • EU overlap optional',
            'type'   => 'Contract (1099 / corp‑to‑corp)',
            'tags'   => ['AWS', 'Kubernetes', 'Terraform', 'GitHub Actions', 'Blue/Green', 'SLOs'],
            'summary'=> 'Increase delivery velocity while improving stability. You implement safe releases, deep observability, and cost‑effective reliability.',
            'responsibilities' => [
                'Design and operate CI/CD, blue/green or canary deployments with rollback.',
                'Implement SLOs, error budgets, and incident response playbooks.',
                'Harden security posture (secrets, least‑privilege, network boundaries).',
                'Optimize infra cost with right‑sizing, autoscaling, and caching.',
                'Create runbooks and handover documentation for client teams.',
            ],
            'requirements' => [
                '7+ years in DevOps/SRE with modern AWS and Kubernetes.',
                'Track record implementing SLOs and reducing MTTR.',
                'Comfort with infrastructure as code (Terraform) and Git‑based workflows.',
                'Experience in regulated environments is a plus.',
            ],
        ],
        [
            'slug'   => 'kam',
            'title'  => 'Key Account Manager (Enterprise / Healthcare)',
            'region' => 'US‑first · Remote (PT–ET) • Occasional travel',
            'type'   => 'Full‑time or Contract‑to‑Hire',
            'tags'   => ['Enterprise Sales', 'Healthcare', 'RFPs', 'Procurement', 'SOWs', 'Renewals', 'Growth'],
            'summary'=> 'Own strategic enterprise accounts across healthcare, fintech, and B2B SaaS. Navigate procurement and compliance stakeholders to expand value and revenue.',
            'responsibilities' => [
                'Own retention and growth of assigned enterprise accounts.',
                'Lead stakeholder mapping, QBRs, renewals, and multi‑year expansion plans.',
                'Manage RFPs/RFIs, SOWs, MSAs, redlines, and pricing models.',
                'Coordinate with delivery leads to translate outcomes into scoped engagements.',
                'Build forecasts and report pipeline accuracy and revenue performance.',
            ],
            'requirements' => [
                '7+ years in enterprise account management or consultative sales.',
                'Demonstrable experience in healthcare or other regulated industries.',
                'Fluent with procurement cycles, vendor onboarding, and InfoSec reviews.',
                'Proven ARR growth, renewal, and multi‑year expansion track record.',
                'Exceptional written communication and executive presence.',
            ],
        ],
        [
            'slug'   => 'cto-associate',
            'title'  => 'CTO Associate (Fractional)',
            'region' => 'US‑first · Remote (PT–ET) • EU overlap optional',
            'type'   => 'Part‑time Contract',
            'tags'   => ['Roadmaps', 'Vendor mgmt', 'SOC‑2', 'GDPR', 'Cost modeling', 'Writing'],
            'summary'=> 'Support fractional CTO engagements: audits, 90‑day plans, security posture, and investor communications.',
            'responsibilities' => [
                'Draft audit findings, risk matrices, and 30‑day remediation plans.',
                'Prepare 90‑day roadmaps with hiring plans and cost targets.',
                'Coordinate vendor assessments and RFPs; compare TCO/ROI.',
                'Contribute to SOC‑2 / GDPR readiness artifacts and policies.',
                'Prepare concise investor and executive communications.',
            ],
            'requirements' => [
                '6+ years in engineering leadership, product, or technology consulting.',
                'Strong analytical writing; able to communicate risk and impact clearly.',
                'Familiarity with compliance frameworks and secure SDLC.',
                'Comfortable in fast‑paced, multi‑stakeholder environments.',
            ],
        ],
    ];

    /** Employment value proposition (static) */
    public array $benefits = [
        ['title' => 'US‑first, remote delivery', 'desc' => 'Engagements operate across US time zones (PT–ET). EU overlap is welcome where required for cross‑border programs.'],
        ['title' => 'Senior talent only', 'desc' => 'High trust, low ceremony. We expect ownership, rigorous thinking, and measurable outcomes.'],
        ['title' => 'Clear scope & KPIs', 'desc' => 'Each assignment has defined outcomes: cadence, stability, cost, compliance posture, or revenue expansion.'],
        ['title' => 'Long‑term engagements', 'desc' => 'Most contracts extend. We remain while we continue to add demonstrable value.'],
        ['title' => 'Security & compliance maturity', 'desc' => 'We operate with modern controls, secure SDLC, and customer confidentiality at the core.'],
        ['title' => 'Market‑aligned compensation', 'desc' => 'Transparent senior day‑rates in USD (1099/corp‑to‑corp). Full‑time options for commercial roles.'],
    ];

    /** Corporate hiring & policy FAQ (static) */
    public array $faqs = [
        ['q' => 'Where do you engage talent?', 'a' => 'Primarily across US time zones (PT–ET). EU overlap (CET ±2) is optional and welcomed for select customer programs.'],
        ['q' => 'Engagement model?', 'a' => 'Most technical roles are contract (1099 or corp‑to‑corp). The Key Account Manager role can be full‑time or contract‑to‑hire.'],
        ['q' => 'Background checks & references?', 'a' => 'References are required. For certain customers and roles, background checks, conflict disclosures, and NDA/MSA acceptance are mandatory.'],
        ['q' => 'Security & confidentiality?', 'a' => 'We operate under strict NDAs and follow secure‑by‑default practices. Data access is provisioned least‑privilege and time‑bound.'],
        ['q' => 'Compensation & rates?', 'a' => 'We use market‑aligned USD day‑rates for senior talent. Share your target; we scope around outcomes and align quickly.'],
        ['q' => 'Equal Opportunity', 'a' => 'Axali is an Equal Opportunity Employer. We evaluate qualified applicants without regard to legally protected characteristics.'],
    ];

    /** --- Application form (static, no DB) --- */
    #[Validate('required|string|min:2|max:120')]
    public string $name = '';

    #[Validate('required|email')]
    public string $email = '';

    #[Validate('required|string|max:160')]
    public string $role = '';

    #[Validate('nullable|string|max:100')]
    public string $location = ''; // e.g. "US — ET"

    #[Validate('nullable|string|max:120')]
    public string $rate = '';      // optional rate expectation, USD

    #[Validate('nullable|string|max:500')]
    public string $links = '';

    #[Validate('required|string|min:20|max:3000')]
    public string $message = '';

    public bool $sent = false;

    public function applyFor(string $slug): void
    {
        $role = collect($this->roles)->firstWhere('slug', $slug);
        if ($role) {
            $this->role = $role['title'];
        }
    }

    public function submit(): void
    {
        $this->validate();

        Log::info('Career application', [
            'name'     => $this->name,
            'email'    => $this->email,
            'role'     => $this->role,
            'location' => $this->location,
            'rate'     => $this->rate,
            'links'    => $this->links,
            'message'  => $this->message,
        ]);

        // TODO: add a Mailable when ready
        // Mail::to('hello@axali-consulting.com')->send(new CareerApplicationMailable(...));

        $this->reset(['name', 'email', 'role', 'location', 'rate', 'links', 'message']);
        $this->sent = true;
    }

    public function render()
    {
        return view('livewire.careers')
            ->layout('layouts.guest');
    }
}
