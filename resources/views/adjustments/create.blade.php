@extends('layouts.app')
@section('content')
<h3>Add Budget Adjustment</h3>
<form action="{{ route('adjustments.store') }}" method="POST">
@csrf
<div class="mb-3"><label>Budget</label>
<select name="budget_id" class="form-select">
@foreach($budgets as $b)
<option value="{{ $b->id }}">{{ $b->id }}</option>
@endforeach
</select></div>
<div class="mb-3"><label>Old Amount</label><input type="number" step="0.01" name="old_amount" class="form-control"></div>
<div class="mb-3"><label>New Amount</label><input type="number" step="0.01" name="new_amount" class="form-control"></div>
<div class="mb-3"><label>Reason</label><textarea name="reason" class="form-control"></textarea></div>
<button class="btn btn-success">Submit</button>
</form>
@endsection
