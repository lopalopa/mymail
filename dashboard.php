<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: auth/login.php");
    exit();
}

include 'db/db.php'; // $conn is the mysqli connection
include 'include/header.php';

// Fetch user info
$user_id = $_SESSION['user_id'];
$result = mysqli_query($conn, "SELECT name, email FROM users WHERE id = $user_id");
$user = mysqli_fetch_assoc($result);
?>

<div class="container mt-4">
  <div class="row">
    <div class="col-md-3"><?php include 'include/sidebar.php'; ?>
</div>
    <div class="col-md-9">
    <div class="card shadow-sm">
        <div class="card-body text-center">
            <h2>Welcome to <span class="text-primary">MyMail</span></h2>
            <p class="lead">Hello, <strong><?= htmlspecialchars($user['name']) ?></strong></p>
            <p class="text-muted"><?= htmlspecialchars($user['email']) ?></p>

            <hr>

  </div>
    </div>
</div>

<?php include 'include/footer.php'; ?>
