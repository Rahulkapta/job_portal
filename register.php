<?php
require 'config.php';
$message = '';

if ($_POST) {
    $name = esc($_POST['name']);
    $email = esc($_POST['email']);
    $pass = md5($_POST['password']);
    $role = esc($_POST['role']);

    $check = $db->query("SELECT * FROM users WHERE email='$email'");
    if ($check->num_rows == 0) {
        $db->query("INSERT INTO users (name, email, password, role) VALUES ('$name', '$email', '$pass', '$role')");
        header('Location: login.php');
        exit;
    } else {
        $message = "⚠️ Email already exists!";
    }
}
?>

<?php include 'includes/header.php'; ?>

<div class="container d-flex justify-content-center align-items-center" style="min-height: 85vh;">
  <div class="card p-4 shadow" style="max-width: 450px; width: 100%;">
    <h3 class="text-center mb-4">📝 Register</h3>

    <?php if ($message): ?>
      <div class="alert alert-warning text-center"><?= $message ?></div>
    <?php endif; ?>

    <form method="post">
      <div class="mb-3">
        <label class="form-label">Full Name</label>
        <input name="name" class="form-control" placeholder="Your name" required>
      </div>
      <div class="mb-3">
        <label class="form-label">Email</label>
        <input name="email" class="form-control" placeholder="you@example.com" required>
      </div>
      <div class="mb-3">
        <label class="form-label">Password</label>
        <input name="password" type="password" class="form-control" placeholder="" required>
      </div>
      <div class="mb-3">
        <label class="form-label">Register As</label>
        <select name="role" class="form-select" required>
          <option value="seeker">Job Seeker</option>
          <option value="recruiter">Recruiter</option>
          <option value="admin">Admin</option>
        </select>
      </div>
      <button class="btn btn-primary w-100">Register</button>
    </form>

    <p class="text-center mt-3 mb-0">
      Already have an account? <a href="login.php">Login here</a>
    </p>
  </div>
</div>

<?php include 'includes/footer.php'; ?>
