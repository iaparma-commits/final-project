@extends('layouts.app')
@section('content')
<h3>Dashboard</h3>

<div class="row mb-4">

  <!-- Total Users -->
  <div class="col-md-3">
    <div class="card text-white bg-primary mb-3">
      <div class="card-body">
        <h5 class="card-title">Users</h5>
        <p class="card-text">{{ $totalUsers }}</p>
        <a href="{{ route('users.index') }}" class="btn btn-light btn-sm">View Users</a>
      </div>
    </div>
  </div>

  <!-- Total Projects -->
  <div class="col-md-3">
    <div class="card text-white bg-success mb-3">
      <div class="card-body">
        <h5 class="card-title">Projects</h5>
        <p class="card-text">{{ $totalProjects }}</p>
        <a href="{{ route('projects.index') }}" class="btn btn-light btn-sm">View Projects</a>
      </div>
    </div>
  </div>

  <!-- Total Budget Allocated -->
  <div class="col-md-3">
    <div class="card text-white bg-warning mb-3">
      <div class="card-body">
        <h5 class="card-title">Total Allocated</h5>
        <p class="card-text">${{ number_format($totalAllocated, 2) }}</p>
        <a href="{{ route('budgets.index') }}" class="btn btn-light btn-sm">View Budgets</a>
      </div>
    </div>
  </div>

  <!-- Total Spent -->
  <div class="col-md-3">
    <div class="card text-white bg-danger mb-3">
      <div class="card-body">
        <h5 class="card-title">Total Spent</h5>
        <p class="card-text">${{ number_format($totalSpent, 2) }}</p>
        <a href="{{ route('expenses.index') }}" class="btn btn-light btn-sm">View Expenses</a>
      </div>
    </div>
  </div>

</div>

<!-- Remaining Budget -->
<div class="row">
  <div class="col-md-12">
    <div class="card border-info mb-3">
      <div class="card-body">
        <h5 class="card-title">Remaining Budget</h5>
        <p class="card-text display-6">${{ number_format($totalAllocated - $totalSpent, 2) }}</p>
      </div>
    </div>
  </div>
</div>

@endsection
