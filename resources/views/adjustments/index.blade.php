@extends('layouts.app')
@section('content')
<h3>Budget Adjustments</h3>
<a href="{{ route('adjustments.create') }}" class="btn btn-primary mb-2">Add Adjustment</a>
<table class="table table-bordered">
<tr><th>Budget</th><th>Old Amount</th><th>New Amount</th><th>Reason</th><th>Adjusted At</th><th>Action</th></tr>
@foreach($adjustments as $adj)
<tr>
<td>{{ $adj->budget_id }}</td>
<td>{{ $adj->old_amount }}</td>
<td>{{ $adj->new_amount }}</td>
<td>{{ $adj->reason }}</td>
<td>{{ $adj->adjusted_at }}</td>
<td>
<a href="{{ route('adjustments.edit',$adj->id) }}" class="btn btn-sm btn-warning">Edit</a>
<form action="{{ route('adjustments.destroy',$adj->id) }}" method="POST" class="d-inline">
@csrf @method('DELETE')
<button class="btn btn-sm btn-danger">Delete</button>
</form>
</td>
</tr>
@endforeach
</table>
@endsection
