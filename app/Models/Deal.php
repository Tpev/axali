<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Deal extends Model
{
    /* ─── Mass‑assignable fields ────────────────── */
    protected $fillable = [
        'name',
        'customer_id',
        'owner_id',
        'value_est',
        'stage',
        'quote_id',
        'invoice_id',
    ];

    /* ─── Relationships ─────────────────────────── */

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function owner()
    {
        return $this->belongsTo(User::class, 'owner_id');
    }

    /** Deal → Quote (deals.quote_id FK) */
    public function quote()
    {
        return $this->belongsTo(Quote::class);
    }

    /** Deal → Invoice (deals.invoice_id FK) */
    public function invoice()
    {
        return $this->belongsTo(Invoice::class);
    }

    public function stageChanges()
    {
        return $this->hasMany(DealStageChange::class);
    }

    public function projects()
    {
        return $this->hasMany(Project::class);
    }
}
