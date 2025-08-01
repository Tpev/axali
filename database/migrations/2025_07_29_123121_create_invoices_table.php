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
Schema::create('invoices', function (Blueprint $table) {
    $table->id();
    $table->foreignId('quote_id')->nullable()->constrained();
    $table->string('invoice_number')->unique();
    $table->decimal('amount', 15, 2);
    $table->enum('status',['draft','sent','paid','overdue'])->default('draft');
    $table->date('due_at')->nullable();
    $table->string('pdf_path')->nullable();
    $table->timestamps();
	});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};
