@extends('layouts.app')

@section('content')
<h4>Expense Details</h4>

<p><b>Project:</b> {{ $expense->budget->project->project_name }}</p>
<p><b>Amount:</b> {{ number_format($expense->amount_spent,2) }}</p>
<p><b>Date:</b> {{ $expense->expense_date }}</p>

<a href="{{ route('expenses.index') }}" class="btn btn-secondary">Back</a>
@endsection
