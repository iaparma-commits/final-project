@extends('layouts.app')
@section('content')
<h3>Add Expense</h3>
<form action="{{ route('expenses.store') }}" method="POST">
@csrf
<div class="mb-3"><label>Budget</label>
<select name="budget_id" class="form-select">
@foreach($budgets as $b)
<option value="{{ $b->id }}">{{ $b->id }}</option>
@endforeach
</select></div>
<div class="mb-3"><label>Amount Spent</label><input type="number" step="0.01" name="amount_spent" class="form-control"></div>
<div class="mb-3"><label>Expense Date</label><input type="date" name="expense_date" class="form-control"></div>
<button class="btn btn-success">Submit</button>
</form>
@endsection
