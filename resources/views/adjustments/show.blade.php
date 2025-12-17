@extends('layouts.app')

@section('content')
<h4>Adjustment Details</h4>

<p><b>Project:</b> {{ $adjustment->budget->project->project_name }}</p>
<p><b>Old Amount:</b> {{ number_format($adjustment->old_amount,2) }}</p>
<p><b>New Amount:</b> {{ number_format($adjustment->new_amount,2) }}</p>
<p><b>Reason:</b> {{ $adjustment->reason }}</p>

<a href="{{ route('adjustments.index') }}" class="btn btn-secondary">Back</a>
@endsection
