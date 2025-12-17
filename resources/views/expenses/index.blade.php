@extends('layouts.app')
@section('content')
<h3>Budget Expenses</h3>
<a href="{{ route('expenses.create') }}" class="btn btn-primary mb-2">Add Expense</a>
<table class="table table-bordered">
<tr><th>Budget</th><th>Amount Spent</th><th>Expense Date</th><th>Action</th></tr>
@foreach($expenses as $e)
<tr>
<td>{{ $e->budget_id }}</td>
<td>{{ $e->amount_spent }}</td>
<td>{{ $e->expense_date }}</td>
<td>
<a href="{{ route('expenses.edit',$e->id) }}" class="btn btn-sm btn-warning">Edit</a>
<form action="{{ route('expenses.destroy',$e->id) }}" method="POST" class="d-inline">
@csrf @method('DELETE')
<button class="btn btn-sm btn-danger">Delete</button>
</form>
</td>
</tr>
@endforeach
</table>
@endsection
