@extends('layouts.app')
@section('content')
<h3>Budget Approvals</h3>
<a href="{{ route('approvals.create') }}" class="btn btn-primary mb-2">Add Approval</a>
<table class="table table-bordered">
<tr><th>Budget</th><th>Decision</th><th>Remarks</th><th>Approved At</th><th>Action</th></tr>
@foreach($approvals as $a)
<tr>
<td>{{ $a->budget_id }}</td>
<td>{{ $a->decision }}</td>
<td>{{ $a->remarks }}</td>
<td>{{ $a->approved_at }}</td>
<td>
<a href="{{ route('approvals.edit',$a->id) }}" class="btn btn-sm btn-warning">Edit</a>
<form action="{{ route('approvals.destroy',$a->id) }}" method="POST" class="d-inline">
@csrf @method('DELETE')
<button class="btn btn-sm btn-danger">Delete</button>
</form>
</td>
</tr>
@endforeach
</table>
@endsection
