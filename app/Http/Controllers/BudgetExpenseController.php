<?php
namespace App\Http\Controllers;
use App\Models\BudgetExpense;
use App\Models\BudgetAllocation;
use Illuminate\Http\Request;

class BudgetExpenseController extends Controller
{
    public function index(){ return view('expenses.index',['expenses'=>BudgetExpense::all()]); }
    public function create(){ return view('expenses.create',['budgets'=>BudgetAllocation::all()]); }
    public function store(Request $r){ BudgetExpense::create($r->all()); return redirect()->route('expenses.index'); }
    public function edit(BudgetExpense $expense){ return view('expenses.edit',compact('expense')); }
    public function update(Request $r,BudgetExpense $expense){ $expense->update($r->all()); return redirect()->route('expenses.index'); }
    public function destroy(BudgetExpense $expense){ $expense->delete(); return back(); }
}