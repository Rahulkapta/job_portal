<?php
require '../config.php';
include '../includes/header.php';

if ($_POST) {
    $title = esc($_POST['title']);
    $desc = esc($_POST['description']);
    $location = esc($_POST['location']);
    $company = esc($_POST['company_name']);
    $salary = esc($_POST['salary']);
    $uid = $_SESSION['user']['id'];

    $db->query("INSERT INTO jobs (title, description, location, company_name, salary, user_id) 
                VALUES ('$title', '$desc', '$location', '$company', '$salary', $uid)");

    header('Location: dashboard.php');
    exit;
}
?>

<div class="container mt-5">
  <h2 class="mb-4">📌 Post a New Job</h2>
  <form method="post" class="card p-4 shadow-sm bg-white">
    <div class="mb-3">
      <label class="form-label">Job Title</label>
      <input name="title" class="form-control" placeholder="e.g. Web Developer" required>
    </div>

    <div class="mb-3">
      <label class="form-label">Company Name</label>
      <input name="company_name" class="form-control" placeholder="e.g. Acme Corp" required>
    </div>

    <div class="mb-3">
      <label class="form-label">Location</label>
      <input name="location" class="form-control" placeholder="e.g. Delhi, India" required>
    </div>

    <div class="mb-3">
      <label class="form-label">Salary (optional)</label>
      <input name="salary" class="form-control" placeholder="e.g. ₹40,000/month">
    </div>

    <div class="mb-3">
      <label class="form-label">Job Description</label>
      <textarea name="description" class="form-control" rows="5" placeholder="Describe the responsibilities, requirements, etc."></textarea>
    </div>

    <button class="btn btn-success">✅ Post Job</button>
  </form>
</div>

<?php include '../includes/footer.php'; ?>
