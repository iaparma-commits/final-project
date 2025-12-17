@extends('layouts.app')
@section('content')
<h3>Add Budget Allocation</h3>
<form action="{{ route('budgets.store') }}" method="POST">
@csrf
<div class="mb-3"><label>Project</label>
<select name="project_id" class="form-select">
@foreach($projects as $p)
<option value="{{ $p->id }}">{{ $p->project_name }}</option>
@endforeach
</select></div>
<div class="mb-3"><label>Amount</label><input type="number" step="0.01" name="amount_allocated" class="form-control"></div>
<div class="mb-3"><label>Period Start</label><input type="date" name="period_start" class="form-control"></div>
<div class="mb-3"><label>Period End</label><input type="date" name="period_end" class="form-control"></div>
<div class="mb-3"><label>Status</label><select name="status" class="form-select"><option>Pending</option><option>Approved</option><option>Rejected</option><option>Adjusted</option><option>Active</option><option>Closed</option><option>Cancelled</option></select></div>
<button class="btn btn-success">Submit</button>
</form>
@endsection
