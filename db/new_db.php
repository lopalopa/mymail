<?php
$host = "sql313.infinityfree.com";
$user = "if0_39631740";
$pass = "IvSG9uYTdDmmY";
$db = "if0_39631740_mymail";
$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>