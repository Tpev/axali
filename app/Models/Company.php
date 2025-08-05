<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = [
        'name','website','phone','street','city','country','notes'
    ];

    public function contacts()
    {
        return $this->hasMany(Contact::class);
    }
}
