<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>MyMail - Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
    <style>
        body {
            background-color: #f5f7f9ff;
            font-family: 'Segoe UI', sans-serif;
        }


        .topbar {
            background-color: #9585f9ff;
            padding: 15px 25px;
            border-bottom: 2px solid #dee2e6;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
        }

        .content {
            padding: 30px;
        }

        .username {
            font-weight: bold;
            color: #17a2b8;
        }

        .logout-btn {
            background-color: #dc3545;
            color: white;
            border: none;
            padding: 6px 14px;
            border-radius: 5px;
            text-decoration: none;
        }

        .logout-btn:hover {
            background-color: #c82333;
        }
    </style>
</head>
<body>
<div class="container-fluid ">
    <div class="row">
    
        <!-- Main Content -->
            <div class="topbar d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Dashboard</h5>
                <div>
                    <span class="me-3">Welcome, <span class="username"><?= $_SESSION['user_name'] ?? 'User'; ?></span></span>
                    <a href="/mymail/auth/logout.php" class="logout-btn" onclick="return confirm('Are you sure you want to logout?')">Logout</a>
                </div>
            </div>

         