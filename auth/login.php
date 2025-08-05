<?php
session_start();
include '../db/db.php'; // $conn is the mysqli connection

$error = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = $_POST['password'];

    $query = "SELECT * FROM users WHERE email='$email'";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) == 1) {
        $user = mysqli_fetch_assoc($result);

        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            header("Location: ../dashboard.php");
            exit();
        } else {
            $error = "❌ Incorrect password.";
        }
    } else {
        $error = "❌ Email not found.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Login - Modern UI</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="card shadow rounded-4">
        <div class="card-body p-4">
          <h2 class="text-center mb-4">🔐 Login</h2>

          <?php if ($error): ?>
            <div class="alert alert-danger"><?= $error ?></div>
          <?php endif; ?>

          <form method="POST" novalidate>
            <div class="mb-3">
              <label for="email" class="form-label">Email address</label>
              <input class="form-control" type="email" name="email" id="email" required placeholder="Enter your email">
            </div>

            <div class="mb-3">
              <label for="password" class="form-label">Password</label>
              <input class="form-control" type="password" name="password" id="password" required placeholder="Enter your password">
            </div>

            <button class="btn btn-success w-100" type="submit">Login</button>
          </form>

          <p class="mt-3 text-center">
            Don't have an account? <a href="register.php">Register here</a>
          </p>
        </div>
      </div>
    </div>
  </div>
</div>

</body>
</html>
