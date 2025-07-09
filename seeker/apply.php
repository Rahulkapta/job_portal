<?php
require '../config.php';
if (!is_logged() || user_role() !== 'seeker') exit('Access Denied');

$job_id = (int)($_GET['job_id'] ?? 0);
$seeker_id = $_SESSION['user']['id'];

// Prevent reapplication
$exists = $db->query("SELECT * FROM applications WHERE job_id=$job_id AND seeker_id=$seeker_id");
if ($exists->num_rows > 0) {
  include '../includes/header.php';
  echo "<div class='container mt-5'><div class='alert alert-warning'>You have already applied to this job.</div><a href='dashboard.php' class='btn btn-secondary'>Back to Jobs</a></div>";
  include '../includes/footer.php';
  exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $cover = esc($_POST['cover_letter']);
  $resume = esc($_POST['resume_link']);
  $phone = esc($_POST['phone']);
  $linkedin = esc($_POST['linkedin']);

  $db->query("INSERT INTO applications (job_id, seeker_id, cover_letter, resume_link, phone, linkedin) 
              VALUES ($job_id, $seeker_id, '$cover', '$resume', '$phone', '$linkedin')");

  include '../includes/header.php';
  echo "<div class='container mt-5'><div class='alert alert-success'>✅ Application submitted successfully!</div><a href='dashboard.php' class='btn btn-success'>Back to Jobs</a></div>";
  include '../includes/footer.php';
  exit;
}
?>

<?php include '../includes/header.php'; ?>

<div class="container mt-5" style="max-width: 700px;">
  <div class="card shadow p-4">
    <h3 class="mb-4">📄 Apply for Job ID: <?= $job_id ?></h3>

    <form method="post">
      <div class="mb-3">
        <label class="form-label">Cover Letter</label>
        <textarea name="cover_letter" class="form-control" rows="5" required></textarea>
      </div>

      <div class="mb-3">
        <label class="form-label">Resume (Link to Google Drive or Upload URL)</label>
        <input type="url" name="resume_link" class="form-control" placeholder="https://..." required>
      </div>

      <div class="mb-3">
        <label class="form-label">Phone Number</label>
        <input type="text" name="phone" class="form-control" placeholder="+91..." required>
      </div>

      <div class="mb-3">
        <label class="form-label">LinkedIn Profile</label>
        <input type="url" name="linkedin" class="form-control" placeholder="https://linkedin.com/in/..." required>
      </div>

      <button type="submit" class="btn btn-primary w-100">Submit Application</button>
    </form>
  </div>
</div>

<?php include '../includes/footer.php'; ?>
