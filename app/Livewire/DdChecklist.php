<?php

namespace App\Livewire;

use Livewire\Component;

class DdChecklist extends Component
{
    /** Domains (base weights). */
    public array $domains = [
        ['key'=>'architecture','title'=>'Architecture & Scalability','desc'=>'Tenancy/isolation model, fault isolation, DR (RPO/RTO), rate limits, vendor dependency.','weight'=>1.0],
        ['key'=>'reliability','title'=>'Reliability & Operations','desc'=>'CI/CD, automated tests, rollback/canary, observability tied to SLOs, incident reviews.','weight'=>1.25],
        ['key'=>'security','title'=>'Security Controls','desc'=>'Identity & access mgmt, MFA, secrets, change mgmt, vulnerability mgmt, vendor risk.','weight'=>1.0],
        ['key'=>'appsec','title'=>'Application Security','desc'=>'Authn/authz, input validation, crypto, file handling, SSRF/XSS mitigation.','weight'=>1.0],
        ['key'=>'data','title'=>'Data Protection & Privacy','desc'=>'Inventory, retention/erasure, backups/restore proof, encryption, audit trails.','weight'=>1.0],
        ['key'=>'compliance','title'=>'Compliance Status','desc'=>'SOC 2 stage & gaps; HIPAA/HITECH policies if ePHI; audit scope & timelines.','weight'=>1.0],
        ['key'=>'cost','title'=>'Cost & Efficiency','desc'=>'Spend trend, cost per workflow/user, right‑sizing, caching, capacity planning.','weight'=>1.0],
        ['key'=>'team','title'=>'Team, Process & Leadership','desc'=>'Decision quality, delivery cadence, vendor oversight, hiring gaps, documentation.','weight'=>1.0],
    ];

    /** Scores 0..3. */
    public array $scores = [
        'architecture'=>0,'reliability'=>0,'security'=>0,'appsec'=>0,
        'data'=>0,'compliance'=>0,'cost'=>0,'team'=>0,
    ];

    /** If regulated data is in scope, boost security & data weights. */
    public bool $regulated = false;

    /** Thresholds. */
    public int $greenThreshold = 75;
    public int $yellowThreshold = 50;

    /** Compute a single effective weight. */
    public function effectiveWeight(string $key, float $base): float
    {
        $w = $base;
        if ($this->regulated && ($key === 'security' || $key === 'data')) $w *= 1.5;
        if ($key === 'reliability') $w = max($w, 1.25);
        return $w;
    }

    /** Display helper: trim trailing zeros. */
    public function weightDisplay(string $key, float $base): string
    {
        $w = $this->effectiveWeight($key, $base);
        $s = rtrim(rtrim(number_format($w, 2, '.', ''), '0'), '.');
        return $s === '' ? '0' : $s;
    }

    /** Percent 0..100 for a domain. */
    public function percentFor(string $key): float
    {
        $score = (float)($this->scores[$key] ?? 0);
        return round(($score / 3.0) * 100.0, 1);
    }

    /** Severity color name for a domain. */
    public function severityFor(string $key): string
    {
        $p = $this->percentFor($key);
        if ($p >= $this->greenThreshold) return 'green';
        if ($p >= $this->yellowThreshold) return 'yellow';
        return 'red';
    }

    /** HSL color string for a given percent (0=red, 100=green). */
    public function hslColorForPercent(float $percent): string
    {
        $p = max(0.0, min(100.0, $percent));
        $h = 120.0 * ($p / 100.0); // 0 red → 120 green
        return 'hsl('.round($h,1).',85%,50%)';
    }

    /** Weighted percent (0..100). */
    public function getWeightedPercentProperty(): float
    {
        $total = 0.0; $sum = 0.0;
        foreach ($this->domains as $d) {
            $w = $this->effectiveWeight($d['key'], (float)$d['weight']);
            $total += $w;
            $score = (float)($this->scores[$d['key']] ?? 0);
            $sum += ($score / 3.0) * 100.0 * $w;
        }
        if ($total <= 0) return 0.0;
        return round($sum / $total, 1);
    }

    /** Traffic light for overall confidence. */
    public function getTrafficLightProperty(): string
    {
        $p = $this->weightedPercent;
        if ($p >= $this->greenThreshold) return 'green';
        if ($p >= $this->yellowThreshold) return 'yellow';
        return 'red';
    }

    public function getTrafficClassProperty(): string
    {
        return match ($this->trafficLight) {
            'green'  => 'score-badge score-green',
            'yellow' => 'score-badge score-yellow',
            default  => 'score-badge score-red',
        };
    }

    public function getTrafficLabelProperty(): string
    {
        return ucfirst($this->trafficLight);
    }

    /** --- Radar chart SVG geometry (pure PHP, no JS) --- */
    public int $radarSize = 320;

    public function getRadarSvgProperty(): array
    {
        $size = $this->radarSize;
        $cx = $size / 2.0;
        $cy = $size / 2.0;
        $r  = ($size / 2.0) - 28.0;

        $n = count($this->domains);
        $points = [];
        $axes   = [];

        // place first axis at -90° (top)
        $startAngle = -M_PI / 2.0;
        $step = (2.0 * M_PI) / $n;

        foreach ($this->domains as $i => $d) {
            $theta = $startAngle + $i * $step;
            $percent = $this->percentFor($d['key']) / 100.0; // 0..1
            $px = $cx + $r * $percent * cos($theta);
            $py = $cy + $r * $percent * sin($theta);
            $points[] = round($px,1).','.round($py,1);

            // axis end (full radius)
            $ax = $cx + $r * cos($theta);
            $ay = $cy + $r * sin($theta);

            // label slightly beyond axis end
            $labelR = $r + 18.0;
            $lx = $cx + $labelR * cos($theta);
            $ly = $cy + $labelR * sin($theta);

            $axes[] = [
                'x1'=>$cx, 'y1'=>$cy,
                'x2'=>round($ax,1), 'y2'=>round($ay,1),
                'lx'=>round($lx,1), 'ly'=>round($ly,1),
                'label'=>$d['title'],
            ];
        }

        // tick radii (25/50/75%)
        $ticks = [
            round($r * 0.25,1),
            round($r * 0.50,1),
            round($r * 0.75,1),
            round($r * 1.00,1),
        ];

        return [
            'size'=>$size, 'cx'=>$cx, 'cy'=>$cy, 'r'=>$r,
            'polygon'=>implode(' ', $points),
            'axes'=>$axes,
            'ticks'=>$ticks,
        ];
    }

    public function render()
    {
        return view('livewire.dd-checklist')
            ->layout('layouts.guest');
    }
}
