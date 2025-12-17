@extends('layouts.app')
@section('content')
<h3>Edit User</h3>
<form action="{{ route('users.update',$user->id) }}" method="POST">
@csrf @method('PUT')
<div class="mb-3"><label>Name</label><input type="text" name="full_name" value="{{ $user->full_name }}" class="form-control"></div>
<div class="mb-3"><label>Email</label><input type="email" name="email" value="{{ $user->email }}" class="form-control"></div>
<div class="mb-3"><label>Role</label><select name="role" class="form-select">
<option {{ $user->role=='Admin'?'selected':'' }}>Admin</option>
<option {{ $user->role=='Manager'?'selected':'' }}>Manager</option>
<option {{ $user->role=='Finance'?'selected':'' }}>Finance</option>
</select></div>
<div class="mb-3"><label>Status</label><select name="status" class="form-select">
<option {{ $user->status=='Active'?'selected':'' }}>Active</option>
<option {{ $user->status=='Inactive'?'selected':'' }}>Inactive</option>
</select></div>
<button class="btn btn-success">Update</button>
</form>
@endsection
