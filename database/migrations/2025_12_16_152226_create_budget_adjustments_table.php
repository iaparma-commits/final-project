<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('budget_adjustments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('budget_id')->constrained('budget_allocations')->cascadeOnDelete();
            $table->foreignId('adjusted_by')->constrained('users');
            $table->decimal('old_amount', 15, 2);
            $table->decimal('new_amount', 15, 2);
            $table->text('reason');
            $table->timestamp('adjusted_at')->useCurrent();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('budget_adjustments');
    }
};
