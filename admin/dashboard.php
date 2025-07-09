<?php
require '../config.php';
if (!is_logged() || user_role() !== 'admin') exit('Access Denied');
include '../includes/header.php';

$users = $db->query("SELECT * FROM users");
$jobs = $db->query("SELECT * FROM jobs");
?>

<div class="container mt-5">
  <h2 class="mb-4 text-center">🛠️ Admin Dashboard</h2>

  <div class="row g-4">
    <!-- Users Section -->
    <div class="col-md-6">
      <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
          👤 Registered Users
        </div>
        <div class="card-body">
          <?php if ($users->num_rows === 0): ?>
            <p>No users found.</p>
          <?php else: ?>
            <ul class="list-group list-group-flush">
              <?php while($u = $users->fetch_assoc()): ?>
                <li class="list-group-item d-flex justify-content-between">
                  <span><?= esc($u['name']) ?></span>
                  <span class="badge bg-secondary"><?= esc($u['role']) ?></span>
                </li>
              <?php endwhile; ?>
            </ul>
          <?php endif; ?>
        </div>
      </div>
    </div>

    <!-- Jobs Section -->
    <div class="col-md-6">
      <div class="card shadow-sm">
        <div class="card-header bg-success text-white">
          📄 Posted Jobs
        </div>
        <div class="card-body">
          <?php if ($jobs->num_rows === 0): ?>
            <p>No jobs found.</p>
          <?php else: ?>
            <ul class="list-group list-group-flush">
              <?php while($j = $jobs->fetch_assoc()): ?>
                <li class="list-group-item"><?= esc($j['title']) ?> <small class="text-muted">(Job ID: <?= $j['id'] ?>)</small></li>
              <?php endwhile; ?>
            </ul>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
</div>

<?php include '../includes/footer.php'; ?>
