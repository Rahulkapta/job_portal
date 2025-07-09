<?php
require '../config.php';
if (!is_logged() || user_role() !== 'recruiter') exit('Access Denied');

$job_id = (int)($_GET['id'] ?? 0);
$uid = $_SESSION['user']['id'];

$job = $db->query("SELECT * FROM jobs WHERE id=$job_id AND user_id=$uid")->fetch_assoc();
if (!$job) exit('Job not found or unauthorized.');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $title = esc($_POST['title']);
  $desc = esc($_POST['description']);
  $db->query("UPDATE jobs SET title='$title', description='$desc' WHERE id=$job_id AND user_id=$uid");
  header('Location: dashboard.php');
  exit;
}

include '../includes/header.php';
?>

<div class="container mt-5">
  <h2>Edit Job</h2>
  <form method="post">
    <input name="title" class="form-control mb-3" value="<?= esc($job['title']) ?>" required>
    <textarea name="description" class="form-control mb-3" rows="5"><?= esc($job['description']) ?></textarea>
    <button class="btn btn-success">Save Changes</button>
  </form>
</div>

<?php include '../includes/footer.php'; ?>
