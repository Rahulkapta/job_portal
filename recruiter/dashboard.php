<?php
require '../config.php';
if (!is_logged() || user_role() !== 'recruiter') exit('Access Denied');
include '../includes/header.php';

$uid = $_SESSION['user']['id'];
$jobs = $db->query("SELECT * FROM jobs WHERE user_id=$uid");
?>

<div class="container mt-5">
  <div class="d-flex justify-content-between align-items-center mb-4">
    <h2>📋 Your Posted Jobs</h2>
    <a href="add_job.php" class="btn btn-primary">➕ Post New Job</a>
  </div>

  <?php if ($jobs->num_rows === 0): ?>
    <div class="alert alert-info">You haven't posted any jobs yet.</div>
  <?php else: ?>
    <div class="row row-cols-1 row-cols-md-2 g-4">
      <?php while ($j = $jobs->fetch_assoc()): ?>
        <div class="col">
          <div class="card h-100 shadow-sm border-0">
            <div class="card-body">
              <p class="mb-1"><strong>Job Title:</strong> <?= esc($j['title']) ?></p>
              <p class="mb-1"><strong>Company:</strong> <?= esc($j['company_name']) ?></p>
              <p class="mb-1"><strong>Location:</strong> <?= esc($j['location']) ?></p>
              <p class="mb-1"><strong>Salary:</strong> <?= esc($j['salary']) ?></p>
              <p class="mb-2"><strong>Description:</strong><br> <?= nl2br(esc($j['description'])) ?></p>

              <div class="d-flex gap-2">
                <a href="edit_job.php?id=<?= $j['id'] ?>" class="btn btn-sm btn-warning">✏️ Edit</a>
                <a href="delete_job.php?id=<?= $j['id'] ?>" 
                   class="btn btn-sm btn-danger"
                   onclick="return confirm('Are you sure you want to delete this job?');">
                   🗑️ Delete
                </a>
              </div>
            </div>
          </div>
        </div>
      <?php endwhile; ?>
    </div>
  <?php endif; ?>
</div>

<?php include '../includes/footer.php'; ?>
