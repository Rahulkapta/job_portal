<?php
session_start();
$db = new mysqli('localhost','root','','job_portal');
if($db->connect_error) exit('DB Connect Error');
function is_logged() { return isset($_SESSION['user']); }
function user_role() { return $_SESSION['user']['role'] ?? ''; }
function esc($s) { return htmlspecialchars($s, ENT_QUOTES); }
?>
