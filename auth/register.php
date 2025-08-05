<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include '../db/db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name     = mysqli_real_escape_string($conn, $_POST['name']);
    $email    = mysqli_real_escape_string($conn, $_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // Check if email already exists
    $check = mysqli_query($conn, "SELECT * FROM users WHERE email = '$email'");
    if (mysqli_num_rows($check) > 0) {
        $error = "Email already exists.";
    } else {
        $query = "INSERT INTO users(name, email, password) VALUES ('$name', '$email', '$password')";
        if (mysqli_query($conn, $query)) {
            $success = "Registered successfully. <a href='login.php'>Login here</a>";
        } else {
            $error = "Something went wrong. Please try again.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Register</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="bg-light">
  <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="card shadow p-4">
          <h3 class="mb-3 text-center">Create an Account</h3>

          <?php if (isset($success)): ?>
            <div class="alert alert-success"><?= $success ?></div>
          <?php elseif (isset($error)): ?>
            <div class="alert alert-danger"><?= $error ?></div>
          <?php endif; ?>

          <form method="POST">
            <div class="mb-3">
              <label class="form-label">Full Name</label>
              <input class="form-control" name="name" required>
            </div>
            <div class="mb-3">
              <label class="form-label">Email Address</label>
              <input class="form-control" name="email" type="email" required>
            </div>
            <div class="mb-3">
              <label class="form-label">Password</label>
              <input class="form-control" name="password" type="password" required>
            </div>
            <button class="btn btn-primary w-100" type="submit">Register</button>
            <p class="mt-3 text-center">Already have an account? <a href="login.php">Login here</a></p>
          </form>

        </div>
      </div>
    </div>
  </div>
</body>
</html>
