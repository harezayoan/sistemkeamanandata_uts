<?php
$db_host = 'localhost';
$db_name = 'skd_uts';
$db_username = 'root';
$db_password = '';
$conn = mysqli_connect(
    $db_host,
    $db_username,
    $db_password,
    $db_name
);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
