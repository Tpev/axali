<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
protected $fillable = ['company_name','contact_first','contact_last','contact_email'];
}
