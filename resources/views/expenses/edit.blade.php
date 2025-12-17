@extends('layouts.app')
@section('content')
<h3>Edit Expense</h3>
<form action="{{ route('expenses.update',$expense->id) }}" method="POST">
@csrf @method('PUT')
<div class="mb-3"><label>Amount Spent</label><input type="number" step="0.01" name="amount_spent" value="{{ $expense->amount_spent }}" class="form-control"></div>
<div class="mb-3"><label>Expense Date</label><input type="date" name="expense_date" value="{{ $expense->expense_date }}" class="form-control"></div>
<button class="btn btn-success">Update</button>
</form>
@endsection
