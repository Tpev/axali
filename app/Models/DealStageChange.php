<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DealStageChange extends Model
{
    public $timestamps = false;
    protected $fillable = ['deal_id','from','to','changed_at'];
    protected $casts    = ['changed_at'=>'datetime'];
}
