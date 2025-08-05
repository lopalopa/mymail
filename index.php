<?php
session_start();
if (isset($_SESSION['user_id'])) {
    header("Location: inbox.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>MyMail - Home</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background: linear-gradient(135deg, #e0f7fa, #e1f5fe);
      height: 100vh;
      margin: 0;
      display: flex;
      justify-content: center;
      align-items: center;
      flex-direction: column;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .logo {
      font-size: 64px;
      font-weight: bold;
      letter-spacing: 1px;
      animation: zoomIn 1s ease-in-out;
    }

    @keyframes zoomIn {
      0% { transform: scale(0.8); opacity: 0; }
      100% { transform: scale(1); opacity: 1; }
    }

    .tagline {
      font-size: 20px;
      color: #555;
      margin-top: 10px;
    }

    .btn-group {
      margin-top: 40px;
    }

    .btn-custom {
      padding: 10px 25px;
      font-size: 18px;
      transition: all 0.3s ease-in-out;
    }

    .btn-custom:hover {
      transform: translateY(-2px);
      box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    }
  </style>
</head>
<body>

  <div class="logo">
    <span style="color:#4285F4">M</span>
    <span style="color:#DB4437">y</span>
    <span style="color:#F4B400">M</span>
    <span style="color:#0F9D58">a</span>
    <span style="color:#4285F4">i</span>
    <span style="color:#DB4437">l</span>
  </div>

  <div class="tagline">Simple. Secure. Fast Communication.</div>

  <div class="btn-group">
    <a href="auth/login.php" class="btn btn-primary me-3 btn-custom">Sign In</a>
    <a href="auth/register.php" class="btn btn-outline-dark btn-custom">Sign Up</a>
  </div>

</body>
</html>
