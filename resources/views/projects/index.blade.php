@extends('layouts.app')
@section('content')
<h3>Projects</h3>
<a href="{{ route('projects.create') }}" class="btn btn-primary mb-2">Add Project</a>
<table class="table table-bordered">
<tr><th>Project Name</th><th>Department</th><th>Action</th></tr>
@foreach($projects as $p)
<tr>
<td>{{ $p->project_name }}</td>
<td>{{ $p->department_name }}</td>
<td>
<a href="{{ route('projects.edit',$p->id) }}" class="btn btn-sm btn-warning">Edit</a>
<form action="{{ route('projects.destroy',$p->id) }}" method="POST" class="d-inline">
@csrf @method('DELETE')
<button class="btn btn-sm btn-danger">Delete</button>
</form>
</td>
</tr>
@endforeach
</table>
@endsection
