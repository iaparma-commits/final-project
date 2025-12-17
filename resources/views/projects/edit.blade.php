@extends('layouts.app')
@section('content')
<h3>Edit Project</h3>
<form action="{{ route('projects.update',$project->id) }}" method="POST">
@csrf @method('PUT')
<div class="mb-3"><label>Project Name</label><input type="text" name="project_name" value="{{ $project->project_name }}" class="form-control"></div>
<div class="mb-3"><label>Department</label><input type="text" name="department_name" value="{{ $project->department_name }}" class="form-control"></div>
<button class="btn btn-success">Update</button>
</form>
@endsection
