<?php
namespace App\Http\Controllers;
use App\Models\BudgetAdjustment;
use App\Models\BudgetAllocation;
use App\Models\User;
use Illuminate\Http\Request;

class BudgetAdjustmentController extends Controller
{
    public function index(){ return view('adjustments.index',['adjustments'=>BudgetAdjustment::all()]); }
    public function create(){ return view('adjustments.create',['budgets'=>BudgetAllocation::all(),'users'=>User::all()]); }
    public function store(Request $r){ BudgetAdjustment::create($r->all()); return redirect()->route('adjustments.index'); }
    public function edit(BudgetAdjustment $adjustment){ return view('adjustments.edit',compact('adjustment')); }
    public function update(Request $r,BudgetAdjustment $adjustment){ $adjustment->update($r->all()); return redirect()->route('adjustments.index'); }
    public function destroy(BudgetAdjustment $adjustment){ $adjustment->delete(); return back(); }
}