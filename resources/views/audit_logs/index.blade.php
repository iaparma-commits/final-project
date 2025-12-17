@extends('layouts.app')
@section('content')
<h3>Audit Logs</h3>
<table class="table table-bordered">
<tr><th>User</th><th>Budget</th><th>Action</th><th>Date</th><th>Action</th></tr>
@foreach($logs as $log)
<tr>
<td>{{ $log->user_id }}</td>
<td>{{ $log->budget_id }}</td>
<td>{{ $log->action }}</td>
<td>{{ $log->action_date }}</td>
<td>
<form action="{{ route('audit-logs.destroy',$log->id) }}" method="POST" class="d-inline">
@csrf @method('DELETE')
<button class="btn btn-sm btn-danger">Delete</button>
</form>
</td>
</tr>
@endforeach
</table>
@endsection
