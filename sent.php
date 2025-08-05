<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: auth/login.php");
    exit();
}

include 'db/db.php';
include 'include/header.php';

$user_id = $_SESSION['user_id'];

$query = "SELECT * FROM messages WHERE sender_id = $user_id ORDER BY id DESC";
$result = mysqli_query($conn, $query);
?>

<div class="container mt-4">
  <div class="row">
    <div class="col-md-3"><?php include 'include/sidebar.php'; ?>
</div>
    <div class="col-md-9">
  <h2 class="text-primary mb-4">📤 Sent Mail</h2>

  <?php if (mysqli_num_rows($result) > 0): ?>
    <div class="table-responsive">
      <table class="table table-striped table-bordered shadow-sm rounded">
        <thead class="table-dark">
          <tr>
            <th>#</th>
            <th>To</th>
            <th>Subject</th>
            <th>Message</th>
            <th>Date Sent</th>
          </tr>
        </thead>
        <tbody>
          <?php 
            $sn = 1;
            while ($row = mysqli_fetch_assoc($result)): 
          ?>
            <tr>
              <td><?= $sn++ ?></td>
              <td><?= htmlspecialchars($row['receiver_email']) ?></td>
              <td><?= htmlspecialchars($row['subject']) ?></td>
              <td><?= nl2br(htmlspecialchars($row['body'])) ?></td>
              <td><?= date('d M Y, h:i A', strtotime($row['sent_at'])) ?></td>
            </tr>
          <?php endwhile; ?>
        </tbody>
      </table>
    </div>
  <?php else: ?>
    <div class="alert alert-warning">You haven't sent any messages yet.</div>
  <?php endif; ?>
</div>

<?php include 'include/footer.php'; ?>
