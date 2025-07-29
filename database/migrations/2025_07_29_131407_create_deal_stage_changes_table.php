<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('deal_stage_changes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('deal_id')->constrained()->cascadeOnDelete();
            $table->string('from')->nullable();
            $table->string('to');              // target stage
            $table->timestamp('changed_at');
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('deal_stage_changes');
    }
};
