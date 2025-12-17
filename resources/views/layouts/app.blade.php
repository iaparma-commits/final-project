<!DOCTYPE html>
<html>
<head>
    <title>Budget System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
  <div class="container">
    <a class="navbar-brand" href="{{ route('dashboard') }}">Budget Planning System</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item"><a class="nav-link" href="{{ route('dashboard') }}">Dashboard</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('users.index') }}">Users</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('projects.index') }}">Projects</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('budgets.index') }}">Budgets</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('expenses.index') }}">Expenses</a></li>
      </ul>
    </div>
  </div>
</nav>

<!-- Page content -->
<div class="container">
    @yield('content')
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
