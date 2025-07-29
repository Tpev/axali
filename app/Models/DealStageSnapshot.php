<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DealStageSnapshot extends Model
{
    public $timestamps = false;
    protected $fillable = ['date','stage','count'];
    protected $casts    = ['date'=>'date'];
}
