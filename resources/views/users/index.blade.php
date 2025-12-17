@extends('layouts.app')
@section('content')
<h3>Users</h3>
<a href="{{ route('users.create') }}" class="btn btn-primary mb-2">Add User</a>
<table class="table table-bordered">
<tr><th>Name</th><th>Email</th><th>Role</th><th>Status</th><th>Action</th></tr>
@foreach($users as $u)
<tr>
<td>{{ $u->full_name }}</td>
<td>{{ $u->email }}</td>
<td>{{ $u->role }}</td>
<td>{{ $u->status }}</td>
<td>
<a href="{{ route('users.edit',$u->id) }}" class="btn btn-sm btn-warning">Edit</a>
<form action="{{ route('users.destroy',$u->id) }}" method="POST" class="d-inline">
@csrf @method('DELETE')
<button class="btn btn-sm btn-danger">Delete</button>
</form>
</td>
</tr>
@endforeach
</table>
@endsection
