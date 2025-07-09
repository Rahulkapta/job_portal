<!DOCTYPE html>
<html>
<head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-light bg-light">
  <div class="container">
    <span class="navbar-brand">Job Portal</span>
    <?php if (function_exists('is_logged') && is_logged()): ?>
    <a href="/job-portal/logout.php" class="btn btn-danger">Logout</a>
    <?php endif; ?>
  </div>
</nav>
