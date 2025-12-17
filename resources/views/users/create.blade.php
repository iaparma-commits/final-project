@extends('layouts.app')
@section('content')
<h3>Add User</h3>
<form action="{{ route('users.store') }}" method="POST">
@csrf
<div class="mb-3"><label>Name</label><input type="text" name="full_name" class="form-control"></div>
<div class="mb-3"><label>Email</label><input type="email" name="email" class="form-control"></div>
<div class="mb-3"><label>Role</label><select name="role" class="form-select"><option>Admin</option><option>Manager</option><option>Finance</option></select></div>
<div class="mb-3"><label>Status</label><select name="status" class="form-select"><option>Active</option><option>Inactive</option></select></div>
<button class="btn btn-success">Submit</button>
</form>
@endsection
