@extends('layouts.app')
@section('content')
<h3>Add Budget Approval</h3>
<form action="{{ route('approvals.store') }}" method="POST">
@csrf
<div class="mb-3"><label>Budget</label>
<select name="budget_id" class="form-select">
@foreach($budgets as $b)
<option value="{{ $b->id }}">{{ $b->id }}</option>
@endforeach
</select></div>
<div class="mb-3"><label>Decision</label><select name="decision" class="form-select"><option>Approved</option><option>Rejected</option></select></div>
<div class="mb-3"><label>Remarks</label><textarea name="remarks" class="form-control"></textarea></div>
<button class="btn btn-success">Submit</button>
</form>
@endsection
