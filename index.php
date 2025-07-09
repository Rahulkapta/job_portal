<?php
require 'config.php';
if (is_logged()) {
    header("Location: {$_SESSION['user']['role']}/dashboard.php");
    exit;
}
include 'includes/header.php';
?>

<div class="container d-flex flex-column justify-content-center align-items-center" style="min-height: 85vh;">
  <div class="text-center">
    <h1 class="mb-3">👋 Welcome to Job Portal</h1>
    <p class="lead mb-4">Find your next opportunity or post a job as a recruiter.</p>
    <div class="d-flex gap-3 justify-content-center">
      <a href="login.php" class="btn btn-primary btn-lg px-4">🔐 Login</a>
      <a href="register.php" class="btn btn-success btn-lg px-4">📝 Register</a>
    </div>
  </div>
</div>

<?php include 'includes/footer.php'; ?>
