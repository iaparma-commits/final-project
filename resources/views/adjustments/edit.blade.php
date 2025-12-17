@extends('layouts.app')
@section('content')
<h3>Edit Budget Adjustment</h3>
<form action="{{ route('adjustments.update',$adjustment->id) }}" method="POST">
@csrf @method('PUT')
<div class="mb-3"><label>Old Amount</label><input type="number" step="0.01" name="old_amount" value="{{ $adjustment->old_amount }}" class="form-control"></div>
<div class="mb-3"><label>New Amount</label><input type="number" step="0.01" name="new_amount" value="{{ $adjustment->new_amount }}" class="form-control"></div>
<div class="mb-3"><label>Reason</label><textarea name="reason" class="form-control">{{ $adjustment->reason }}</textarea></div>
<button class="btn btn-success">Update</button>
</form>
@endsection
