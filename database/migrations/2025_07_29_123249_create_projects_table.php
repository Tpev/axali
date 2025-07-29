<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
Schema::create('projects', function (Blueprint $table) {
    $table->id();
    $table->foreignId('deal_id')->constrained();
    $table->string('code')->unique();                     // e.g. AX‑2407
    $table->string('stage');                              // discovery / build / review
    $table->unsignedTinyInteger('percent_complete')->default(0);
    $table->date('next_milestone_at')->nullable();
    $table->timestamps();
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
