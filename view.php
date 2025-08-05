<?php
session_start();
if (!isset($_SESSION['user_id'])) header("Location: auth/login.php");
include 'db/db.php';
$id = $_GET['id'];
$result = $conn->query("SELECT * FROM messages WHERE id=$id");
$row = $result->fetch_assoc();
?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
<div class="container mt-4">
  <h2><?= htmlspecialchars($row['subject']) ?></h2>
  <p><strong>From:</strong> <?= $row['sender_id'] ?></p>
  <p><?= nl2br(htmlspecialchars($row['body'])) ?></p>
  <small class="text-muted">Sent on: <?= $row['sent_at'] ?></small>
</div>