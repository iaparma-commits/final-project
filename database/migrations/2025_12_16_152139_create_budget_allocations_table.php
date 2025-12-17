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
        Schema::create('budget_allocations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('project_id')->constrained()->cascadeOnDelete();
            $table->foreignId('created_by')->constrained('users');
            $table->decimal('amount_allocated', 15, 2);
            $table->date('period_start');
            $table->date('period_end');
            $table->enum('status', ['Pending', 'Approved', 'Rejected', 'Adjusted', 'Active', 'Closed', 'Cancelled'])
                ->default('Pending')
                ->after('period_end');
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('budget_allocations');
    }
};
