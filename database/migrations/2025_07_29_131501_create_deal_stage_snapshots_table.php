<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('deal_stage_snapshots', function (Blueprint $table) {
            $table->date('date');
            $table->string('stage');
            $table->unsignedInteger('count');
            $table->primary(['date','stage']);
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('deal_stage_snapshots');
    }
};
