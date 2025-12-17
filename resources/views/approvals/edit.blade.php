@extends('layouts.app')
@section('content')
<h3>Edit Budget Approval</h3>
<form action="{{ route('approvals.update',$approval->id) }}" method="POST">
@csrf @method('PUT')
<div class="mb-3"><label>Decision</label>
<select name="decision" class="form-select">
<option {{ $approval->decision=='Approved'?'selected':'' }}>Approved</option>
<option {{ $approval->decision=='Rejected'?'selected':'' }}>Rejected</option>
</select></div>
<div class="mb-3"><label>Remarks</label><textarea name="remarks" class="form-control">{{ $approval->remarks }}</textarea></div>
<button class="btn btn-success">Update</button>
</form>
@endsection
