<?php
require 'config.php';
$message = '';

if ($_POST) {
    $email = esc($_POST['email']);
    $pass = md5($_POST['password']);
    $q = $db->query("SELECT * FROM users WHERE email='$email' AND password='$pass'");
    if ($q->num_rows) {
        $_SESSION['user'] = $q->fetch_assoc();
        header("Location: {$_SESSION['user']['role']}/dashboard.php");
        exit;
    } else {
        $message = "❌ Invalid email or password.";
    }
}
?>

<?php include 'includes/header.php'; ?>

<div class="container d-flex justify-content-center align-items-center" style="min-height: 80vh;">
  <div class="card p-4 shadow" style="max-width: 400px; width: 100%;">
    <h3 class="text-center mb-4">🔐 Login</h3>

    <?php if ($message): ?>
      <div class="alert alert-danger"><?= $message ?></div>
    <?php endif; ?>

    <form method="post">
      <div class="mb-3">
        <label class="form-label">Email</label>
        <input name="email" class="form-control" placeholder="Email" required>
      </div>
      <div class="mb-3">
        <label class="form-label">Password</label>
        <input name="password" type="password" class="form-control" placeholder="Password" required>
      </div>
      <button class="btn btn-success w-100">Login</button>
    </form>

    <p class="text-center mt-3 mb-0">
      Don't have an account? <a href="register.php">Register here</a>
    </p>
  </div>
</div>

<?php include 'includes/footer.php'; ?>
