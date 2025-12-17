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
        Schema::create('audit_logs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('budget_id')->nullable()
                ->constrained('budget_allocations')->nullOnDelete();
            $table->enum('action', [
                'Create',
                'Update',
                'Delete',
                'Approve',
                'Adjust'
            ]);
            $table->timestamp('action_date')->useCurrent();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('audit_logs');
    }
};
