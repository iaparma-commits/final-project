@extends('layouts.app')
@section('content')
<h3>Add Project</h3>
<form action="{{ route('projects.store') }}" method="POST">
@csrf
<div class="mb-3"><label>Project Name</label><input type="text" name="project_name" class="form-control"></div>
<div class="mb-3"><label>Department</label><input type="text" name="department_name" class="form-control"></div>
<button class="btn btn-success">Submit</button>
</form>
@endsection
