<?php

namespace App\Livewire;

use Livewire\Component;

class DogProfile extends Component
{
    // ───── UI State ────────────────────────────────────────────
    public bool $showHistory = false;
    public bool $showVisits  = false;
    public bool $showNotes   = false;

    // ───── Identification ─────────────────────────────────────
    public string $uid   = 'BG-20250712-001';
    public string $name  = 'Buddy';
    public string $breed = 'Beagle';
    public string $photo = 'beagle.jpg'; // storage/app/public

    // ───── Meta ------------------------------------------------
    public string $intakeDate = '2025-06-30';
    public string $status     = 'Ready for adoption';

    // ───── Scores ----------------------------------------------
    public int   $score = 81;
    public array $categories = [
        'Social'    => 74,
        'Education' => 85,
        'Skill'     => 78,
    ];

    /** @var array<string,array{0:int,1:int,2:int,3:int}> */
    public array $history = [
        '2025-06-30' => [70, 62, 80, 72],
        '2025-07-07' => [76, 68, 83, 75],
        '2025-07-14' => [81, 74, 85, 78],
    ];

    /**
     * @var list<array{category:string,title:string,goal:string,progress:float}>
     */
    public array $sessions = [
        // SOCIAL
        ['category' => 'Social','title' => 'Park Meet-Ups','goal' => 'Calm greeting of 3 dogs','progress' => 0.55],
        ['category' => 'Social','title' => 'Play-Group Etiquette','goal' => '5‑min supervised free‑play, no jumping','progress' => 0.30],
        ['category' => 'Social','title' => 'Café Patio Manners','goal' => 'Settle under table for 10 min','progress' => 0.15],
        ['category' => 'Social','title' => 'City Leash Walk','goal' => 'Loose‑leash 500 m on busy sidewalk','progress' => 0.60],
        // EDUCATION
        ['category' => 'Education','title' => 'Stay & Wait','goal' => '30‑s sit‑stay at 5 m','progress' => 0.35],
        ['category' => 'Education','title' => 'Place Command','goal' => 'Go‑to‑mat from 4 m, hold 1 min','progress' => 0.50],
        ['category' => 'Education','title' => 'Leave‑It','goal' => 'Ignore food on floor while walking by','progress' => 0.20],
        ['category' => 'Education','title' => 'Doorway Manners','goal' => 'Wait for release before exiting door','progress' => 0.70],
        // SKILL
        ['category' => 'Skill','title' => 'Scent Trail','goal' => 'Follow 15‑m treat trail','progress' => 0.20],
        ['category' => 'Skill','title' => 'Retrieve Named Toy','goal' => 'Bring “ball” on cue, 3/5 accuracy','progress' => 0.40],
        ['category' => 'Skill','title' => 'Agility Tunnel Run','goal' => 'Run through 3‑m tunnel on cue','progress' => 0.25],
        ['category' => 'Skill','title' => 'Target Touch','goal' => 'Nose‑touch hand target from 2 m','progress' => 0.60],
    ];

    // ───── Vet Corner data -------------------------------------
    public float  $currentWeight = 12.4; // kg
    public int    $bcs           = 5;    // body‑condition score 1‑9
    public string $nextVaccine   = '2025-08-14';

    public array $vetVisits = [
        ['date' => '2025-07-01', 'reason' => 'Initial exam',   'outcome' => 'Healthy',    'weight' => 12.0],
        ['date' => '2025-07-10', 'reason' => 'Rabies vaccine', 'outcome' => 'Vaccinated', 'weight' => 12.3],
        ['date' => '2025-07-20', 'reason' => 'Ear infection',  'outcome' => 'Medicated',  'weight' => 12.4],
    ];

    // ───── Care‑Team Notes ------------------------------------
    public ?array $pinnedNote = [
        'author'  => 'Lead Trainer',
        'body'    => '<p><strong>Focus:</strong> Buddy tends to pull when he sees cyclists. Use high‑value treats to reinforce heel.</p>',
        'created' => '2025-07-12 10:00:00',
    ];

    public array $notes = [
        [
            'author'  => 'Volunteer Jane',
            'body'    => '<p>Tried <em>Leave‑It</em> with cheese; responded well after 3 reps.</p>',
            'created' => '2025-07-13 09:15:00',
        ],
        [
            'author'  => 'Vet Dr. Lee',
            'body'    => '<p>Ear canal clear after medicated drops. Continue monitoring for redness.</p>',
            'created' => '2025-07-20 16:45:00',
        ],
    ];

    // ───── View ------------------------------------------------
        /**
     * Lifecycle hook used by wire:init="loadNotes" in the Blade view.
     * Replace with real DB queries later; demo data already populated.
     */
    public function loadNotes(): void
    {
        // Placeholder — notes are already present for demo purposes.
    }

    // ───── View ------------------------------------------------
    public function render()
    {
        return view('livewire.dog-profile')
            ->layout('layouts.guest');
    }
}
