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
        Schema::create('budget_approvals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('budget_id')->constrained('budget_allocations')->cascadeOnDelete();
           $table->unsignedBigInteger('approved_by')->nullable()->change();
            $table->enum('decision', ['Approved', 'Rejected']);
            $table->text('remarks')->nullable();
            $table->timestamp('approved_at')->useCurrent();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('budget_approvals');
    }
};
