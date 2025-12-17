<?php
namespace App\Http\Controllers;
use App\Models\BudgetAllocation;
use App\Models\Project;
use Illuminate\Http\Request;


class BudgetAllocationController extends Controller
{
public function index(){ return view('budgets.index',['budgets'=>BudgetAllocation::list()]); }


public function create(){ return view('budgets.create',['projects'=>Project::all()]); }


public function store(Request $r)
{
    $data = $r->all();
 
    // 1️⃣ Attempt to use logged-in user
    $userId = auth()->id();

    // 2️⃣ Fallback to a default existing user id (adjust as needed)
    if(!$userId) {
        // Make sure this ID exists in your users table
        $userId = 1;
    }

    $data['created_by'] = $userId;

    // 3️⃣ Save using the model
    BudgetAllocation::storeData($data);

    return redirect()->route('budgets.index');
}
public function edit(BudgetAllocation $budget)
{
    $projects = Project::all();
    return view('budgets.edit', compact('budget', 'projects'));
}

public function update(Request $r, BudgetAllocation $budget)
{
    $data = $r->all();
    // Keep created_by as is
    $data['created_by'] = $budget->created_by;
    $budget->update($data);
    return redirect()->route('budgets.index');
}

public function destroy(BudgetAllocation $budget)
{
    $budget->delete();
    return redirect()->route('budgets.index');
}


}