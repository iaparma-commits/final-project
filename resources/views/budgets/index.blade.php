@extends('layouts.app')
@section('content')
<h3>Budget Allocations</h3>
<a href="{{ route('budgets.create') }}" class="btn btn-primary mb-2">Add Allocation</a>
<table class="table table-bordered">
<tr><th>Project</th><th>Amount</th><th>Period</th><th>Status</th><th>Action</th></tr>
@foreach($budgets as $b)
<tr>
<td>{{ $b->project_name }}</td>
<td>{{ $b->amount_allocated }}</td>
<td>{{ $b->period_start }} to {{ $b->period_end }}</td>
<td>{{ $b->status }}</td>
<td>
<a href="{{ route('budgets.edit',$b->id) }}" class="btn btn-sm btn-warning">Edit</a>
<form action="{{ route('budgets.destroy',$b->id) }}" method="POST" class="d-inline">
@csrf @method('DELETE')
<button class="btn btn-sm btn-danger">Delete</button>
</form>
</td>
</tr>
@endforeach
</table>
@endsection
