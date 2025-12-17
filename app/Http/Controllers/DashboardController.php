<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{
    BudgetAllocation,
    BudgetExpense,
    Project,
    User
};

class DashboardController extends Controller
{
     public function index()
    {
        // Make sure variables exist
        $totalUsers = User::count();
        $totalProjects = Project::count();
        $totalAllocated = BudgetAllocation::sum('amount_allocated');
        $totalSpent = BudgetExpense::sum('amount_spent');

        // Pass all variables to the view
        return view('dashboard', [
            'totalUsers' => $totalUsers,
            'totalProjects' => $totalProjects,
            'totalAllocated' => $totalAllocated,
            'totalSpent' => $totalSpent
        ]);
    }
}

