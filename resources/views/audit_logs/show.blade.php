@extends('layouts.app')

@section('content')
<h4>Audit Log Details</h4>

<p><b>User:</b> {{ $audit_log->user->full_name }}</p>
<p><b>Action:</b> {{ $audit_log->action }}</p>
<p><b>Date:</b> {{ $audit_log->action_date }}</p>

<a href="{{ route('audit-logs.index') }}" class="btn btn-secondary">Back</a>
@endsection
