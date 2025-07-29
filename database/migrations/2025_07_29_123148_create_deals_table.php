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
Schema::create('deals', function (Blueprint $table) {
    $table->id();
    $table->foreignId('customer_id')->constrained();
    $table->string('name');
    $table->enum('stage', ['lead','quoted','active','closing','won','lost'])->index();
    $table->decimal('value_est', 15, 2)->nullable();
    $table->foreignId('quote_id')->nullable()->constrained();
    $table->foreignId('invoice_id')->nullable()->constrained();
    $table->unsignedBigInteger('owner_id')->nullable();   // admin user
    $table->timestamp('expires_at')->nullable();          // quote expiry
    $table->timestamps();
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('deals');
    }
};
