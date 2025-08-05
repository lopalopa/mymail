<?php
session_start();
if (!isset($_SESSION['user_id'])) header("Location: auth/login.php");
include 'db/db.php';
include 'include/header.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $receiver_email = $_POST['to'];
    $subject = $_POST['subject'];
    $body = $_POST['body'];
    $sender_id = $_SESSION['user_id'];

    // Escape user inputs for security
    $receiver_email = mysqli_real_escape_string($conn, $receiver_email);
    $subject = mysqli_real_escape_string($conn, $subject);
    $body = mysqli_real_escape_string($conn, $body);

    $query = "INSERT INTO messages (sender_id, receiver_email, subject, body) 
              VALUES ($sender_id, '$receiver_email', '$subject', '$body')";
    
    if (mysqli_query($conn, $query)) {
        echo "<div class='alert alert-success m-3'>Message Sent! <a href='inbox.php'>Go to Inbox</a></div>";
    } else {
        echo "<div class='alert alert-danger m-3'>Error: " . mysqli_error($conn) . "</div>";
    }
}
?>

<div class="container mt-4">
  <div class="row">
    <div class="col-md-3"><?php include 'include/sidebar.php'; ?>
</div>
    <div class="col-md-9">
  <h2>Compose</h2>
  <form method="POST">
    <input class="form-control my-2" name="to" type="email" required placeholder="To">
    <input class="form-control my-2" name="subject" required placeholder="Subject">
    <textarea class="form-control my-2" name="body" required placeholder="Write your message"></textarea>
    <button class="btn btn-primary" type="submit">Send</button>
  </form>
</div>
</div>

<?php include 'include/footer.php'; ?>
