<?php
session_start();
if (!isset($_SESSION['user_id'])) header("Location: auth/login.php");
include 'db/db.php';
include 'include/header.php';
?>
<div class="container mt-4">
  <div class="row">
    <div class="col-md-3"><?php include 'include/sidebar.php'; ?>
</div>
    <div class="col-md-9">
  <div class="content-area">
    <?php
    $user_id = $_SESSION['user_id'];
    $user = $conn->query("SELECT email FROM users WHERE id=$user_id")->fetch_assoc();
    $email = $user['email'];
    $result = $conn->query("SELECT * FROM messages WHERE receiver_email='$email' ORDER BY sent_at DESC");
    ?>

    <h2>Inbox</h2>

    <?php while ($row = $result->fetch_assoc()): ?>
      <div class="card mb-3">
        <div class="card-body">
          <h5 class="card-title"><?= htmlspecialchars($row['subject']) ?></h5>
          <p class="card-text">
            <strong>From:</strong> <?= htmlspecialchars($row['sender_id']) ?><br>
            <small><strong>Received:</strong> <?= htmlspecialchars($row['sent_at']) ?></small>
          </p>
          <a href="view.php?id=<?= $row['id'] ?>" class="btn btn-outline-primary btn-sm">View</a>
        </div>
      </div>
    <?php endwhile; ?>
  </div>
</div>

<?php include 'include/footer.php'; ?>
