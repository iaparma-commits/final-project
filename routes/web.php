<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    DashboardController,
    UserController,
    ProjectController,
    BudgetAllocationController,
    BudgetApprovalController,
    BudgetAdjustmentController,
    BudgetExpenseController,
    AuditLogController
};

Route::get('/', function() {
    return redirect()->route('dashboard');
});

Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard');

Route::resource('users', UserController::class);
Route::resource('projects', ProjectController::class);
Route::resource('budgets', BudgetAllocationController::class);
Route::resource('approvals', BudgetApprovalController::class);
Route::resource('adjustments', BudgetAdjustmentController::class);
Route::resource('expenses', BudgetExpenseController::class);
Route::resource('audit-logs', AuditLogController::class)->only(['index','show','destroy']);
