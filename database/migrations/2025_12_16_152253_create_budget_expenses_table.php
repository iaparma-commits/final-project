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
        Schema::create('budget_expenses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('budget_id')->constrained('budget_allocations')->cascadeOnDelete();
            $table->decimal('amount_spent', 15, 2);
            $table->date('expense_date');
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('budget_expenses');
    }
};
