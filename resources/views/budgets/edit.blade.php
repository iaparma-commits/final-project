@extends('layouts.app')
@section('content')
<h3>Edit Budget Allocation</h3>
<form action="{{ route('budgets.update',$budget->id) }}" method="POST">
@csrf @method('PUT')
<div class="mb-3"><label>Project</label>
<select name="project_id" class="form-select">
@foreach($projects as $p)
<option value="{{ $p->id }}" {{ $budget->project_id==$p->id?'selected':'' }}>{{ $p->project_name }}</option>
@endforeach
</select></div>
<div class="mb-3"><label>Amount</label><input type="number" step="0.01" name="amount_allocated" value="{{ $budget->amount_allocated }}" class="form-control"></div>
<div class="mb-3"><label>Period Start</label><input type="date" name="period_start" value="{{ $budget->period_start }}" class="form-control"></div>
<div class="mb-3"><label>Period End</label><input type="date" name="period_end" value="{{ $budget->period_end }}" class="form-control"></div>
<div class="mb-3"><label>Status</label><select name="status" class="form-select">
<option {{ $budget->status=='Pending'?'selected':'' }}>Pending</option>
<option {{ $budget->status=='Approved'?'selected':'' }}>Approved</option>
<option {{ $budget->status=='Rejected'?'selected':'' }}>Rejected</option>
<option {{ $budget->status=='Adjusted'?'selected':'' }}>Adjusted</option>
<option {{ $budget->status=='Active'?'selected':'' }}>Active</option>
<option {{ $budget->status=='Closed'?'selected':'' }}>Closed</option>
<option {{ $budget->status=='Cancelled'?'selected':'' }}>Cancelled</option>
</select></div>
<button class="btn btn-success">Update</button>
</form>
@endsection
