<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: auth/login.php");
    exit();
}
include 'db/db.php';
include 'include/header.php';

$user_id = $_SESSION['user_id'];
$query = "SELECT * FROM users WHERE id = $user_id";
$result = mysqli_query($conn, $query);
$user = mysqli_fetch_assoc($result);
?>

<div class="container mt-4">
  <div class="row">
    <div class="col-md-3"><?php include 'include/sidebar.php'; ?>
</div>
    <div class="col-md-9">
    <h2 class="mb-4">My Profile</h2>

    <div class="card shadow-sm">
      <div class="card-body">
        <p><strong>ID:</strong> <?= $user['id'] ?></p>
        <p><strong>Name:</strong> <?= htmlspecialchars($user['name']) ?></p>
        <p><strong>Email:</strong> <?= htmlspecialchars($user['email']) ?></p>
        <p><strong>Registered At:</strong> <?= $user['created_at'] ?></p>
      </div>
    </div>

  </div>
</div>

<?php include 'include/footer.php'; ?>
