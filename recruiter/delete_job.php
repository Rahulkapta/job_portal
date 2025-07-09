<?php
require '../config.php';
if (!is_logged() || user_role() !== 'recruiter') exit('Access Denied');

$job_id = (int)($_GET['id'] ?? 0);
$uid = $_SESSION['user']['id'];

// Delete applications first
$db->query("DELETE FROM applications WHERE job_id = $job_id");

// Then delete the job if it belongs to this recruiter
$db->query("DELETE FROM jobs WHERE id = $job_id AND user_id = $uid");

header('Location: dashboard.php');
exit;
