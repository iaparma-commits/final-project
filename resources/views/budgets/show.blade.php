@extends('layouts.app')

@section('content')
<h4>Budget Details</h4>

<p><b>Project:</b> {{ $budget->project->project_name }}</p>
<p><b>Amount:</b> {{ number_format($budget->amount_allocated,2) }}</p>
<p><b>Status:</b> {{ $budget->status }}</p>

<a href="{{ route('budgets.index') }}" class="btn btn-secondary">Back</a>
@endsection
