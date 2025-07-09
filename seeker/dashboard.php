<?php
require '../config.php';
if (!is_logged() || user_role() !== 'seeker') exit('Access Denied');
include '../includes/header.php';

// Fetch all jobs with recruiter name
$jobs = $db->query("SELECT j.*, u.name AS recruiter_name FROM jobs j JOIN users u ON j.user_id = u.id");
?>

<link rel="stylesheet" href="/job-portal/assets/css/style.css">

<div class="container mt-5">
  <h2 class="mb-4 text-center">🎯 Available Jobs</h2>

  <?php if ($jobs->num_rows === 0): ?>
    <div class="alert alert-info text-center">No jobs found at the moment.</div>
  <?php else: ?>
    <div class="row row-cols-1 row-cols-md-2 g-4">
      <?php while ($j = $jobs->fetch_assoc()): ?>
        <div class="col">
          <div class="card h-100 shadow-sm border-0">
            <div class="card-body">
              <p class="mb-1"><strong>Job Title:</strong> <?= esc($j['title']) ?></p>
              <p class="mb-1"><strong>Company:</strong> <?= esc($j['company_name']) ?></p>
              <p class="mb-1"><strong>Location:</strong> <?= esc($j['location']) ?></p>
              <p class="mb-1"><strong>Salary:</strong> ₹<?= esc($j['salary']) ?></p>
              <p class="mb-1"><strong>Recruiter:</strong> <?= esc($j['recruiter_name']) ?></p>
              <p class="mb-2"><strong>Description:</strong><br> <?= nl2br(esc($j['description'])) ?></p>
              <a href="apply.php?job_id=<?= $j['id'] ?>" class="btn btn-success mt-2">Apply</a>
            </div>
          </div>
        </div>
      <?php endwhile; ?>
    </div>
  <?php endif; ?>
</div>

<?php include '../includes/footer.php'; ?>
