<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = [
        'company_id','first_name','last_name','email',
        'phone','position'
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
