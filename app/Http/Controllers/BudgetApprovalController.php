<?php
namespace App\Http\Controllers;
use App\Models\BudgetApproval;
use App\Models\BudgetAllocation;
use Illuminate\Http\Request;

class BudgetApprovalController extends Controller
{
    public function index(){ return view('approvals.index',['approvals'=>BudgetApproval::list()]); }
    public function create(){ return view('approvals.create',['budgets'=>BudgetAllocation::all()]); }
    public function store(Request $r){ BudgetApproval::create($r->all()); return redirect()->route('approvals.index'); }
    public function edit(BudgetApproval $approval){ return view('approvals.edit',compact('approval')); }
    public function update(Request $r,BudgetApproval $approval){ $approval->update($r->all()); return redirect()->route('approvals.index'); }
    public function destroy(BudgetApproval $approval){ $approval->delete(); return back(); }
}